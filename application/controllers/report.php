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

        $kondisi['tgl_input >='] = $this->input->post('awal');
        $kondisi['tgl_input <='] = $this->input->post('ahir');
        $data['tgl_awal'] = $this->input->post('awal');
        $data['tgl_ahir'] = $this->input->post('ahir');
        $post = $this->input->post();
        $tgl_awal = $post['awal'];
        $tgl_ahir = $post['ahir'];
        $data['laporan'] = $this->detail_m->laporan($tgl_awal, $tgl_ahir);
        $data['total'] = $this->detail_m->total('tb_detail', 'total_harga', $kondisi)->row();

        $this->templates->load('layout/template', 'report/hasil_report', $data);
    }
    public function belum_terjual()
    {
        $data['barang'] = $this->barang_m->get_belumterjual();
        $this->templates->load('layout/template', 'report/belum_terjual', $data);
    }
    public function cetak_pdf($tgl_awal, $tgl_ahir)
    {
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', 'U', 12);

        $pdf->SetTitle('report Penjualan');
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 

        $pdf->Cell(190, 7, 'Toko Quila', 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(190, 7, 'Jl.Jl.kadu Rt/RW 001/002 kec.Curug Tangerang', 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, ' LAPORAN PENJUALAN ', 0, 1, 'C');
        $pdf->Setfont('Arial', 'B', 11);
        $pdf->Cell(190, 7, 'Tanggal', 0, 1, 'C');
        $pdf->Cell(190, 7, $tgl_awal, 0, 1, 'C');
        $pdf->Cell(190, 7, 's/d', 0, 1, 'C');
        $pdf->Cell(190, 7, $tgl_ahir, 0, 1, 'C');
        $pdf->Cell(190, 7, 'User :' . $this->session->userdata('nama_lengkap'), 0, 1, 'R');




        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        //lebar,tinggi,br
        $pdf->Cell(10, 6, 'No', 1, 0);
        $pdf->Cell(30, 6, 'kode transaksi', 1, 0);
        $pdf->Cell(30, 6, 'kode barang', 1, 0);
        $pdf->Cell(40, 6, 'Nama Barang', 1, 0);
        $pdf->Cell(40, 6, 'Tanggal Penjualan', 1, 0);
        $pdf->Cell(40, 6, 'Pendapatan', 1, 1);

        $pdf->SetFont('Arial', '', 10);

        $penjualan = $this->detail_m->laporan($tgl_awal, $tgl_ahir);
        $kondisi['tgl_input>='] = $tgl_awal;
        $kondisi['tgl_input<='] = $tgl_ahir;
        $grand = $this->detail_m->total('tb_detail', 'total_harga', $kondisi)->row();

        $i = 1;
        foreach ($penjualan as $row) {
            $pdf->Cell(10, 6, $i++, 1, 0);
            $pdf->Cell(30, 6, $row->id_transaksi, 1, 0);
            $pdf->Cell(30, 6, $row->kode_barang, 1, 0);
            $pdf->Cell(40, 6, $row->nama_barang, 1, 0);
            $pdf->Cell(40, 6, $row->tgl_input, 1, 0);
            $pdf->Cell(40, 6, number_format($row->total_harga), 1, 1);
        }
        $pdf->Cell(150, 6, 'Total Penjualan', 1, 0);
        $pdf->Cell(40, 6, number_format($grand->total), 1, 1);
        $pdf->Output();
    }
    public function exportPdf()
    { {
            $this->load->library('pdf');
            $pdf = new FPDF('l', 'mm', 'A5');
            // membuat halaman baru
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times', 'U', 12);

            $pdf->SetTitle('report Barang Belum Terjual');
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial', 'B', 16);
            // mencetak string 

            // echo $foto = base_url() . 'assets/images/logo.png';
            $pdf->Cell(190, 7, 'Toko Quilla', 0, 1, 'L');
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(190, 7, 'Jl.Jl.kadu Rt/RW 001/002 kec.Curug Tangerang', 0, 1, 'L');
            $pdf->SetFont('Arial', 'B', 12);

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(190, 7, ' LAPORAN Barang Belum Terjual', 0, 1, 'C');
            $pdf->Setfont('Arial', 'B', 11);
            $pdf->Cell(190, 7, 'Tanggal Cetak', 0, 1, 'C');
            $pdf->Cell(190, 7, date('l/d/m/y'), 0, 1, 'C');
            // $pdf->Cell(190, 7, 's/d', 0, 1, 'C');
            // $pdf->Cell(190, 7, $tgl_ahir, 0, 1, 'C');
            $pdf->Cell(190, 7, 'User :' . $this->session->userdata('nama_lengkap'), 0, 1, 'R');




            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10, 7, '', 0, 1);
            $pdf->SetFont('Arial', 'B', 10);
            //lebar,tinggi,br
            $pdf->Cell(10, 6, 'No', 1, 0);
            // $pdf->Cell(30, 6, 'kode transaksi', 1, 0);
            $pdf->Cell(30, 6, 'kode barang', 1, 0);
            $pdf->Cell(40, 6, 'Nama Barang', 1, 0);
            $pdf->Cell(40, 6, 'Merek', 1, 0);
            $pdf->Cell(35, 6, 'harga jual', 1, 0);
            $pdf->Cell(15, 6, 'Stok', 1, 0);
            $pdf->Cell(25, 6, 'Total', 1, 1);

            $pdf->SetFont('Arial', '', 10);

            $penjualan = $this->barang_m->export();
            $grand = $this->barang_m->grand_total();
            // var_dump($grand);
            // die;
            $i = 1;
            foreach ($penjualan as $row) {
                $pdf->Cell(10, 6, $i++, 1, 0);
                // $pdf->Cell(30, 6, $row->id_kategori, 1, 0);
                $pdf->Cell(30, 6, $row->kode_barang, 1, 0);
                $pdf->Cell(40, 6, $row->nama_barang, 1, 0);
                $pdf->Cell(40, 6, $row->merk, 1, 0);
                $pdf->Cell(35, 6, 'Rp.' . number_format($row->harga_jual), 1, 0);
                $pdf->Cell(15, 6, $row->jml_barang, 1, 0);
                $pdf->Cell(25, 6, 'Rp.' . number_format($row->total), 1, 1);
                // $pdf->Cell(40, 6, number_format($row->total_harga), 1, 1);
            }
            $pdf->Cell(170, 6, 'Grand Total', 1, 0);
            $pdf->Cell(25, 6, 'Rp.' . number_format($grand->tot), 1, 1);
            $pdf->Output();
        }
    }
}