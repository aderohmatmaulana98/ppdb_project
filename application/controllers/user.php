<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$username['nama_lengkap'] = $data['user']['nama_lengkap'];
		if($this->session->userdata('email') == ''){
			redirect('auth');
		}else{
			$this->load->view('home/home_header');
			$this->load->view('home/home', $username);
			$this->load->view('home/home_footer');
		}
	}
}
