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
        $data['laporan'] = $this->detail_m->laporan($_POST['awal'], $_POST['ahir']);
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
    public function cetak_excel($tgl1, $tgl2)
    {
        include_once APPPATH . '/third_party/xlsxwriter.class.php';
        ini_set('display_errors', 0);
        ini_set('log_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);

        $filename = "report-" . date('d-m-Y-H-i-s') . ".xlsx";
        header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        $styles = array('widths' => [3, 20, 30, 40], 'font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#eee', 'halign' => 'center', 'border' => 'left,right,top,bottom');
        $styles2 = array(
            [
                'font' => 'Arial',
                'font-size' => 10,
                'font-style' => 'bold',
                'fill' => '#eee',
                'halign' => 'left',
                'border' => 'left,right,top,bottom',
                'fill' => ''
            ],
            ['fill' => ''],
            ['fill' => ''],
            ['fill' => ''],
            ['fill' => ''],
            ['fill' => ''],
            ['fill' => ''],
            ['fill' => ''],
        );

        $header = array(
            'No' => 'integer',
            'Nama toko' => 'string',
            'Nama As' => 'string',
            'No Ttd' => 'string',
            'No Nrb' => 'string',
            'Tgl Input' => 'string',
            'Keterangan' => 'string',
            'Nama Driver' => 'string',
        );

        $writer = new XLSXWriter();
        $writer->setAuthor('A_so');

        $writer->writeSheetHeader('Sheet1', $header, $styles, $styles2);
        $no = 1;
        $nofisik = $this->Laporan_model->getAllexcel($tgl1, $tgl2);

        foreach ($nofisik as $r) {
            $writer->writeSheetRow('Sheet1', [$no, $r->nama_toko, $r->nama_as, $r->no_ttd, $r->no_nrb, $r->tgl_input, $r->keterangan, $r->nama_driver,], $styles2);
            $no++;
        }
        $writer->writeToStdOut();
    }
}