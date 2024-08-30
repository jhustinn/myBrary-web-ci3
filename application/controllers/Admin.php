<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('User_model');
    }

	public function index()
	{

        $data['title'] = "Dashboard";
        $data["user"] = $this->User_model->getUser($this->session->userdata("user_id"));

		$this->load->view('_be/template/header', $data);
		$this->load->view('_be/template/navbar', $data);
		$this->load->view('_be/dashboard');
		$this->load->view('_be/template/footer');
	}
}
