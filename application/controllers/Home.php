<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Book_model');
        $this->load->model('PDF_model');
        $this->load->model('User_model');
    }

	public function index()
	{

        $data['title'] = "Home";
        $data['books'] = $this->Book_model->getBook();

		$this->load->view('_fe/template/header', $data);
		$this->load->view('_fe/template/navbar');
		$this->load->view('_fe/home', $data);
		$this->load->view('_fe/template/footer');
	}

    public function subscription() {
        $data['title'] = "Subscription";
        $data['user'] = $this->User_model->getUser($this->session->userdata('user_id'));

		$this->load->view('_fe/template/header', $data);
		$this->load->view('_fe/template/navbar');
		$this->load->view('_fe/pricing', $data);
		$this->load->view('_fe/template/footer');
    }

    public function save($book_id) {
        $is_saved = $this->Book_model->getIsSaved($book_id);

        if($is_saved) {
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('book_id', $book_id);
            $this->db->update('collection_tb', ['saved' => 0]);
            redirect('Home/myBook');
        } else {
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('book_id', $book_id);
            $this->db->where('deleted_at', null);

            $collection = $this->db->get('collection_tb')->row();
            if($collection) {
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('book_id', $book_id);
            $this->db->update('collection_tb', ['saved' => 1]);
            redirect('Home/myBook');
        } else {
            $this->db->insert('read_tb', ['user_id' => $this->session->userdata('user_id'), 'book_id' => $book_id, 'status' => 'not_requested']);
            $this->db->insert('collection_tb', ['user_id' => $this->session->userdata('user_id'), 'book_id' => $book_id]);
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('book_id', $book_id);
            $this->db->update('collection_tb', ['saved' => 1]);
            redirect('Home/myBook');
                
            }
        }
    }
    
    public function like($book_id) {
        $is_liked = $this->Book_model->getIsLiked($book_id);


        if($is_liked) {
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('book_id', $book_id);
            $this->db->update('collection_tb', ['liked' => 0]);
            redirect('Home/myBook');
        } else {
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('book_id', $book_id);
            $this->db->where('deleted_at', null);
            $collection = $this->db->get('collection_tb')->row();
            if($collection) {
                $this->db->where('user_id', $this->session->userdata('user_id'));
                $this->db->where('book_id', $book_id);
                $this->db->update('collection_tb', ['liked' => 1]);
                redirect('Home/myBook');
            } else {
                $this->db->insert('read_tb', ['user_id' => $this->session->userdata('user_id'), 'book_id' => $book_id, 'status' => 'not_requested']);
                $this->db->insert('collection_tb', ['user_id' => $this->session->userdata('user_id'), 'book_id' => $book_id]);
                $this->db->where('user_id', $this->session->userdata('user_id'));
                $this->db->where('book_id', $book_id);
                $this->db->update('collection_tb', ['liked' => 1]);
                redirect('Home/myBook');
            }
        }
        
    }

    public function Read($id, $status) {
        if($this->session->userdata('user_id')) {
            if($status == 'not_requested') {
                $data = [
                    'book_id' => $id,
                    'user_id' => $this->session->userdata('user_id'),
                    'status' => 'pending'
                ];

                $this->db->update('read_tb', $data);
                $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>Read Request successfully! Please see on your book collection.</div>');
            redirect('Home');
            } else if($status == 'pending') {

                $data = [
                    'book_id' => $id,
                    'user_id' => $this->session->userdata('user_id'),
                    'status' => 'pending'
                ];
                $collection = [
                    'book_id' => $id,
                    'user_id' => $this->session->userdata('user_id'),
                ];

                $this->db->insert('collection_tb', $collection);
                $this->db->insert('read_tb', $data);
                $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>Read Request successfully! Please see on your book collection.</div>');
            redirect('Home');
            } else if ($status == 'accepted') {
                $token = $this->PDF_model->createToken($this->session->userdata('user_id'), $id);

                var_dump($token);die;
            } else {
                echo "error";die;
            }
        } else {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Please login first!</div>');
            redirect('Auth');
        }
    }

    public function myBook() {

        $data['title'] = "My Book";
        $data['myBook'] = $this->Book_model->getMyBook();

        $this->load->view('_fe/template/header', $data);
		$this->load->view('_fe/template/navbar');
		$this->load->view('_fe/myBook', $data);
		$this->load->view('_fe/template/footer');
    }

    public function deleteCollection($id, $status) {

        if($status == 'not_requested') {
            $collection = $this->db->get_where('collection_tb', ['collection_id' => $id])->row();
            $this->db->where('book_id', $collection->book_id);
            $this->db->where('user_id', $collection->user_id);
            $this->db->delete('read_tb');
            $this->db->update('collection_tb',  ['deleted_at' => date('Y-m-d')],['collection_id' => $id]);
            redirect('Home/myBook');
        } else if($status == 'pending') {
            $collection = $this->db->get_where('collection_tb', ['collection_id' => $id])->row();
            $this->db->where('book_id', $collection->book_id);
            $this->db->where('user_id', $collection->user_id);
            $this->db->update('read_tb', ['status' => 'canceled']);  
            $this->db->update('collection_tb',  ['deleted_at' => date('Y-m-d')],['collection_id' => $id]);
            redirect('Home/myBook');
        } else if($status == "accepted") {
            $collection = $this->db->get_where('collection_tb', ['collection_id' => $id])->row();
            $this->db->where('book_id', $collection->book_id);
            $this->db->where('user_id', $collection->user_id);
            $this->db->update('read_tb', ['deleted_at' => date('Y-m-d')]);  
            $this->db->update('collection_tb', ['deleted_at' => date('Y-m-d')], ['collection_id' => $id]);
            redirect('Home/myBook');
        }

    }
}
