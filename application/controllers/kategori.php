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
            $data['judul'] = "Tambah kategori";

            $this->templates->load('layout/template', 'databarang/form_kategori', $data);
        } else {

            $this->kategori_m->tambah();
            $this->session->set_flashdata('success', 'Kategori barang berhasil di tambah');
            redirect('kategori');
        }
    }
    public function ubah($id)
    {
        $data['judul'] = "ubah kategori";
        $data['kategory'] = $this->kategori_m->getByid($id);
        $this->templates->load('layout/template', 'databarang/form_kategori', $data);
    }
    public function editkategori()
    {

        $post = $this->input->post();
        $this->kategori_m->update($post);
        $this->session->set_flashdata('success', 'Kategori  berhasil di Ubah');

        redirect('kategori', 'refresh');
    }
    public function delete($id)
    {
        $this->kategori_m->hapus($id);
        $this->session->set_flashdata('success', 'Kategori Barang berhasil di hapus');
        redirect('kategori');
    }
}