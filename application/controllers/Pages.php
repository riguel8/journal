<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function view($page = 'home') {
        $this->load->model('article_model');
        $this->load->model('volume_model');
        $this->load->model('author_model');

        $articles = $this->article_model->get_articles_public();
        
        // Fetch authors for each article
        foreach ($articles as &$article) {
            $article['authors'] = $this->author_model->get_authors_by_article_id($article['articleid']);
        }
        
        $data['articles'] = $articles;
        $data['volumes'] = $this->volume_model->get_volumess();
        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('template/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('template/footer', $data);
    }

}

