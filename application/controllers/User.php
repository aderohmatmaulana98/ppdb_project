<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'User';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['nama_lengkap'] = $data['user']['nama_lengkap'];
		if ($this->session->userdata('email') == '') {
			redirect('auth');
		} else {
			$this->load->view('home/home_header');
			$this->load->view('home/sidebar', $data);
			$this->load->view('home/top_nav', $data);
			$this->load->view('user/index', $data);
			$this->load->view('home/home_footer');
		}
	}

	public function jalur_seleksi()
	{
		$data['title'] = 'Jalur Seleksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['nama_lengkap'] = $data['user']['nama_lengkap'];
		if ($this->session->userdata('email') == '') {
			redirect('auth');
		} else {
			$this->load->view('home/home_header', $data);
			$this->load->view('home/sidebar', $data);
			$this->load->view('home/top_nav', $data);
			$this->load->view('user/jalur_seleksi', $data);
			$this->load->view('home/home_footer');
		}
	}
}
