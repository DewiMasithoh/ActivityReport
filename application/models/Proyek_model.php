<?php

class Proyek_model extends CI_Model{
    private $table ='proyek';
    private $id_proyek ='proyek.id_proyek';

    public function __construct()
    {
        $this->table ='proyek';
        parent::__construct();
    }

    function tampil_data(){
        $this->db->select('*');
        $this->db->from('proyek');
        $this->db->order_by('id_proyek','asc');
        $this->db->where('status_proyek=0');
        $query = $this->db->get();
        return $query->result();
    }
    
    function tampil_data_semua(){
        $this->db->select('*');
        $this->db->from('proyek');
        $this->db->order_by('id_proyek','asc');
        // $this->db->where('status_proyek=0');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function get_all_proyek(){
		$query = $this->db->query('SELECT activity.id_activity, proyek.*, SUM(total_jam) as total FROM activity
			JOIN proyek ON proyek.id_proyek = activity.id_proyek
			 GROUP BY id_proyek');
	
		return $query->result();
	}

    function hasil_cari($cari)
    {
        $this->db->from('proyek');
        $this->db->order_by('id_proyek','desc');
        $this->db->where('id_proyek',$cari);
        // $this->db->like('id_pegawai',$cari);
        $data = $this->db->get();
        return $data->result();
        // $this->db->where('id_proyek', $cari);
        // $query = $this->db->get($this->table)->row();
        // if (!$query) {
        //     return 1;
        // }
        // return $query;
    }

    function tampil_datanya($number = NULL, $offset = NULL){
    //ini untuk menampilkan data
        $query = $this->db->get($this->table, $number, $offset);
        return $query->result();
    }

    function spesifik_data($id_proyek){
        $query=$this->db->get_where($this->table,array('id_proyek'=>$id_proyek));
        return $query->row();
    }

    function input_data($data){
        $this->db->insert($this->table, $data);
    }

    function update_data($data,$id_proyek){
        $this->db->where('id_proyek',$id_proyek);
        $this->db->update($this->table,$data);
    }

    function hapus_data($id_proyek){
        $this->db->where('id_proyek',$id_proyek);
        $this->db->delete($this->table);
    }
}
