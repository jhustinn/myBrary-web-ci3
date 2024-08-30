<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct() {
		parent::__construct();

		if($this->session->userdata('user_id')) { 
			
		 }


		$this->load->model('Auth_model');
	}

	public function index()
	{



        $data['title'] = "Sign In";
		$this->form_validation->set_rules("username","Username","required");
		$this->form_validation->set_rules("password","Password","required");
		if($this->form_validation->run() == false) {

		$this->load->view('_be/template/auth_header', $data);
		$this->load->view('_be/auth/login');
		$this->load->view('_be/template/footer');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$this->Auth_model->cekLogin($username, $password);
		}
	}

    public function signUp() {
        $data['title'] = "Sign Up";

		$this->form_validation->set_rules("name","Name","required");
		$this->form_validation->set_rules("username","Username","required|is_unique[user_tb.username]");
		// $this->form_validation->set_rules("pasword","Password","required|min_length[3]");
		// $this->form_validation->set_rules("pasconf","Password Confirmation","required|matches[password1]");

		if($this->form_validation->run() == false) {
			$this->load->view('_be/template/auth_header', $data);
			$this->load->view('_be/template/navbar');
			$this->load->view('_be/auth/register');
			$this->load->view('_be/template/footer');
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'level' => 'peminjam',
			];
			$this->Auth_model->register($data);
		}

    }

	public function logout()
	{
		$this->Auth_model->logout();
	}

}
