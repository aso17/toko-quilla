<?php
class Penjualan extends CI_Controller
{
    public function index()
    {
        $this->templates->load('layout/template', 'penjualan/index');
    }
}