<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->model('Book_model');
        $this->load->model('Category_model');
    }


	public function index()
	{

        $data['title'] = "Dashboard";
        $data["user"] = $this->User_model->getUser($this->session->userdata("user_id"));
        $data['books'] = $this->Book_model->getBook();
        $data['categories'] = $this->Category_model->getCategory();
        $data['bc'] = $this->Book_model->getBc();
        

		$this->load->view('_be/template/header', $data);
		$this->load->view('_be/template/navbar', $data);
		$this->load->view('_be/books', $data);
		$this->load->view('_be/template/footer');
	}

    public function addBookCategory() {
        $data = [
           'book_id' => $this->input->post('book_id'),
           'category_id' => $this->input->post('category_id')
        ];

        $insert = $this->db->insert('book_category_tb', $data);
        if($insert) {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Books category created successfully!</div>');
            redirect('Books');
        } else {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Failed to create Books category!</div>');
            redirect('Books');
        }
    }
    public function deleteBc($id) {

        $insert = $this->db->delete('book_category_tb', $id);
        if($insert) {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Books category created successfully!</div>');
            redirect('Books');
        } else {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Failed to create Books category!</div>');
            redirect('Books');
        }
    }

    public function AddBook() {
        $title = $this->input->post('title');
        $writter = $this->input->post('writter');
        $penerbit = $this->input->post('penerbit');
        $release_year = $this->input->post('realese_year');

        if(isset($_FILES['poster']) && $_FILES['poster']['name']) {
            $config['allowed_types'] = '*';
            $config['max_size'] = '*';
            $config['upload_path'] = 'assets/image/poster';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('poster')) {
                 $poster = $this->upload->file_name;
             } else {
                echo "Poster : " . $this->upload->display_errors();die;
             }
        } else {
            $this->session->set_flashdata('message','Tolong pilih gambar');
            redirect('Books');
        }

        $this->upload->initialize([
            'allowed_types' => '*',
            'max_size' => '*',
            'upload_path' => 'assets/file',
        ]);

        if(isset($_FILES['file']) && $_FILES['file']['name']) {
            

            $this->load->library('upload', $config);

            if($this->upload->do_upload('file')) {
                 $file = $this->upload->file_name;
             } else {
                echo "File : " . $this->upload->display_errors();die;
             }
        } else {
            $this->session->set_flashdata('message','Tolong pilih file pdf');
            redirect('Books');
        }

        $data = [
            'title' => $title,
            'writter' => $writter,
            'penerbit' => $penerbit,
            'release_year' => $release_year,
            'poster' => $poster,
            'file' => $file,
        ];

        $insert = $this->db->insert('book_tb', $data);
        if($insert) {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Books created successfully!</div>');
            redirect('Books');
        } else {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Failed to create Books!</div>');
            redirect('Books');
        }

    }

    public function EditBook() {
    
    }

    public function deleteBook($id) {
        $this->Book_model->deleteBook($id);
    }

}