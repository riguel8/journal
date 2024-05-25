<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load the Article_model
        $this->load->model('Article_model');
        $this->load->model('Volume_model');
    }

    public function index() {
        $data['articles'] = $this->article_model->get_articles();
        $data['title'] = 'Latest Articles';

        $this->load->view('template/admin/header');
        $this->load->view('admin/articles/index', $data);
        $this->load->view('template/admin/footer');
    }

    public function search() {
        $keyword = $this->input->get('keyword');
        $data['articles'] = $this->Article_model->search_articles($keyword);

        $this->load->view('admin/articles/search_results', $data);
    }
    
    public function view_article($id) {

        // Get article data by article ID
        // $data['article'] = $this->Article_model->get_article_forda_id($id);
        $data['article'] = $this->Article_model->get_article_by_id($id);
        // $data['volume'] = $this->Volume_model->get_volume_by_id($data['article']['volumeid']);

        // Load views
        $this->load->view('template/admin/header');
        $this->load->view('admin/articles/view_article', $data);
        $this->load->view('template/admin/footer');
    }
    
    public function update_article($id) {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required');
        $this->form_validation->set_rules('doi', 'DOI', 'required');
        $this->form_validation->set_rules('volumeid', 'Volume', 'required');
    
        // Check if form is submitted and validated
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load view with validation errors
            $data['volumes'] = $this->volume_model->fetch_volume();
            $data['article'] = $this->article_model->get_article_by_id($id);
            $data['authors'] = $this->author_model->fetch_authors(); // Load all authors for dropdown
            $data['selected_authors'] = $this->article_model->get_article_authors($id); // Get selected authors for the article
            $this->load->view('template/admin/header');
            $this->load->view('admin/articles/edit', $data);
            $this->load->view('template/admin/footer');
        } else {
            // Check if file input has data
            if (!empty($_FILES['filename']['name'])) {
                $config['upload_path'] = './assets/articles/';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size'] = 2048; // 2MB maximum file size
                $config['file_name'] = uniqid(); // Unique file name
    
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('filename')) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                } else {
                    // File upload failed, display error
                    $error = $this->upload->display_errors();
                    echo $error;
                    return; // Exit function if file upload fails
                }
    
                $data = array(
                    'title' => $this->input->post('title'),
                    'keywords' => $this->input->post('keywords'),
                    'abstract' => $this->input->post('abstract'),
                    'doi' => $this->input->post('doi'),
                    'published' => $this->input->post('published') ? 1 : 0,
                    'volumeid' => $this->input->post('volumeid'),
                    'filename' => $file_name
                );
            } else {
                $data = array(
                    'title' => $this->input->post('title'),
                    'keywords' => $this->input->post('keywords'),
                    'abstract' => $this->input->post('abstract'),
                    'doi' => $this->input->post('doi'),
                    'published' => $this->input->post('published') ? 1 : 0,
                    'volumeid' => $this->input->post('volumeid')
                );
            }
    
            // Prepare data for article update
            $author_ids = $this->input->post('authors');
    
            // Update article
            $this->article_model->update_article($id, $data, $author_ids);
    
            // Redirect after successful insertion
            redirect('articles');
        }
    }
    

    public function update($articleid) {
        // Retrieve article data using article ID
        $data['article'] = $this->article_model->get_article_by_id($articleid);
    
        // Initialize article data array
        $articleData = [
            'title' => $this->input->post('title'),
            'keywords' => $this->input->post('keywords'),
            'abstract' => $this->input->post('abstract'),
            'doi' => $this->input->post('doi'),
            'volumeid' => $this->input->post('volumeid'),
            'filename' => $data['article']['filename'], // Default to existing filename
            'published' => $this->input->post('published') ? 1 : 0 // Handle published status
        ];
    
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if a file is uploaded
            if (!empty($_FILES['filename']['name'])) {
                // File upload configuration
                $config['upload_path'] = './assets/articles/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 2048; // 2MB max size
                $config['file_name'] = uniqid(); // Generate unique filename
                $config['overwrite'] = TRUE; // Overwrite existing file if exists
                $this->load->library('upload', $config);
    
                // Try to upload the file
                if ($this->upload->do_upload('filename')) {
                    // File uploaded successfully
                    $file_data = $this->upload->data();
                    // Update the article data with the new filename
                    $articleData['filename'] = $file_data['file_name'];
                } else {
                    // File upload failed, set a flash error message
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('articles/edit/' . $articleid);
                    return;
                }
            }
    
            // Update article data in the database
            $articleUpdateResult = $this->article_model->update_article($articleid, $articleData);
    
            // Handle success and failure cases
            if ($articleUpdateResult) {
                $this->session->set_flashdata('success', 'Article updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update article.');
            }
    
            // Redirect to a relevant page
            redirect('articles');
        }
    
        // Load the view with article data
        $data['volumes'] = $this->volume_model->fetch_volume();
        $this->load->view('template/admin/header');
        $this->load->view('admin/articles/edit', $data);
        $this->load->view('template/admin/footer');
    }
    
    

    
     // public function add() {
    //     // Load form validation library and set rules
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('title', 'Title', 'required');
    //     $this->form_validation->set_rules('keywords', 'Keywords', 'required');
    //     $this->form_validation->set_rules('abstract', 'Abstract', 'required');
    //     $this->form_validation->set_rules('doi', 'DOI', 'required');
    //     $this->form_validation->set_rules('date_published', 'Date Published', 'required');
    //     $this->form_validation->set_rules('volumeid', 'Volume', 'required');
    
    //     // Check if form validation passed
    //     if ($this->form_validation->run() == FALSE) {
    //         // Validation failed, load the form view with errors
    //         $data['volumes'] = $this->volume_model->fetch_volume();
    //         $this->load->view('template/admin/header');
    //         $this->load->view('admin/articles/add', $data);
    //         $this->load->view('template/admin/footer');
    //     } else {
    //         // Configure file upload
    //         $config['upload_path'] = './assets/articles/';
    //         $config['allowed_types'] = 'pdf';
    //         $config['max_size'] = 2048; // 2MB maximum file size
    //         $config['file_name'] = uniqid(); // Unique file name
    
    //         $this->load->library('upload', $config);
    
    //         if ($this->upload->do_upload('filename')) {
    //             // File upload succeeded
    //             $upload_data = $this->upload->data();
    //             $file_name = $upload_data['file_name'];
    
    //             // Prepare data for insertion
    //             $data = array(
    //                 'title' => $this->input->post('title'),
    //                 'keywords' => $this->input->post('keywords'),
    //                 'abstract' => $this->input->post('abstract'),
    //                 'doi' => $this->input->post('doi'),
    //                 'date_published' => date('Y-m-d H:i:s', strtotime($this->input->post('date_published'))),
    //                 'published' => $this->input->post('published') ? 1 : 0,
    //                 'volumeid' => $this->input->post('volumeid'),
    //                 'filename' => $file_name
    //             );
    
    //             // Insert data into the database
    //             $this->article_model->add_article($data);
    
    //             // Redirect to articles page
    //             redirect('articles');
    //         } else {
    //             // File upload failed, display error
    //             $error = $this->upload->display_errors();
    //             echo $error;
    //         }
    //     }
    // }
    
    public function add() {
        $this->load->model('Article_model');
        $this->load->model('Author_model');
        $this->load->model('Volume_model');
        
        $data['authors'] = $this->Author_model->fetch_authors();
        $data['volumes'] = $this->Volume_model->fetch_volume();
    
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $title = $this->input->post('title');
            $keywords = $this->input->post('keywords');
            $abstract = $this->input->post('abstract');
            $doi = $this->input->post('doi');
            $volumeid = $this->input->post('volumeid');
            $author_ids = $this->input->post('authors');
            $published = $this->input->post('published') ? 1 : 0;
    
            // Handle file upload
            $filename = '';
            if (!empty($_FILES['filename']['name'])) {
                $config['upload_path'] = './assets/articles/';
                $config['allowed_types'] = 'pdf';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('filename')) {
                    $upload_data = $this->upload->data();
                    $filename = $upload_data['file_name'];
                } else {
                    $data['error'] = $this->upload->display_errors();
                }
            }
    
            $article_data = [
                'title' => $title,
                'keywords' => $keywords,
                'abstract' => $abstract,
                'doi' => $doi,
                'volumeid' => $volumeid,
                'filename' => $filename,
                'published' => $published
            ];
    
            $article_id = $this->Article_model->add_article($article_data, $author_ids);
    
            redirect('articles');
        } else {
            $this->load->view('template/admin/header');
            $this->load->view('admin/articles/add', $data);
            $this->load->view('template/admin/footer');
        }
    }
    
    
    public function download($filename) {
		$file_path = FCPATH . 'asssets/articles/' . $filename;
	
		// Check if file exists
		if (file_exists($file_path)) {
			// Load the download helper
			$this->load->helper('download');
	
			// Set the file MIME type
			$mime = mime_content_type($file_path);
	
			// Generate the server response for the file download
			force_download($filename, file_get_contents($file_path), $mime);
		} else {
			// File not found, handle the error
			echo "File not found!";
		}
	}

    // public function delete($articleid) {
    //     // Load the article model
    //     $this->load->model('Article_model');

    //     // Call the delete_article method from the model
    //     if ($this->Article_model->delete_article($articleid)) {
    //         // If successful, redirect to article list
    //         redirect('articles');
    //     } else {
    //         // If unsuccessful, display an error message
    //         echo "Failed to delete article.";
    //     }
        
    // }
    
    public function delete($articleid) {
       
        $this->article_model->delete_article($articleid);
        redirect('articles');
    }

    // public function delete() {
	// 	// Get the article ID from the POST request
	// 	$articleid = $this->input->post('articleid');
		
	// 	// Check if the article exists
	// 	$article = $this->article_model->get_article_by_id($articleid);
	// 	if (!$article) {
	// 		// article not found, return error response
	// 		$response = array('status' => 'error', 'message' => 'article not found.');
	// 		echo json_encode($response);
	// 		return;
	// 	}
		
	// 	// Delete the article
	// 	$deleted = $this->article_model->delete_article($articleid);
		
	// 	if ($deleted) {
	// 		// Return success response
	// 		$response = array('status' => 'success');
	// 		echo json_encode($response);
	// 		return;
	// 	} else {
	// 		// Return error response
	// 		$response = array('status' => 'error', 'message' => 'Failed to delete article.');
	// 		echo json_encode($response);
	// 		return;
	// 	}
	// }	
}
