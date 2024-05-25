<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {

    public function __construct(){
        $this->load->database();
        $this->load->model('Article_model');
        $this->load->model('Volume_model'); 
    }

    // public function add_article($data) {
    //     $this->db->insert('articles', $data);
    //     return $this->db->insert_id(); // Return the ID of the inserted article
    // }



    public function add_article_author($data) {
        return $this->db->insert('article_author', $data);
    }

    public function fetch_authors() {
        $query = $this->db->get('authors');
        return $query->result_array();
    }

    public function fetch_articles($query=NULL){
		if ($query !== NULL ) {
			$this->db->order_by('title', 'ASC');
			$this->db->like('title', $query);
			$this->db->or_like('keywords', $query);
			$this->db->like('abstract', $query);
		}
		$this->db->order_by('title', 'ASC');
		$query = $this->db->get('articles');
		return $query->result_array();
	}

    public function search_articles($keyword) {
        $this->db->like('title', $keyword);
        $this->db->or_like('keywords', $keyword);
        $query = $this->db->get('articles');
        return $query->result_array();
    }
    public function get_articles_public() {
        // Joining articles with authors based on the 'title' foreign key
        $this->db->select('articles.*, authors.author_name, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('authors', 'articles.title = authors.title', 'left');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
        // Add condition to check if the article is published
        $this->db->where('articles.published', 1);

        // Perform the query
        $query = $this->db->get();

        // Return the result as an array
        return $query->result_array();
    }

    public function get_volumes() {
        $this->db->order_by('vol_name', 'ASC');
        $query = $this->db->get('volume');
        return $query->result_array();
    }
    
    public function get_articless() {
        // Joining articles with authors
        $this->db->select('articles.*, authors.author_name');
        $this->db->from('articles');
        $this->db->join('article_author', 'articles.articleid = article_author.articleid', 'left');
        $this->db->join('authors', 'article_author.auid = authors.auid', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_articles() {
        // Joining articles with authors based on the 'title' foreign key
        $this->db->select('articles.*, authors.author_name, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('authors', 'articles.title = authors.title', 'left');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');

        // Perform the query
        $query = $this->db->get();

        // Return the result as an array
        return $query->result_array();
    }

    // public function get_article_by_id($articleid) {
    //     $query = $this->db->get_where('articles', array('articleid' => $articleid));
    //     return $query->row_array();
    // }

    // public function update_article($articleid, $data) {
    //     $this->db->where('articleid', $articleid);
    //     return $this->db->update('articles', $data);
    // }
    
    public function add_article($article_data, $author_ids) {
        // Insert article data
        $this->db->insert('articles', $article_data);
        $article_id = $this->db->insert_id();

        // Insert authors
        foreach ($author_ids as $author_id) {
            $this->db->insert('article_author', [
                'articleid' => $article_id,
                'auid' => $author_id
            ]);
        }
        
        return $article_id;
    }
    // public function add_article($data) {
    //     // Insert the data into the 'articles' table
    //     $inserted = $this->db->insert('articles', $data);
        
    //     // Return TRUE if insertion was successful, FALSE otherwise
    //     return $inserted;
    // }

    // public function get_article_by_id($articleid) {
    //     // Retrieve article data based on article ID
    //     return $this->db->get_where('articles', array('articleid' => $articleid))->row_array();
    // }

    // public function update_article($articleid, $data) {
    //     // Update article data in the database
    //     $this->db->where('articleid', $articleid);
    //     return $this->db->update('articles', $data);
    // }

    public function delete_article($articleid) {
        // Check if the patient exists
        $this->db->where('articleid', $articleid);
        $query = $this->db->get('articles');

        if ($query->num_rows() > 0) {
            // Patient exists, delete it
            $this->db->where('articleid', $articleid);
            $this->db->delete('articles');
            return true;
        } else {
            // Patient not found
            return false;
        }
    }
    // public function delete_article($articleid) {
    //     // Delete article from database based on the given article ID
    //     $this->db->where('articleid', $articleid);
    //     return $this->db->delete('articles');
    // }


    // new

    public function get_article_by_id($articleid) {
        $this->db->select('articles.*, GROUP_CONCAT(authors.author_name SEPARATOR ", ") as author_names, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('article_author', 'articles.articleid = article_author.articleid', 'left');
        $this->db->join('authors', 'article_author.auid = authors.auid', 'left');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
        $this->db->where('articles.articleid', $articleid);
        $this->db->group_by('articles.articleid');
        $query = $this->db->get();
        return $query->row_array();
    }

    // public function update_article($articleid, $articleData) {
    //     $this->db->where('articleid', $articleid);
    //     return $this->db->update('articles', $articleData);
    // }

    public function get_article_forda_id($articleid) {
        $this->db->select('
            articles.articleid,
            articles.title,
            articles.keywords,
            articles.abstract,
            articles.published,
            articles.filename,
            articles.date_published,
            articles.doi,
            volume.vol_name,
        ');
        $this->db->from('articles');
        $this->db->join('article_author', 'articles.articleid = article_author.articleid');
        $this->db->join('authors', 'article_author.auid = authors.auid');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
        $this->db->where('articles.articleid', $articleid);
        $query = $this->db->get();
        return $query->row_array(); // Fetch a single row as an associative array
    }
    public function get_article_id($id){
		$article = $this->db->get_where('articles', array('articleid' => $id))->row_array();
		$articleauthors = $this->volume_model->get_authors_by_article_id($article['articleid']);
			$article['authors'] = [];
			foreach ($articleauthors as &$author) {
					$article['authors'][] =  $this->volume_model->get_authors_by_id($author['auid']);
			}
		return $article;
	}
    public function get_article($query=NULL){

		$this->db->select('authors.*, articles.*');
		$this->db->from('article_author');
		$this->db->join('articles', 'article_author.article_id = articles.article_id', 'inner');
		$this->db->join('authors', 'article_author.authid = authors.author_id', 'inner');
		$this->db->order_by('articles.date_published', 'DESC');
		if ($query !== NULL ) {
			$this->db->like('title', $query);
			$this->db->or_like('keywords', $query);
			$this->db->like('abstract', $query);
		}

		$query = $this->db->get();
		return $query->result_array();

	}

    public function get_articles_by_volume_id($id){
		$this->db->select('authors.*, articles.*');
		$this->db->from('article_author');
		$this->db->join('articles', 'article_author.articleid = articles.articleid', 'inner');
		$this->db->join('authors', 'article_author.auid = authors.auid', 'inner');
		$this->db->order_by('articles.date_published', 'DESC');
		$this->db->where('articles.volumeid', $id);

		$query = $this->db->get();
		return $query->result_array();
	}

    // public function get_article_by_id($id) {
    //     return $this->db->get_where('articles', ['articleid' => $id])->row_array();
    // }

    public function get_article_authors($article_id) {
        $this->db->select('auid');
        $this->db->from('article_author');
        $this->db->where('articleid', $article_id);
        $query = $this->db->get();
        return array_column($query->result_array(), 'auid');
    }

    public function update_article($id, $data, $author_ids) {
        // Update article data
        $this->db->where('articleid', $id);
        $this->db->update('articles', $data);

        // Update authors
        $this->db->delete('article_author', ['articleid' => $id]);
        foreach ($author_ids as $author_id) {
            $this->db->insert('article_author', [
                'articleid' => $id,
                'auid' => $author_id
            ]);
        }
    }
}
