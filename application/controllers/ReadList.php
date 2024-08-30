<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReadList extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->model('ReadList_model');
    }

	public function index()
	{

        $data['title'] = "Read List";
        $data["user"] = $this->User_model->getUser($this->session->userdata("user_id"));
        $data['readList'] = $this->ReadList_model->getReadList();

		$this->load->view('_be/template/header', $data);
		$this->load->view('_be/template/navbar', $data);
		$this->load->view('_be/read_list', $data);
		$this->load->view('_be/template/footer');
	}

    public function accepted($id) {
        $this->db->update('read_tb', ['status' => 'accepted', 'start_date' => date('Y-m-d'), 'end_date' => date('Y-m-d')], ['read_id' => $id]);
        redirect('ReadList');
    }

    public function reject($id) {
        $this->db->update('read_tb', ['status' => 'rejected', 'start_date' => date('Y-m-d')], ['read_id' => $id]);
        redirect('ReadList');
    }
}
