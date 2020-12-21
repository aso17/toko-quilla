<?php
class kategori_m extends CI_Model
{
    public function tambah()
    {
        $post = $this->input->post();
        $data = [
            "id_kategori" => uniqid('ka'),
            "kategori_barang" => $post['kategori'],
            "satuan" => $post['satuan'],
            "tgl_input" => $post['tgl']
        ];
        $this->db->insert('tb_kategori', $data);
    }
}