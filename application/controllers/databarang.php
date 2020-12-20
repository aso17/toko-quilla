<?php
class databarang extends CI_Controller
{
    public function index()
    {

        $this->templates->load('layout/template', 'databarang/index');
    }

    public function kategori()
    {
        $this->templates->load('layout/template', 'databarang/kategori');
    }
}