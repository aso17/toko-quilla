<?php
class barang_m extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_barang.id_kategori');
        $query = $this->db->get()->result();
        return $query;
    }
    public function tambah()
    {
        $post = $this->input->post();
        $harga = $post['harga'];
        $jml = $post['jml_barang'];
        $total = $harga * $jml;
        $jual = 30 / 100 * $harga;
        $untung = $harga + $jual;
        $data = [
            "id_barang" => uniqid('ba'),
            "id_kategori" => $post['kategori'],
            "nama_barang" => $post['nm_barang'],
            "ukuran" => $post['ukuran'],
            "warna" => $post['warna'],
            "jml_barang" => $post['jml_barang'],
            "merk" => $post['merk'],
            "harga_satuan" => $post['harga'],
            "tgl_input" => $post['tgl_input'],
            "total" => $total,
            "harga_jual" => $untung,
        ];
        $this->db->insert('tb_barang', $data);
    }
    public function hapus($id_barang)
    {
        return $this->db->delete('tb_barang', ['id_barang' => $id_barang]);
    }
}