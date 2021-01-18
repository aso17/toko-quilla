<?php
class barang_m extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->order_by('nama_barang', 'dsc');

        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_barang.id_kategori');
        $query = $this->db->get()->result();
        return $query;
    }
    public function get_limit()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->order_by('nama_barang', 'dsc');

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
            "kode_barang" => $post['kd_barang'],
            "id_kategori" => $post['kategori'],
            "nama_barang" => $post['nm_barang'],
            "ukuran" => $post['ukuran'],
            "warna" => $post['warna'],
            "jml_barang" => $post['jml_barang'],
            "merk" => $post['merk'],
            "harga_satuan" => $post['harga'],
            "tgl_creat" => $post['tgl_input'],
            "total" => $total,
            "harga_jual" => $untung,
        ];
        $this->db->insert('tb_barang', $data);
    }
    public function getBykode($kode)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('kode_barang', $kode);
        $query = $this->db->get()->row();
        return $query;
    }
    public function update($post)
    {
        $data = [
            "kode_barang" => $post['kd_barang'],
            "id_kategori" => $post['kategori'],
            "nama_barang" => $post['nm_barang'],
            "ukuran" => $post['ukuran'],
            "warna" => $post['warna'],
            "jml_barang" => $post['jml_barang'],
            "merk" => $post['merk'],
            "harga_satuan" => $post['harga'],
            "tgl_creat" => $post['tgl_input'],
        ];
        $this->db->set($data);
        $this->db->where('kode_barang', $post['kd_barang']);
        $this->db->update('tb_barang', $data);
    }
    public function hapus($kode_barang)
    {
        return $this->db->delete('tb_barang', ['kode_barang' => $kode_barang]);
    }
    function getByid($kode)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('kode_barang', $kode);
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_barang.id_kategori');
        $query = $this->db->get()->row_array();

        // $query = $this->db->get_where('tb_barang', ['kode_barang' => $kode])->row_array();
        return $query;
    }
    public function get_belumterjual()
    {
        $query = $this->db->query(
            "SELECT * FROM tb_barang WHERE kode_barang 
            NOT IN (SELECT kode_barang FROM tb_detail )"
        );
        return $query->result();
    }

    public function export()
    {

        $query = $this->db->query(
            "SELECT * FROM tb_barang WHERE kode_barang 
            NOT IN (SELECT kode_barang FROM tb_detail )"
        );

        return $query->result();
    }
    public function grand_total()
    {

        $query = $this->db->query(
            "SELECT * ,SUM(tb_barang.total) as tot FROM tb_barang WHERE kode_barang 
            NOT IN (SELECT kode_barang FROM tb_detail )"
        );

        return $query->row();
    }

    public function getCount()
    {
        $this->db->select('count(' . 'kode_barang' . ') as barang');
        // $this->db->where($kondisi);
        return $this->db->get('tb_barang')->row();
    }

    public function getId_count()
    {
        $query = $this->db->query(
            "SELECT * ,Count(tb_barang.kode_barang) as jual FROM tb_barang WHERE kode_barang 
            IN (SELECT kode_barang FROM tb_detail )"
        );

        return $query->row();
    }
}