<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Auth_model');
    }

    public function check_account()
    {
        //validasi login
        $username      = $this->input->post('username');
        $password   = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->Auth_model->check_account($username, $password);

        if ($query === 1) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>username yang Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-info">
              <div class="info-box-icon">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Akun yang Anda masukkan tidak aktif, silakan hubungi Administrator.</div>
              </div>
              </p>'
            );
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.</div>
        			</div>
        			</p>
              ');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
              'is_login'    => true,
            //   'id'          => $query->id,
              'id_user' =>  $query->id_user,
              'password'    => $query->password,
              'id_role'     => $query->id_role,
              'username'    => $query->username,
              'first_name'  => $query->first_name,
              'last_name'   => $query->last_name,
              // 'username'       => $query->username,
              // 'phone'       => $query->phone,
              'photo'       => $query->photo,
              // 'created_on'  => $query->created_on,
              // 'last_login'  => $query->last_login
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }
    public function login()
    {
        // $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'     => 'Login',
            'favicon'   => 'logo.png',
            'site'      => 'Activity Report'
        );
        //melakukan pengalihan halaman sesuai dengan levelnya
        // if ($this->session->userdata('id_role') == "1") {
        //     redirect('admin/home');
        // }
        // if ($this->session->userdata('id_role') == "2") {
        //     redirect('member/home');
        // }
        // if ($this->session->userdata('id_role') == "3") {
        //     redirect('security/home');
        // }

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->Auth_model->check_account($this->input->post('username'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->id_role == '1') {
                    redirect('admin/home');
                }
                elseif ($data->id_role == '2') {
                    redirect('project_manager/home');
                }
                elseif ($data->id_role == '4') {
                    redirect('officer/home');
                }
            } else {
                $this->template->load('authentication/layout/template', 'authentication/login', $data);
            }
        } else {
            $this->template->load('authentication/layout/template', 'authentication/login', $data);
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function profile()
    {
        $data = konfigurasi('Profile');
        $data['get_all_userdata'] = $this->Auth_model->get_by_id($this->session->userdata('id'));
        $this->template->load('layout/template', 'authentication/profile', $data);
    }

    public function updateProfile()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('first_name', 'Nama Depan', 'trim|required|min_length[2]|max_length[15]');
        $this->form_validation->set_rules('last_name', 'Nama Belakang', 'trim|required|min_length[2]|max_length[15]');
        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[8]|max_length[50]');
        $this->form_validation->set_rules('phone', 'Telp', 'trim|required|min_length[11]|max_length[12]');

        $id = $this->session->userdata('id');
        $data = array(
            'username' => $this->input->post('username'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'username' => $this->input->post('username'),
            'phone' => $this->input->post('phone'),
        );
        if ($this->form_validation->run() == true) {
            if (!empty($_FILES['photo']['name'])) {
                $upload = $this->_do_upload();

                //delete file
                $user = $this->Auth_model->get_by_id($this->session->userdata('id'));
                if (file_exists('assets/upload/images/foto_profil/'.$user->photo) && $user->photo) {
                    unlink('assets/upload/images/foto_profil/'.$user->photo);
                }

                $data['photo'] = $upload;
            }
            $result = $this->Auth_model->update($data, $id);
            if ($result > 0) {
                $this->updateProfil();
                $this->session->set_flashdata('msg', show_succ_msg('Data Profile Berhasil diubah, silakan lakukan login ulang!'));
                redirect('auth/profile');
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }

    public function updatePassword()
    {
        $this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');

        $id = $this->session->userdata('id');
        if ($this->form_validation->run() == true) {
            if (password_verify($this->input->post('passLama'), $this->session->userdata('password'))) {
                if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
                    $this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
                    redirect('auth/profile');
                } else {
                    $data = ['password' => get_hash($this->input->post('passBaru'))];
                    $result = $this->Auth_model->update($data, $id);
                    if ($result > 0) {
                        $this->updateProfil();
                        $this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
                        redirect('auth/profile');
                    } else {
                        $this->session->set_flashdata('msg', show_err_msg('Password Gagal diubah'));
                        redirect('auth/profile');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Password Salah'));
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }

    private function _do_upload()
    {
        $config['upload_path']          = 'assets/upload/images/foto_profil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('auth/profile');
        }
        return $this->upload->data('file_name');
    }
}
