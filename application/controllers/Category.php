<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->model('Category_model');
    }

	public function index()
	{

        $data['title'] = "Category";
        $data['user'] = $this->User_model->getUser($this->session->userdata("user_id"));
        $data['categories'] = $this->Category_model->getCategory();

		$this->load->view('_be/template/header', $data);
		$this->load->view('_be/template/navbar', $data);
		$this->load->view('_be/category', $data);
		$this->load->view('_be/template/footer');
	}

    public function addCategory() {
        $category = $this->input->post('category');
        $this->Category_model->addCategory(['category' => $category]);
    }
    public function editCategory($id) {
        $category = $this->input->post('category');
        $this->Category_model->editCategory($id ,['category' => $category]);
    }
    public function deleteCategory($id) {
        $this->Category_model->deleteCategory($id);
    }
}
