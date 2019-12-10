<?php

class Pegawai_model extends CI_Model{

    private $table ='pegawai';
    private $id ='pegawai.id_pegawai';

    function __construct()
    {
        $this->table = "pegawai";
        parent::__construct();
    }

   

    function jml_data()
    {
        $query = $this->db->get($this->table);
        $total = $query->num_rows();
        return $total;
    }

    function hasil_cari($cari)
    {
        
        $this->db->select('
            pegawai.*, jabatan.id_jabatan AS id_jabatan, jabatan.nama_jabatan
            ');
        $this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan');
        $this->db->from('pegawai');
        $this->db->order_by('id_pegawai','desc');
        $this->db->where('SSN',$cari);
        $data = $this->db->get();
		return $data->result();
    }

    function semua_data()
    {
        $this->db->select('
            pegawai.*, jabatan.id_jabatan AS id_jabatan, jabatan.nama_jabatan
            ');
        $this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan');
        $this->db->from('pegawai');
        $this->db->order_by('id_pegawai','desc');
        $query = $this->db->get();
        return $query->result();
    }

  
    function hitung()
    {   $this->db->from('pegawai');
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    function detail_data($id_pegawai)
    {   $this->db->select('
        pegawai.*, jabatan.id_jabatan AS id_jabatan, jabatan.nama_jabatan
        ');
    $this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan');
    // $this->db->from('pegawai');
    $query =  $this->db->get_where($this->table, array('id_pegawai' => $id_pegawai));
    return $query->row();
}

function input_data($data)
{
    $this->db->insert($this->table, $data);
}

function update_data($data, $id_pegawai)
{
    $this->db->where('id_pegawai', $id_pegawai);
    $this->db->update($this->table, $data);
}


function hapus_data($id_data)
{
    $this->db->where('id_pegawai', $id_data);
    $this->db->delete($this->table);
}

}
