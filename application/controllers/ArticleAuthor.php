<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleAuthor extends CI_Controller {
	public function index($id){
		$data['articleauthors'] = $this->user_model->get_users_by_articles($id);
		$data['id'] = $id;
		$this->load->view('templates/admin/header');
		$this->load->view('admin/article_author/index', $data);
		$this->load->view('templates/admin/footer');
	}

	public function new($id){
		$data['authors'] = $this->authors_model->get_authors();
		$data['id'] = $id;
		$this->load->view('templates/admin/header');
		$this->load->view('admin/article_author/assign_new_author', $data);
		$this->load->view('templates/admin/footer');
	}

	public function add($id){
		$data = array(
			'articleid' => $id,
			'auid' => $this->input->post('auid') 
		);

		$this->articleauthor_model->add_article_author($data);
		redirect('admin/article/'.$id.'/authors');
	}

	public function edit($articleid, $id) {
    $data['articleauthor'] = $this->articleauthor_model->get_article_author_by_id($id);
		$data['authors'] = $this->authors_model->get_authors();
		$data['id'] = $articleid;
		$this->load->view('templates/admin/header');
		$this->load->view('admin/article_author/edit_assigned_author', $data);
		$this->load->view('templates/admin/footer');
	}

	public function update($articleid, $id) {
		$data = array(
			'auid' => $this->input->post('auid') 
		);
    $this->articleauthor_model->update_article_author($id, $data);
    redirect('admin/article/'.$articleid.'/authors');
	}

	public function delete($articleid, $id) {
    $this->articleauthor_model->delete_article_author($id);
    redirect('admin/article/'.$articleid.'/authors');
	}

}
