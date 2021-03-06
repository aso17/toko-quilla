<?php
class detail_m extends CI_Model
{
    public function creat($kode, $harga, $id)
    {
        if (empty($id)) {
            $kode_jual = 1;
        } else {
            $kode_jual = $id + 1;
        }

        $id = $kode;
        $jml_beli = 1;
        $data = [

            'kode_barang' =>  $id,
            'id_transaksi' => $kode_jual,
            'tgl_input'    => date("Y.m.d"),
            'jumlah_beli'    => $jml_beli,
            'total_harga'    => $harga
        ];

        $this->db->insert('tb_detail', $data);
        redirect('penjualan');
    }
    public function get_join($tb_detail, $kode)
    {
        $this->db->select('*');
        $this->db->from($tb_detail);
        $this->db->where('id_transaksi', $kode);
        $this->db->join('tb_barang', 'tb_barang.kode_barang=tb_detail.kode_barang');
        return $this->db->get();
    }
    public function get_byid($id_jual, $id_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_detail');
        $this->db->where('id_transaksi', $id_jual);
        $this->db->where('tb_detail.kode_barang', $id_barang);
        $this->db->join('tb_barang', 'tb_barang.kode_barang=tb_detail.kode_barang');
        return $this->db->get();
    }
    public function update($kode_barang, $id_jual, $jml_beli, $total)
    {
        $this->db->set('jumlah_beli', $jml_beli);
        $this->db->set('total_harga', $total);
        $this->db->where('kode_barang', $kode_barang);
        $this->db->where('id_transaksi', $id_jual);
        $this->db->update('tb_detail');
    }
    public function delete($table, $kondisi)
    {
        return $this->db->delete($table, $kondisi);
    }
    public function total($table, $total, $kondisi)
    {
        $this->db->select('SUM(' . $total . ') as total');
        $this->db->where($kondisi);
        return $this->db->get($table);
    }
    public function laporan($tgl_awal, $tgl_ahir)
    {
        $this->db->select('*');
        $this->db->from('tb_detail');

        $this->db->where('tb_detail.tgl_input >=', $tgl_awal);
        $this->db->where('tb_detail.tgl_input <=', $tgl_ahir);

        $this->db->join('tb_barang', 'tb_barang.kode_barang=tb_detail.kode_barang');
        return $this->db->get()->result();
    }
    public function getAll_report($tgl_1, $tgl_2)
    {
        $this->db->select('*');
        $this->db->from('tb_detail');
        $this->db->where('tgl_input >=', $tgl_1);
        $this->db->where('tgl_input <=', $tgl_2);
        $query = $this->db->get();
        return $query->result();
    }

    public function penjualan($kode_jual)
    {
        $this->db->select('*');
        $this->db->from('tb_detail');
        $this->db->where('id_transaksi', $kode_jual);
        $this->db->join('tb_barang', 'tb_barang.kode_barang=tb_detail.kode_barang');
        $query = $this->db->get();
        return $query->result();
    }
}