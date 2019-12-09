<?php
#===================================================|
# Please DO NOT modify this information :			      |
#---------------------------------------------------|
# @Author 		: Susantokun
# @Date 		  : 2018-05-26T18:52:44+07:00
# @Email 		  : support@susantokun.com
# @Project 		: CodeIgniter
# @Filename 	: login_helper.php
# @Instagram 	: susantokun
# @Website 		: http://www.susantokun.com
# @Youtube 		: http://youtube.com/susantokun
# @Last modified time: 2018-05-27T04:37:39+07:00
#===================================================|

defined('BASEPATH') OR exit('No direct script access allowed');
function konfigurasi($title, $c_des=null)
{
    $CI = get_instance();
    $CI->load->model('Konfigurasi_model');
    $site = $CI->Konfigurasi_model->listing();
    $data = array(
      'title'        => $title.' | '.$site['nama_website'],
      'logo'         => $site['logo'],
      'favicon'      => $site['favicon'],
      'email'        => $site['email'],
      'no_telp'      => $site['no_telp'],
      'alamat'       => $site['alamat'],
      'facebook'     => $site['facebook'],
      'instagram'    => $site['instagram'],
      'keywords'     => $site['keywords'],
      'metatext'     => $site['metatext'],
      'about'        => $site['about'],
      'site'         => $site,
      'c_judul'      => $title,
      'c_des'        => $c_des,
    );
    return $data;
}

