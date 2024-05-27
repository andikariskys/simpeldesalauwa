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
		$this->load->model('M_profile');
		$this->load->model('M_information');
		$this->load->model('M_galery');
		$this->load->model('M_contact');
	}


	public function index()
	{
		$data['is_home'] = true;
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/dashboard');
		// echo json_encode($data);
		// exit;
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
				'id_user'   => $user->id_user,
				'nama'      => $user->Nama_user,
				'username'  => $user->Username,
				// 'level'     => $user->level,
				'is_login'  => true
			);

			$this->session->set_userdata($data_user);

			// Redirect with JavaScript to open admin page in a new tab
			redirect('Admin');
		} else {
			$this->session->set_flashdata(array('error_login' => true));
			redirect('');
		}
	}


	public function serviceLogout()
	{
		$this->session->unset_userdata(array('id_user', 'nama', 'username', 'level', 'is_login'));
		$this->session->set_flashdata('alert', 'Logout Berhasil...');
		$this->session->set_flashdata('alert_type', 'info');
		redirect('');
	}
	public function serviceSession()
	{
		$data['is_home'] = false;
		$data['title'] = 'Profil User';
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/profile_login', $data);
		$this->load->view('service/templates/footer');
	}

	public function serviceProfile()
	{
		$data['is_home'] = false;
		$data['profil'] = $this->M_profile->get_data();
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/profile/index', $data);
		$this->load->view('service/templates/footer');
	}

	public function serviceInformation()
	{
		$data['is_home'] = false;
		$data['information'] = $this->M_information->get_data();
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/information/index', $data);
		$this->load->view('service/templates/footer');
	}

	public function serviceGalery()
	{
		$data['is_home'] = false;
		$data['galery'] = $this->M_galery->get_data();
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/galery/index', $data);
		$this->load->view('service/templates/footer');
	}

	public function serviceContact()
	{
		$data['is_home'] = false;
		$data['contact'] = $this->M_contact->get_data();
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/contact/index', $data);
		$this->load->view('service/templates/footer');
	}


	//service menu dropdown

	/**Parent income */
	public function serviceParentIncome()
	{
		$data['is_home'] = false;
		$data['title'] = 'Surat Keterangan Penghasilan Orang Tua';
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/services/parent-income/index', $data);
		$this->load->view('service/templates/footer');
	}


	/**end parent Income */

	/**serviceOfIncapacity */
	public function serviceOfIncapacity()
	{
		$data['is_home'] = false;
		$data['title'] = 'Surat Keterangan Tidak Mampu';
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/services/incapacity-certificate/index', $data);
		$this->load->view('service/templates/footer');
	}


	/**end serviceOfIncapacity */


	/**serviceBirthCertificate */
	public function serviceBirthCertificate()
	{
		$data['is_home'] = false;
		$data['title'] = 'Surat Keterangan Kelahiran';
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/services/birth-certificate/index', $data);
		$this->load->view('service/templates/footer');
	}


	/**end serviceBirthCertificate */

	/**servicedeathCertificate */
	public function servicedeathCertificate()
	{
		$data['is_home'] = false;
		$data['title'] = 'Surat Keterangan Kematian';
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/services/death-certificate/index', $data);
		$this->load->view('service/templates/footer');
	}


	/**end servicedeathCertificate */

	/**serviceMarriageLetter */
	public function serviceMarriageLetter()
	{
		$data['is_home'] = false;
		$data['title'] = 'Surat Pengantar Nikah';
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/services/marriage-letter/index', $data);
		$this->load->view('service/templates/footer');
	}


	/**end serviceMarriageLetter */

	/**servicePoliceRecordLetter */
	public function servicePoliceRecordLetter()
	{
		$data['is_home'] = false;
		$data['title'] = 'Surat Pengantar Catatan Kepolisian';
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/services/police-record-letter/index', $data);
		$this->load->view('service/templates/footer');
	}

	/**end servicePoliceRecordLetter */
}
