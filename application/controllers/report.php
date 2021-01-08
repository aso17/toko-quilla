<?php
class report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklog();

        $this->load->model('kategori_m');
        $this->load->model('barang_m');
        $this->load->model('detail_m');
        $this->load->model('transaksi_m');
    }
    public function index()
    {
        $this->templates->load('layout/template', 'report/index');
    }

    public function hasil_report()
    {

        $kondisi['tgl_transaksi >='] = $this->input->post('awal');
        $kondisi['tgl_transaksi <='] = $this->input->post('ahir');
        $data['laporan'] = $this->transaksi_m->laporan('tb_transaksi', $kondisi);
        $data['total'] = $this->transaksi_m->total('tb_transaksi', 'sub_total', $kondisi)->row();

        $this->templates->load('layout/template', 'report/hasil_report', $data);
    }
}