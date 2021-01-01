<?php
class databarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklog();

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
        $validation->set_rules('kd_barang', 'Kode Barang', 'trim|required');
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
            $this->session->set_flashdata('success', 'Data barang berhasil di tambah');
            redirect('databarang');
        }
    }



    public function delete($id_barang)
    {
        $this->barang_m->hapus($id_barang);
        $this->session->set_flashdata('success', 'Data Barang berhasil di hapus');
        redirect('databarang');
    }

    public function cari()
    {
        $kode = $this->input->post('kd_barang');
        $data['barang'] = $this->barang_m->get_data_barang_bykode($kode);
        var_dump($data['barang']);
        die;
        echo json_encode($data);
    }
}