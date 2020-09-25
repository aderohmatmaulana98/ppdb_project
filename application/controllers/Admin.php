<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->session->userdata('email') == '') {
			redirect('auth');
		} else {
			$this->load->view('home/home_header', $data);
			$this->load->view('home/sidebar', $data);
			$this->load->view('home/top_nav', $data);
			$this->load->view('home/home', $data);
			$this->load->view('home/home_footer');
		}
	}
	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		if ($this->session->userdata('email') == '') {
			redirect('auth');
		} else {
			$this->load->view('home/home_header', $data);
			$this->load->view('home/sidebar', $data);
			$this->load->view('home/top_nav', $data);
			$this->load->view('home/role', $data);
			$this->load->view('home/home_footer');
		}
	}
	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		if ($this->session->userdata('email') == '') {
			redirect('auth');
		} else {
			$this->load->view('home/home_header', $data);
			$this->load->view('home/sidebar', $data);
			$this->load->view('home/top_nav', $data);
			$this->load->view('home/roleaccess', $data);
			$this->load->view('home/home_footer', $data);
		}
	}
	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			Akses berhasil diubah !!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>'

		);
	}
}
