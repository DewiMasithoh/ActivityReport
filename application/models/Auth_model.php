<?php
#===================================================|
# Please DO NOT modify this information :			      |
#---------------------------------------------------|
# @Author 		: Susantokun
# @Date 		  : 2018-05-26T19:02:15+07:00
# @username 		  : support@susantokun.com
# @Project 		: CodeIgniter
# @Filename 	: Auth_model.php
# @Instagram 	: susantokun
# @Website 		: http://www.susantokun.com
# @Youtube 		: http://youtube.com/susantokun
# @Last modified time: 2018-05-27T04:39:19+07:00
#===================================================|

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public $table       = 'tb_user';
    public $id          = 'tb_user.id_admin';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $query = $this->db->get_where('tb_user', array('username'=>$username, 'password'=>$password));
        return $query->row_array();
    }

    public function check_account($username)
    {
        //cari username lalu lakukan validasi
        $this->db->where('username', $username);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->active == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 3;
        }

        return $query;
    }

    public function logout($date, $id)
    {
        $this->db->where('tb_user.id_admin', $id);
        $this->db->update('tb_user', $date);
    }

    public function update($data, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function get_by_id($id)
    {
        $this->db->select('
            tb_user.*, tb_role.id_admin AS id_role, tb_role.name, tb_role.description,
            ');
        $this->db->join('tb_role', 'tb_user.id_admin_role = tb_role.id_admin');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }
}
