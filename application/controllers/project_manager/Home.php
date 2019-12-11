<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
		}
		$this->load->model('Proyek_model');
		$this->load->model('Aktivitas_model');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Activity Report',
            'favicon'   => 'logo.png',
            'site'      => 'Activity Report'
        );
		$data['proyek'] = $this->Proyek_model->tampil_data();
		$data['activity'] = $this->Aktivitas_model->tampil_data();	
		// $data['proyek'] = $this->Proyek_model-> get_all_proyek();

        $this->template->load('layout_pro/template', 'project_manager/dashboard', $data);
	}
	
	public function detail($id)
    {
        $data = array(
            'title'     => 'Activity Report',
            'favicon'   => 'logo.png',
            'site'      => 'Activity Report'
        );
		$data['proyek'] = $this->Proyek_model->spesifik_data($id);

		$tanggal_awal=$this->input->post('tanggal_awal');
		$tanggal_akhir=$this->input->post('tanggal_akhir');

		if($tanggal_awal!=""&&$tanggal_akhir!=""){
			$tanggal_akhir = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_akhir)));
			$data['activity']	= $this->Aktivitas_model->tampil_data_2_tanggal($id,$tanggal_awal,$tanggal_akhir);
		}elseif($tanggal_awal!=""){
			$tanggal_akhir = date('Y-m-d', strtotime("+1 day"));
			$data['activity']	= $this->Aktivitas_model->tampil_data_tanggal_awal($id,$tanggal_awal);
		}elseif($tanggal_akhir!=""){
			$tanggal_akhir = date('Y-m-d', strtotime("+1 day"));
			$data['activity']	= $this->Aktivitas_model->tampil_data_tanggal_akhir($id,$tanggal_akhir);
		}else{
			$data['activity'] = $this->Aktivitas_model->tampil_data_proyek($id);	
		}

        $this->template->load('layout_pro/template', 'project_manager/detail', $data);
	}

	public function detail_employees($id)
    {
        $data = array(
            'title'     => 'Activity Report',
            'favicon'   => 'logo.png',
            'site'      => 'Activity Report'
        );

		$tanggal_awal=$this->input->post('tanggal_awal');
		$tanggal_akhir=$this->input->post('tanggal_akhir');

		if($tanggal_awal!=""&&$tanggal_akhir!=""){
			$tanggal_akhir = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_akhir)));
			$data['activity']	= $this->Aktivitas_model->tampil_data_2_t($id,$tanggal_awal,$tanggal_akhir);
		}elseif($tanggal_awal!=""){
			$tanggal_akhir = date('Y-m-d', strtotime("+1 day"));
			$data['activity']	= $this->Aktivitas_model->tampil_data_off_awal($id,$tanggal_awal);
		}elseif($tanggal_akhir!=""){
			$tanggal_akhir = date('Y-m-d', strtotime("+1 day"));
			$data['activity']	= $this->Aktivitas_model->tampil_data_off_akhir($id,$tanggal_akhir);
		}else{
			$data['activity'] = $this->Aktivitas_model->tampil_data_officer($id);	
		}

        $this->template->load('layout_pro/template', 'project_manager/detail_em', $data);
	}



}
