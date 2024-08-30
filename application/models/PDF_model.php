<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PDF_model extends CI_Model {

    public function createToken($user_id, $book_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('book_id', $book_id);
        $query = $this->get('token_tb');

        if($query->num_rows() > 0) {
            return $query->row()->token;
        } else {
            $token = bin2hex(random_bytes(16));

            $data= [
                'user_id' => $user_id,
                'book_id' => $book_id,
                'token' => $token,
            ];
            
            $this->db->insert('token_tb', $data);

            return $token;
        }
    }

    public function veryfyToken($token, $user_id) {
        
    }

 }