<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{

	public function index()
	{
		$this->templates->load('layout/template', 'dashboard/index');
	}
}