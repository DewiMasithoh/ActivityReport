<?php

class Aktivitas_model extends CI_Model{
    private $table ='activity';
    private $id_activity ='activity.id_activity';

    public function __construct()
    {
        $this->table ='activity';
        parent::__construct();
    }


    function tampil_data(){
        $this->db->select('*');
        // $this->db->select('
        //     activity.*, proyek.id_proyek AS id_proyek, proyek.deskripsi_proyek
        //     ');
        // $this->db->join('proyek', 'activity.id_proyek = proyek.id_proyek');
        $this->db->from('activity');
        $this->db->order_by('id_activity','asc');
        $query = $this->db->get();
        return $query->result();
	}
	
	function tampil_data_officer($id)
	{
		$this->db->select('*');
		$this->db->select('
		activity.*, user.id_user AS id_user, user.first_name, user.last_name
		');
        $this->db->select('
            activity.*, proyek.id_proyek AS id_proyek, proyek.deskripsi_proyek
			');
		$this->db->join('user', 'activity.id_user = user.id_user');		
        $this->db->join('proyek', 'activity.id_proyek = proyek.id_proyek');
        $this->db->from('activity');
		$this->db->order_by('id_activity','asc');
		$this->db->where('activity.id_user',$id);
        $query = $this->db->get();
        return $query->result();
	}

	function tampil_data_off_awal($id,$tanggal)
	{
		$this->db->select('*');
		$this->db->select('
		activity.*, user.id_user AS id_user, user.first_name, user.last_name
		');
        $this->db->select('
            activity.*, proyek.id_proyek AS id_proyek, proyek.deskripsi_proyek
			');
		$this->db->join('user', 'activity.id_user = user.id_user');		
        $this->db->join('proyek', 'activity.id_proyek = proyek.id_proyek');
        $this->db->from('activity');
		$this->db->order_by('id_activity','asc');
		$this->db->where('activity.id_user',$id);
		$this->db->where('activity.tanggal_record>=',$tanggal);
        $query = $this->db->get();
        return $query->result();
	}

	function tampil_data_off_akhir($id,$tanggal)
	{
		$this->db->select('*');
		$this->db->select('
		activity.*, user.id_user AS id_user, user.first_name, user.last_name
		');
        $this->db->select('
            activity.*, proyek.id_proyek AS id_proyek, proyek.deskripsi_proyek
			');
		$this->db->join('user', 'activity.id_user = user.id_user');		
        $this->db->join('proyek', 'activity.id_proyek = proyek.id_proyek');
        $this->db->from('activity');
		$this->db->order_by('id_activity','asc');
		$this->db->where('activity.id_user',$id);
		$this->db->where('activity.tanggal_record<=',$tanggal);
        $query = $this->db->get();
        return $query->result();
	}

	function tampil_data_2_t($id,$tanggal,$tanggalakhir)
	{
		$this->db->select('*');
		$this->db->select('
		activity.*, user.id_user AS id_user, user.first_name, user.last_name
		');
        $this->db->select('
            activity.*, proyek.id_proyek AS id_proyek, proyek.deskripsi_proyek
			');
		$this->db->join('user', 'activity.id_user = user.id_user');		
        $this->db->join('proyek', 'activity.id_proyek = proyek.id_proyek');
        $this->db->from('activity');
		$this->db->order_by('id_activity','asc');
		$this->db->where('activity.id_user',$id);
		$this->db->where('activity.tanggal_record>=',$tanggal);
		$this->db->where('activity.tanggal_record<=',$tanggalakhir);
        $query = $this->db->get();
        return $query->result();
	}


	function tampil_data_officer_only($id)
	{
		$this->db->select('*');
		$this->db->select('
		activity.*, user.id_user AS id_user, user.first_name, user.last_name
		');
        $this->db->select('
            activity.*, proyek.id_proyek AS id_proyek, proyek.deskripsi_proyek
			');
		$this->db->join('user', 'activity.id_user = user.id_user');		
        $this->db->join('proyek', 'activity.id_proyek = proyek.id_proyek');
        $this->db->from('activity');
		$this->db->order_by('id_activity','asc');
		$this->db->where('activity.id_user',$id);
		$hariini = date('Y-m-d');
		$harisore = date('Y-m-d', strtotime("+1 day"));
		$this->db->where('activity.tanggal_record >=',$hariini);
		$this->db->where('activity.tanggal_record <=',$harisore);
        $query = $this->db->get();
        return $query->result();
	}
	
	function tampil_data_proyek($id){
        $this->db->select('*');
        $this->db->select('
            activity.*, user.id_user AS id_user, user.first_name, user.last_name
            ');
        $this->db->join('user', 'activity.id_user = user.id_user');
        $this->db->from('activity');
		$this->db->order_by('id_activity','asc');
		$this->db->where('activity.id_proyek',$id);
        $query = $this->db->get();
        return $query->result();
	}
	
	function tampil_data_tanggal_awal($id,$tanggal){
        $this->db->select('*');
        $this->db->select('
            activity.*, user.id_user AS id_user, user.first_name, user.last_name
            ');
        $this->db->join('user', 'activity.id_user = user.id_user');
        $this->db->from('activity');
		$this->db->order_by('id_activity','asc');
		$this->db->where('activity.id_proyek',$id);
		$this->db->where('activity.tanggal_record>=',$tanggal);
        $query = $this->db->get();
        return $query->result();
	}

	function tampil_data_2_tanggal($id,$tanggal,$tanggalakhir){
        $this->db->select('*');
        $this->db->select('
            activity.*, user.id_user AS id_user, user.first_name, user.last_name
            ');
        $this->db->join('user', 'activity.id_user = user.id_user');
        $this->db->from('activity');
		$this->db->order_by('id_activity','asc');
		$this->db->where('activity.id_proyek',$id);
		$this->db->where('activity.tanggal_record>=',$tanggal);
		$this->db->where('activity.tanggal_record<=',$tanggalakhir);
        $query = $this->db->get();
        return $query->result();
    }
	
	function tampil_data_tanggal_akhir($id,$tanggal){
        $this->db->select('*');
        $this->db->select('
            activity.*, user.id_user AS id_user, user.first_name, user.last_name
            ');
        $this->db->join('user', 'activity.id_user = user.id_user');
        $this->db->from('activity');
		$this->db->order_by('id_activity','asc');
		$this->db->where('activity.id_proyek',$id);
		$this->db->where('activity.tanggal_record<=',$tanggal);
        $query = $this->db->get();
        return $query->result();
    }


    function spesifik_data($id_activity){
        $query=$this->db->get_where($this->table,array('id_activity'=>$id_activity));
        return $query->row();
    }

    function input_data($data){
        $this->db->insert($this->table, $data);
	}
	
	function hapus_data($id_data)
	{
		$this->db->where('id_activity', $id_data);
		$this->db->delete($this->table);
	}
}
