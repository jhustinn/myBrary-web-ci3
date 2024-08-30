<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function cekLogin($username  , $password) {
        $cek = $this->db->get_where('user_tb', ['username' => $username])->row();

        if($cek != null ) {
            if($password == $cek->password) {
                if($cek->level == 'admin' || $cek->level == 'petugas') {
                    $data = [
                        'user_id' => $cek->user_id,
                        'name' => $cek->name,
                        'level' => $cek->level,
                    ];
                    $this->session->set_userdata($data);
                    redirect('Admin');
                } else if ($cek->level == 'peminjam') {
                    $data = [
                        'user_id' => $cek->user_id,
                        'name' => $cek->name,
                        'level' => $cek->level,
                    ];
                    $this->session->set_userdata($data);
                    redirect('Home');
                }
             } else { 
                 $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>Wrong password!</div>');
                 redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>User not found!</div>');
            redirect('Auth');
        }
        
    }

    public function register($data) { 
        $insert = $this->db->insert('user_tb', $data);
        if($insert) {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Account created successfully! Please Login.</div>');
            redirect('Auth');
        } else {
            $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Account created failed! Please Try again.</div>');
            redirect('Auth');
            
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message','<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> You have been successfully logged out!.</div>');
        redirect('Auth');
    }

}