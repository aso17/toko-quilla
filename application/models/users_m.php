<?php
class users_m extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getBynik($nik)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('nik_ktp', $nik);
        $query = $this->db->get()->result();
        return $query;
    }
    public function tambah()
    {


        $p = $this->input->post(null, true);
        $file = $_FILES['foto'];
        if ($file) {
            $config['upload_path'] = './assets/images/user/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']     = '10000';
            $config['file_name']     = 'users';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->id_user = uniqid('usr');
        $this->nik_ktp = $p['nik'];
        $this->nama_lengkap = $p['nm_lengkap'];
        $this->username = $p['username'];
        $this->no_telpon = $p['no_tlp'];
        $this->image = $foto;
        $this->password = password_hash($p['password'], PASSWORD_BCRYPT);
        $this->role = $p['role'];


        $this->db->insert('tb_user', $this);
    }

    public function get_input_post($username)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('username', $username);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function hapus($id_user)
    {
        return $this->db->delete('tb_user', ['id_user' => $id_user]);
    }
    public function get_byid($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get()->row_array();
        return $query;
    }
}