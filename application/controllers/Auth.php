<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
	}
	public function index()
	{
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		} else {
			//validasi sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		//user ada
		if ($user) {
			//jika usernya aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Wrong password !
		  </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email belum aktif !
		  </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered !
		  </div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Full name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[6]|matches[password2]',
			[
				'matches' => 'Password not macth!',
				'min_length' => 'Minimal password 6 character!'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('template/auth_footer');
		} else {
			$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'is_active' => 0,
				'gambar'	=> 'user.png',
				'date_created' => time(),
				'update_created' => time()

			];
			$this->db->insert('user', $data);
			$this->SendEmail();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akun berhasil dibuat, silahkan aktivasi akun!
		  </div>');
			redirect('auth');
		}
	}
	public function blocked()
	{
		$data['user'] =  $this->db->get_where(
			'user',
			['role_id' => $this->session->userdata('role_id')]
		)->row_array();
		$this->load->view('auth/blocked', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function SendEmail()
	{
		$this->load->config('email');
		$this->load->library('email');

		$from = $this->config->item('smtp_user');
		$to = $this->input->post('email');
		$subject = 'Konfirmasi Email';
		$message = "Selamat Datang di siakad \r\n Sialahakan konfirmasi email anda <a href='https://www.facebook.com'>test</a>";

		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		if ($this->email->send()) {
			echo 'Your Email has successfully been sent.';
		} else {
			show_error($this->email->print_debugger());
		}
	}
}
