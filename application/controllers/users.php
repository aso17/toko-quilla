<?php
defined('BASEPATH') or exit('No direct script access allowed');

class users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklog();

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

    public function delete($id_user)
    {
        $this->users_m->hapus($id_user);
        $this->session->set_flashdata('success', 'Data User Berhasil Di Hapus');

        redirect('users', 'refresh');
    }

    public function ubah_password()
    {
        $validation = $this->form_validation;
        $validation->set_rules('pass', 'Password', 'trim|required');
        $validation->set_rules('pass_baru', 'Pasword baru', 'trim|required|min_length[3]|matches[konfirmasi_pass]');
        $validation->set_rules('konfirmasi_pass', 'Konfirmasi Password Baru', 'trim|required|min_length[3]|matches[pass_baru]');
        if ($validation->run() == false) {

            $this->templates->load('layout/template', 'users/ubah_password');
        } else {
            $id_user = $this->session->userdata('id_user');
            $users = $this->users_m->get_byid($id_user);
            // var_dump($users);
            // die;
            $pass = $this->input->post('pass');
            if (!password_verify($pass, $users['password'])) {

                $this->session->set_flashdata('error', 'Password lama Salah');
                redirect('users/ubah_password', 'refresh');
            } else {
                $pass_baru = $this->input->post('pass_baru');
                $pass_lama = $users['password'];
                if ($pass_baru == $pass_lama) {
                    $this->session->set_flashdata('error', 'Password sama dengan Password lama');
                    redirect('users/ubah_password', 'refresh');
                } else {
                    $pass_hash = password_hash($pass_baru, PASSWORD_BCRYPT);
                    $this->db->set('password', $pass_hash);
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('tb_user');
                    $this->session->set_flashdata('success', 'Password Berhasil di ubah');
                    redirect('users/ubah_password', 'refresh');
                }
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->unset_userdata('image');
        redirect('loginPortal/index');
    }
}