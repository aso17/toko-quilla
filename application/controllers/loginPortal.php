<?php
defined('BASEPATH') or exit('No direct script access allowed');

class loginPortal extends CI_Controller
{

    public function index()
    {
        $this->load->view('login/index');
    }
}