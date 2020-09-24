<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_menu');
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		if ($this->session->userdata('email') == '') {
			redirect('auth');
		} else {
			$this->form_validation->set_rules('menu', 'menu', 'required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('home/home_header');
				$this->load->view('home/sidebar', $data);
				$this->load->view('home/top_nav', $data);
				$this->load->view('menu/index', $data);
				$this->load->view('home/home_footer');
			} else {
				$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Menu baru berhasil ditambahkan
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>'

				);
				redirect('menu');
			}
		}
	}
	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['subMenu'] = $this->M_menu->getSubmenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu_id', 'menu', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('home/home_header');
			$this->load->view('home/sidebar', $data);
			$this->load->view('home/top_nav', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('home/home_footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active'),
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
				Submenu baru berhasil ditambahkan
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>'

			);
			redirect('menu/submenu');
		}
	}

	public function hapusSubMenu($id)
	{
		$query = array('id' => $id);
		$this->db->delete('user_sub_menu', $query);
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				Submenu berhasil dihapus
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>'

		);
		redirect('menu/submenu');
	}

	public function hapusMenu($id)
	{
		$query = array('id' => $id);
		$this->db->delete('user_menu', $query);
		$this->db->query("ALTER TABLE user_menu AUTO_INCREMENT = $id") - 1;
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				Submenu berhasil dihapus
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>'

		);
		redirect('menu/index');
	}
}
