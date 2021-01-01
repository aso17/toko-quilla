<?php
class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklog();

        $this->load->model('kategori_m');
        $this->load->model('barang_m');
        $this->load->model('detail_m');
    }
    public function index()
    {
        $data['barang'] = $this->barang_m->get_limit();
        //var_dump($data['barang']);
        $this->templates->load('layout/template', 'penjualan/index', $data);
    }

    public function transaksi()
    {
        $this->templates->load('layout/template', 'penjualan/transaksi');
    }

    public function beli($kode_barang)
    {
        $harga = $this->barang_m->getByid($kode_barang);
        $harga_jual = $harga['harga_jual'];
        $this->detail_m->creat($kode_barang, $harga_jual);
    }
}