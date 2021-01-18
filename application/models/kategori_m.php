<?php
class kategori_m extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $query = $this->db->get()->result();
        return $query;
    }
    public function tambah()
    {
        $post = $this->input->post();
        $data = [
            "id_kategori" => uniqid('ka'),
            "kategori_barang" => $post['kategori'],
            "satuan" => $post['satuan'],
            "tgl_tambah" => $post['tgl']
        ];
        $this->db->insert('tb_kategori', $data);
    }
    public function hapus($id_kategori)
    {
        return $this->db->delete('tb_kategori', ['id_kategori' => $id_kategori]);
    }
    public function getCount()
    {
        $this->db->select('count(' . 'id_kategori' . ') as kat');

        return $this->db->get('tb_kategori')->row();
    }
}