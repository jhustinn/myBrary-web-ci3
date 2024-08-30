<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oops extends CI_Controller {

	public function index()
	{
		$this->load->view('_be/template/header');
		$this->load->view('_be/oops');
		$this->load->view('_be/template/footer');
	}
}
