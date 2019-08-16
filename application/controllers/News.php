<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'Arsip Berita';

		$this->load->view('news/index', $data);
	}

	public function view($slug = NULL)
	{

		$data['news_item'] = $this->news_model->get_news($slug);

		$this->load->view('news/view', $data);
	}

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'judul', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');

		if($this->form_validation->run()===FALSE){
			$this->load->view('news/create');
		}else{
			$this->news_model->set_news();
			redirect('news');
		}
		
	}

	public function update($id){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'judul', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');

		if($this->form_validation->run() === FALSE){
			$data['news_item'] = $this->news_model->get_news_id($id);
			$this->load->view('news/update', $data);
		}else{
			$this->news_model->update_news($id);
			redirect('news');
		}

	}

	public function delete($id){

		$this->news_model->delete_news($id);
			redirect('news');
	}

	
}
