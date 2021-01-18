<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		ceklog();

		$this->load->model('kategori_m');
		$this->load->model('barang_m');
		$this->load->model('transaksi_m');
	}

	public function index()
	{
		$data['qty_product'] = $this->barang_m->getcount();
		$data['category'] = $this->kategori_m->getcount();
		$data['terjual'] = $this->barang_m->getId_count();
		$data['pelanggan'] = $this->transaksi_m->getCount();

		$this->templates->load('layout/template', 'dashboard/index', $data);
	}
}