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
	}

	public function index()
	{
		$this->templates->load('layout/template', 'dashboard/index');
	}
}