<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model {

    public function getBook($id = null) {
        if ($id == null) {
            $this->db->select('book_tb.*, collection_tb.liked, collection_tb.saved'); // Pilih kolom yang dibutuhkan
            $this->db->from('book_tb');
            $this->db->join(
                'collection_tb',
                'collection_tb.book_id = book_tb.book_id AND collection_tb.user_id = ' . $this->db->escape($this->session->userdata('user_id')) . ' AND collection_tb.deleted_at IS NULL',
                'left'
            );

            return $this->db->get()->result_array();
        } else {
            return $this->db->get_where('book_tb', ['book_id' => $id])->row();
        }
    }
    public function getBc($id = null) {
        if ($id == null) {
            $this->db->from('book_tb');
            $this->db->join('book_category_tb', 'book_tb.book_id = book_category_tb.book_id');
            $this->db->join('category_tb', 'book_category_tb.category_id = category_tb.category_id');
            return $this->db->get()->result_array();
        } else {
            return $this->db->get_where('book_category_tb', ['book_category_id' => $id])->row();
        }
    }

    public function addBook($data) {

    } 

    public function editBook($id, $data) {

    }

    public function deleteBook($id) {
        $book = $this->db->get_where('book_tb', ['book_id' => $id])->row();
        $delete = $this->db->delete('book_tb', ['book_id' => $id]);

        if($delete) {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Book deleted successfully!</div>');
            redirect('Books');
        } else {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Failed to delete book!</div>');
            redirect('Books');
        }
    }

    public function getFeBook() {
        $this->db->from('book_tb');
            $this->db->join('book_category_tb', 'book_tb.book_id = book_category_tb.book_id');
            $this->db->join('category_tb', 'book_category_tb.category_id = category_tb.category_id');
            return $this->db->get()->result_array();
    }

    public function getMyBook() {

        $this->db->from('collection_tb');
        $this->db->join('book_tb', 'collection_tb.book_id = book_tb.book_id');
        $this->db->join('read_tb', 'read_tb.book_id = book_tb.book_id', 'left');
        $this->db->where('collection_tb.user_id', $this->session->userdata('user_id'));
        $this->db->where('read_tb.user_id', $this->session->userdata('user_id'));
        $this->db->where('collection_tb.deleted_at', null);
        return $this->db->get()->result_array();
    }

    public function getIsLiked($book_id) {
        $this->db->where('book_id', $book_id);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('liked', 1);
        $this->db->where('deleted_at', null);
        $liked = $this->db->get('collection_tb')->row();
        if($liked) {
            return $liked;
        } else {
            return false;
        }
    }
    public function getIsSaved($book_id) {
        $this->db->where('book_id', $book_id);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('saved', 1);
        $this->db->where('deleted_at', null);

        $saved = $this->db->get('collection_tb')->row();
        if($saved) {
            return $saved;
        } else {
            return false;
        }
    }


 }