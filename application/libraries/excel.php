<?php
class Excel
{
    public function __construct()
    {
        require_once APPPATH . '/third_party/PHPExcel-1.8/Classes/PHPExcel.php';
        require_once APPPATH . '/third_party/PHPExcel-1.8/Classes/Writer/Excel2007.php';
    }
}