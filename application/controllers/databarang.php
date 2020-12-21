<?php
class databarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_m');
    }
    public function index()
    {

        $this->templates->load('layout/template', 'databarang/index');
    }
    public function tambah_barang()
    {
        $this->templates->load('layout/template', 'databarang/tambah_barang');
    }

    public function kategori()
    {
        $this->templates->load('layout/template', 'databarang/kategori');
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
            $this->session->set_flashdata('success', 'Kategori barang');
            redirect('databarang/kategori');
        }
    }
}