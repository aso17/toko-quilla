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
        $this->load->model('transaksi_m');
    }
    public function index()
    {
        $id_transaksi = $this->transaksi_m->orderBy_kode_transaksi('id_transaksi', 'tb_transaksi', 'DESC')->row();

        if (empty($id_transaksi)) {
            $data['kode'] = 1;
            $kode['id_transaksi'] = 1;
        } else {

            $data['kode'] = $id_transaksi->id_transaksi + 1;
            $kode['id_transaksi'] = $id_transaksi->id_transaksi + 1;
        }


        $data['sub_total'] = $this->detail_m->total('tb_detail', 'total_harga', $kode)->row();
        // var_dump($data['sub_total']);
        // die;
        $data['detail_transaksi'] = $this->detail_m->get_join('tb_detail', $kode['id_transaksi'])->result();

        $data['barang'] = $this->barang_m->get_limit();
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
        $id_transaksi = $this->transaksi_m->orderBy_kode_transaksi('id_transaksi', 'tb_transaksi', 'DESC')->row();
        $id = $id_transaksi->id_transaksi;
        // $id_transaksi = $this->transaksi_m->orderBy_kode_transaksi('id_transaksi', 'tb_transaksi', 'DESC')->row();

        if (empty($id_transaksi)) {
            $data['kode'] = 1;
            $kode['id_transaksi'] = 1;
        } else {

            $data['kode'] = $id_transaksi->id_transaksi + 1;
            $kode['id_transaksi'] = $id_transaksi->id_transaksi + 1;
        }

        //pengecekan barang 
        $id_barang = $kode_barang;
        $id_jual = $kode['id_transaksi'];
        $detail_penjualan = $this->detail_m->get_byid($id_jual, $id_barang)->row();
        // var_dump($detail_penjualan);
        // die;
        if ($detail_penjualan == null) {

            $this->detail_m->creat($kode_barang, $harga_jual, $id);
        } else {
            $jml_beli = $detail_penjualan->jumlah_beli + 1;

            $total = $jml_beli *  $detail_penjualan->harga_jual;

            $this->detail_m->update($kode_barang, $id_jual, $jml_beli, $total);
            redirect('penjualan');
        }
    }

    public function hapus($id)
    {
        $pecah = explode('-', $id);
        $kondisi['id_transaksi'] = $pecah[0];
        $kondisi['kode_barang'] = $pecah[1];

        $this->detail_m->delete('tb_detail', $kondisi);
        $this->session->set_flashdata('warning', ' Transaksi di batalkan');
        redirect('penjualan');
    }

    public function bayar($total)
    {
        $id = $this->session->userdata('id_user');
        $sub = $total;
        $date = date('y-m-d h:i:s');
        $this->transaksi_m->creat($id, $sub, $date);
        $this->session->set_flashdata('success', 'pembayaran berhasil');
        redirect('penjualan');
    }
}