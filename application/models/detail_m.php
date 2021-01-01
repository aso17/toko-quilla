<?php
class detail_m extends CI_Model
{
    public function creat($kode, $harga)
    {
        $id = $kode;
        $id_penjualan = 1;

        $data = [

            'kode_barang' =>  $id,
            'id_penjualan' => $id_penjualan,
            'tgl_input'    => date('Y/m/d'),
            'harga'    => $harga
        ];

        $this->db->insert('tb_detail', $data);
        redirect('penjualan');
    }
}