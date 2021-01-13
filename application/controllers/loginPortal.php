<?php
defined('BASEPATH') or exit('No direct script access allowed');

class loginPortal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_log();
        $this->load->model('users_m');
    }
    public function index()
    {
        $validation = $this->form_validation;
        $validation->set_rules('username', 'username', 'trim|required');
        $validation->set_rules('password', 'password', 'trim|required');
        if ($validation->run() == false) {
            $this->load->view('login/index');
        } else {
            $post = $this->input->post();
            $username = $post['username'];
            $users = $this->users_m->get_input_post($username);
            //var_dump($users);

            if ($users != null) {
                $pass = $this->input->post('password');
                if (password_verify($pass, $users['password'])) {

                    $session = [
                        "id_user" => $users['id_user'],
                        "role" => $users['role'],
                        "username" => $users['username'],
                        "image" => $users['image'],
                        "nama_lengkap" => $users['nama_lengkap'],
                    ];
                    $this->session->set_userdata($session);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'password anda salah');
                    redirect('loginPortal');
                }
            } else {
                $this->session->set_flashdata('warning', 'Anda belum terdaftar');
                redirect('loginPortal');
            }
        }
    }
}