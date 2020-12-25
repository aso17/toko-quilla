<?php
defined('BASEPATH') or exit('No direct script access allowed');

class users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_m');
    }

    public function index()
    {
        $data['users'] = $this->users_m->getAll();
        $this->templates->load('layout/template', 'users/index', $data);
    }
    public function tambah()
    {
        $this->templates->load('layout/template', 'users/tambah');
    }
    public function proces()
    {
        $validation = $this->form_validation;
        $validation->set_rules('nik', 'Nik', 'trim|required');
        $validation->set_rules('nm_lengkap', 'Nama lengkap', 'trim|required');
        $validation->set_rules('no_tlp', 'Nomer telpon', 'trim|required');
        $validation->set_rules('username', 'Username', 'trim|required');

        $validation->set_rules('password', 'Pasword', 'trim|required');


        if ($validation->run() == false) {

            $this->templates->load('layout/template', 'users/tambah');
        } else {

            $this->users_m->tambah();

            $this->session->set_flashdata('success', 'Data users berhasil di tambah');
            redirect('users');
        }
    }
}