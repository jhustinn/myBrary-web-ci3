<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Officers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

	public function index()
	{

        $data['title'] = "Users";
        $data['officers'] = $this->User_model->getPetugas();
        $data["user"] = $this->User_model->getUser($this->session->userdata("user_id"));

		$this->load->view('_be/template/header', $data);
		$this->load->view('_be/template/navbar', $data);
		$this->load->view('_be/users', $data);
		$this->load->view('_be/template/footer');
	}
}
