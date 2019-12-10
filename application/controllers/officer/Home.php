<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "4") {
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
		$id_user = $this->session->userdata('id_user');
		$data['activity'] = $this->Aktivitas_model->tampil_data_officer_only($id_user);	
		$this->load->library('form_validation');
        $this->form_validation->set_rules('deskripsi','Job Description','max_length[40]|required');
		if($this->form_validation->run())
		{   date_default_timezone_set('ASIA/JAKARTA');
		$time = $this->input->post('waktu_mulai');
		$date = date('Y-m-d');
		$d1= date('Y-m-d H:i', strtotime("$date $time"));
		$time2 = $this->input->post('waktu_akhir');
		$d2= date('Y-m-d H:i:s', strtotime("$date $time2"));
		
		$date1= new Datetime(date('Y-m-d H:i', strtotime("$date $time")));
		$date2= new Datetime(date('Y-m-d H:i:s', strtotime("$date $time2")));
		$diffDays = $date2->diff($date1)->format("%H:%I");

		$data = array(           
			'id_user' => $this->input->post('id_user'),
			'id_proyek' => $this->input->post('id_proyek'), 
			'deskripsi' => $this->input->post('deskripsi'),
			'waktu_mulai' => $d1,
			'waktu_selesai' => $d2,   
			'tanggal_record' => date("Y-m-d\TH:i:sP"),
			'total_jam' => $diffDays,
		);
			$this->Aktivitas_model->input_data($data);
			redirect('officer/home');

		}else {
        	$this->template->load('layout_off/template', 'officer/dashboard', $data);
		}
        	// $this->template->load('layout_off/template', 'officer/dashboard', $data);
	}
	
	function hapus($id)
	{
		$this->Aktivitas_model->hapus_data($id);
		redirect('officer/home');
	}

}
