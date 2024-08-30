<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getUser($id = null) {
        if ($id == null) {
            return $this->db->get('user_tb')->result_array();
        } else {
            return $this->db->get_where('user_tb', ['user_id' => $id])->row();
        }
    }

    public function getPetugas($id = null) {
        if ($id == null) {
            return $this->db->get_where('user_tb', ['level' => 'petugas'])->result_array();
        } else {
            $this->db->from('user_tb');
            $this->db->where('user_id', $id);
            $this->db->where('level', 'petugas');
            return $this->db->get()->row();
        }
    }

 }