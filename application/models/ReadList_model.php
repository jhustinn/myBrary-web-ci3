<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReadList_model extends CI_Model {

    public function getReadList($id = null) {
        if ($id == null) {
            $this->db->from('read_tb');
            $this->db->join('book_tb', 'read_tb.book_id = book_tb.book_id');
            $this->db->join('user_tb','read_tb.user_id = user_tb.user_id');
            $this->db->where('status !=','not_requested');
            return $this->db->get()->result_array();
        } else {
            return $this->db->get_where('read_tb', ['read_id' => $id])->row();
        }
    }


 }