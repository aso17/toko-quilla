<?php
class databarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_m');
        $this->load->model('barang_m');
    }
    public function index()
    {
        $data['barang'] = $this->barang_m->getAll();
        $this->templates->load('layout/template', 'databarang/index', $data);
    }
    public function tambah_barang()
    {
        $validation = $this->form_validation;
        $validation->set_rules('nm_barang', 'Nama barang', 'trim|required');
        $validation->set_rules('kategori', 'pilih Kategori', 'trim|required');
        $validation->set_rules('ukuran', 'ukuran', 'trim|required');
        $validation->set_rules('warna', 'warna', 'trim|required');
        $validation->set_rules('merk', 'merk', 'trim|required');
        $validation->set_rules('jml_barang', 'jumlah barang', 'trim|required');
        $validation->set_rules('harga', 'harga', 'trim|required');
        $validation->set_rules('tgl_input', 'tanggal input', 'trim|required');

        if ($validation->run() == false) {


            $data['kategori'] = $this->kategori_m->getAll();
            $this->templates->load('layout/template', 'databarang/tambah_barang', $data);
        } else {

            $this->barang_m->tambah();
            $this->session->set_flashdata('success', 'barang barang berhasil di tambah');
            redirect('databarang');
        }
    }

    public function kategori()
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
}