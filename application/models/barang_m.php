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
            "tgl_input" => $post['tgl_input'],
            "total" => $total,
            "harga_jual" => $untung,
        ];
        $this->db->insert('tb_barang', $data);
    }
    public function hapus($kode_barang)
    {
        return $this->db->delete('tb_barang', ['kode_barang' => $kode_barang]);
    }
    function getByid($kode)
    {
        $query = $this->db->get_where('tb_barang', ['kode_barang' => $kode])->row_array();
        return $query;
        //     $this->db->select('*');
        //     $this->db->from('tb_barang');
        //     $this->db->where('kode_barang', $kode);
        //     $hsl = $this->db->get()->result();
        // if ($hsl->num_rows() > 0) {
        //     foreach ($hsl->result() as $data) {
        //         $hasil = [
        //             "kode_barang" => $data->kode_barang,
        //             "id_kategori" => $data->id_kategori,
        //             "nama_barang" => $data->nama_barang,
        //             "ukuran" => $data->ukuran,
        //             "warna" => $data->warna,
        //             "jml_barang" => $data->jml_barang,
        //             "merk" => $data->merk,
        //             "harga_satuan" => $data->harga_satuan,
        //             "tgl_input" => $data->tgl_input,
        //             "total" => $data->total,
        //             "harga_jual" => $data->harga_jual
        //         ];
        //     }
        // }
        // return $hsl;
    }
    public function get_belumterjual()
    {
        $query = $this->db->query(
            "SELECT * FROM tb_barang WHERE kode_barang 
            NOT IN (SELECT kode_barang FROM tb_detail )"
        );
        return $query->result();
    }
}