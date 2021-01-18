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
        // $data['id_user'] = $this->transaksi_m->getid();
        $this->templates->load('layout/template', 'penjualan/index', $data);
    }

    public function transaksi()
    {
        $this->templates->load('layout/template', 'penjualan/transaksi');
    }

    public function beli($kode_barang)
    {
        $jml_barang = $this->barang_m->getByid($kode_barang);
        $stok = $jml_barang['jml_barang'];
        // var_dump($jml_barang);
        // die;

        //pengecekan stok barang
        if ($stok > 0) {


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
                if ($stok > 3) {
                    $stok1 = $stok;
                    $stok2 = $stok1 - 1;
                    $this->session->set_flashdata('info', 'stok   tersisa' . ' ' . $stok2);
                    $this->session->unset_userdata('kode');
                    $this->detail_m->creat($kode_barang, $harga_jual, $id);
                } else {
                    $this->detail_m->creat($kode_barang, $harga_jual, $id);

                    redirect('penjualan');
                }
            } else {
                $jml_beli = $detail_penjualan->jumlah_beli + 1;

                $total = $jml_beli *  $detail_penjualan->harga_jual;

                $this->detail_m->update($kode_barang, $id_jual, $jml_beli, $total);
                redirect('penjualan');
            }
        } else {
            $this->session->set_flashdata('error', ' Maaf stok barang sudah habis');
            redirect('penjualan');
        }
    }

    public function hapus($id)
    {
        $pecah = explode('-', $id);
        $kondisi['id_transaksi'] = $pecah[0];
        $kondisi['kode_barang'] = $pecah[1];

        $this->detail_m->delete('tb_detail', $kondisi);
        $this->session->set_flashdata('warning', ' Transaksi di Batalkan');
        redirect('penjualan');
    }

    public function bayar($total)
    {
        $id = $this->session->userdata('id_user');
        $sub = $total;
        $date = date('y-m-d h:i:s');
        $this->transaksi_m->creat($id, $sub, $date);
        $this->session->set_flashdata('success', 'pembayaran berhasil');
        $dat = [
            "kode" => "status"
        ];
        $this->session->set_userdata($dat);


        redirect('penjualan');
    }

    public function print($kode_jual)
    {
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', 'U', 12);

        $pdf->SetTitle('Cetak pembelian');
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 

        $pdf->Cell(190, 7, 'Toko Quila', 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(190, 7, 'Jl.Jl.kadu Rt/RW 001/002 kec.Curug Tangerang', 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(190, 7, 'Tanggal Pembelian :' . date('l/d/m/y'), 0, 1, 'L');
        // $pdf->Cell(190, 7, , 0, 1, 'R');
        $pdf->Setfont('Arial', '', 11);
        $pdf->Cell(190, 7, '', 0, 1, 'L');
        $pdf->Cell(190, 7, 'Kasir :' . $this->session->userdata('nama_lengkap'), 0, 1, 'R');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(8, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        //lebar,tinggi,br
        $pdf->Cell(10, 6, 'No', 1, 0);
        $pdf->Cell(30, 6, 'kode transaksi', 1, 0);
        $pdf->Cell(30, 6, 'kode barang', 1, 0);
        $pdf->Cell(40, 6, 'Nama Barang', 1, 0);
        $pdf->Cell(40, 6, 'Tanggal pembelian', 1, 0);
        $pdf->Cell(40, 6, 'total harga', 1, 1);

        $pdf->SetFont('Arial', '', 10);

        $penjualan = $this->detail_m->penjualan($kode_jual);
        $kondisi['id_transaksi'] = $kode_jual;
        $grand = $this->detail_m->total('tb_detail', 'total_harga', $kondisi)->row();

        $i = 1;
        foreach ($penjualan as $row) {
            $pdf->Cell(10, 6, $i++, 1, 0);
            $pdf->Cell(30, 6, $row->id_transaksi, 1, 0);
            $pdf->Cell(30, 6, $row->kode_barang, 1, 0);
            $pdf->Cell(40, 6, $row->nama_barang, 1, 0);
            $pdf->Cell(40, 6, date("l/d/m/y"), 1, 0);
            $pdf->Cell(40, 6, 'Rp.' . number_format($row->total_harga), 1, 1);
        }
        $pdf->Cell(150, 6, 'Total Pembelian', 1, 0);
        $pdf->Cell(40, 6, 'Rp.' . number_format($grand->total), 1, 1);
        $pdf->Cell(8, 5, '', 0, 1);
        $pdf->Setfont('Arial', 'B', 11);
        $pdf->Cell(190, 7, 'Terima Kasih ... Selamat Belanja Kembali', 0, 1, 'C');
        $pdf->Output();
    }
}