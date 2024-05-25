<?php
    class Volumes extends CI_Controller{

        public function __construct() {
            parent::__construct();
            $this->load->model('Volume_model');
        }

        public function search() {
            $keyword = $this->input->get('vol_name');
            $data['volume'] = $this->Article_model->search_volumes($keyword);
    
            $this->load->view('admin/volumes/search_results', $data);
        }

        public function index(){
            $data['title'] = 'Volume Lists';

            $data['volumes'] = $this->volume_model->get_volumes();
            // print_r($data['volumes']);

            usort($data['volumes'], function($a, $b) {
                return strcmp($a['vol_name'], $b['vol_name']);
            });

            $this->load->view('template/admin/header');
			$this->load->view('admin/volumes/index', $data);
			$this->load->view('template/admin/footer');
        }

        public function update($volumeid) {
            // Retrieve volume data using volume ID
            $data['volume'] = $this->volume_model->get_volume_by_id($volumeid);
            
            // Initialize volume data array
            $volumeData = array (
                'vol_name' => $this->input->post('vol_name'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status') ? 1 : 0
            );
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $UpdateResult = $this->volume_model->update_volume($volumeid, $volumeData);
        
                if ($UpdateResult) {
                    $this->session->set_flashdata('success', 'Volume updated successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Failed to update Volume.');
                };

                redirect('volumes');
            }

            // Load the view with volume data
            $this->load->view('template/admin/header');
            $this->load->view('admin/volumes/edit', $data);
            $this->load->view('template/admin/footer');
        }
        
        public function add() {
            if ($this->input->post()) {
                $volume_name = $this->input->post('vol_name');
                $description = $this->input->post('description');
                $status = $this->input->post('status') ? 1 : 0;
    
                $data = array(
                    'vol_name' => $volume_name,
                    'description' => $description,
                    'status' => $status
                );
                $inserted = $this->Volume_model->add_volume($data);
    
                if ($inserted) {
                    $this->session->set_flashdata('success_message', 'Volume added successfully');
                } else {
                    $this->session->set_flashdata('error_message', 'Failed to add Volume');
                }
                redirect('volumes'); 
                return;
            }
    
            // Load the add volume view
            $this->load->view('template/admin/header');
            $this->load->view('admin/volumes/add');
            $this->load->view('template/admin/footer');
        }
        public function delete($volumeid) {
       
            $this->Volume_model->delete_volume($volumeid);
            redirect('volumes');
        }
    }