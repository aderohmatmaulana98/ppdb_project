<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->session->userdata('email') == '') {
			redirect('auth');
		} else {
			$this->load->view('home/home_header');
			$this->load->view('home/sidebar', $data);
			$this->load->view('home/top_nav', $data);
			$this->load->view('home/home', $data);
			$this->load->view('home/home_footer');
		}
	}
}
