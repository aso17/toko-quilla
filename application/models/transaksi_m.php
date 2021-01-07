<?php
class transaksi_m extends CI_Model
{
    public function orderBy_kode_transaksi($id_transaksi, $tb_transaksi, $oder)
    {
        $this->db->order_by($id_transaksi, $oder);
        return $this->db->get($tb_transaksi);
    }

    public function creat($id, $sub, $date)
    {
        $data = [


            'tgl_transaksi'    => $date,
            'sub_total'    => $sub,
            'id_user'    => $id
        ];

        $this->db->insert('tb_transaksi', $data);
    }
    public function laporan($table, $kondisi)
    {
        return $this->db->get_where($table, $kondisi)->result();
    }
    public function total($table, $total, $kondisi)
    {
        $this->db->select('SUM(' . $total . ') as total');
        $this->db->where($kondisi);
        return $this->db->get($table);
    }
}