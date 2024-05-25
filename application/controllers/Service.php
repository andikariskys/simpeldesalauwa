<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{

	/**
	 * Controller ini untuk halaman pengunjung
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_service');
	}


	public function index()
	{
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar_home');
		$this->load->view('service/dashboard');

		// $this->load->view('service/templates/footer');
	}

	public function serviceLogin()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek_login = $this->M_service->check_user($username, $password);

		if ($cek_login->num_rows() > 0) {
			$user = $cek_login->row();

			$data_user = array(
				'id_user' 	=> $user->id_user,
				'nama'		=> $user->Nama_user,
				'username'	=> $user->Username,
				'level'		=> $user->level,
				'is_login'	=> true
			);

			// echo json_encode($data_user);
			// echo 'Login Berhasil';
			// exit;

			$this->session->set_userdata($data_user);
			$this->session->set_flashdata('alert', 'Login Berhasil...');
			$this->session->set_flashdata('alert_type', 'info');
			redirect('Service');
		} else {
			$this->session->set_flashdata(array('error_login' => true));
			redirect('Service');
		}
	}

	public function ServiceLogout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('alert', 'Logout Berhasil...');
		$this->session->set_flashdata('alert_type', 'info');
		redirect('Service');
	}

	public function serviceProfile()
	{
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar');
		$this->load->view('service/profile/index');
		$this->load->view('service/templates/footer');
	}
	public function serviceInformation()
	{
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar');
		$this->load->view('service/information/index');
		$this->load->view('service/templates/footer');
	}
	public function serviceGalery()
	{
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar');
		$this->load->view('service/galery/index');
		$this->load->view('service/templates/footer');
	}
	public function serviceContact()
	{
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar');
		$this->load->view('service/contact/index');
		$this->load->view('service/templates/footer');
	}
}
