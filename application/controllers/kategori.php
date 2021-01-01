<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_m');
    }

    public function index()
    {
        $data['kategori'] = $this->kategori_m->getAll();

        $this->templates->load('layout/template', 'databarang/kategori', $data);
    }
    public function tambahkategori()
    {

        $validation = $this->form_validation;
        $validation->set_rules('kategori', 'Kategori Barang', 'trim|required');
        $validation->set_rules('satuan', 'Satuan', 'trim|required');
        $validation->set_rules('tgl', 'Tanggal input', 'trim|required');

        if ($validation->run() == false) {


            $this->templates->load('layout/template', 'databarang/tambah_kategori');
        } else {

            $this->kategori_m->tambah();
            $this->session->set_flashdata('success', 'Kategori barang berhasil di tambah');
            redirect('databarang/kategori');
        }
    }
    public function delete($id)
    {
        $this->kategori_m->hapus($id);
        $this->session->set_flashdata('success', 'Kategori Barang berhasil di hapus');
        redirect('kategori');
    }
}