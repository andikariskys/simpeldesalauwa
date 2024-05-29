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
		$this->load->model('admin_model');
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

	public function addParentIncome()
	{
		if ($this->input->post('no_kk') != null) {

			$image_ktp          = $_FILES['foto_ktp']['name'];
			$image_kk           = $_FILES['foto_kk']['name'];

			if ($image_ktp != null) {
				$config['upload_path'] = './assets/img-admin/spot';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_ktp')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_parent_income', $error);
					echo $error;
				} else {
					$image_ktp = $this->upload->data('file_name');
				}
			}

			if ($image_kk != null) {
				$config['upload_path'] = './assets/img-admin/spot';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_kk')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_parent_income', $error);
					echo $error;
				} else {
					$image_kk = $this->upload->data('file_name');
				}
			}

			$data_parent_income = array(
				'Tanggal_penghasilan' 	=> $this->input->post('tanggal'),
				'No_kk'					=> $this->input->post('no_kk'),
				'Nik'					=> $this->input->post('nik'),
				'Nama'					=> $this->input->post('nama_lengkap'),
				'Ttl'					=> $this->input->post('ttl'),
				'Jenis_kelamin'			=> $this->input->post('jenis_kelamin'),
				'Agama'					=> $this->input->post('agama'),
				'Nik_ayah'				=> $this->input->post('nik_ayah'),
				'Nama_ayah'				=> $this->input->post('nama_lengkap_ayah'),
				'Ttl_ayah'				=> $this->input->post('ttl_ayah'),
				'Agama_ayah'			=> $this->input->post('agama_ayah'),
				'Pekerjaan_ayah'		=> $this->input->post('pekerjaan_ayah'),
				'Penghasilan_ayah'		=> $this->input->post('penghasilan_ayah'),
				'Nik_ibu'				=> $this->input->post('nik_ibu'),
				'Nama_ibu'				=> $this->input->post('nama_lengkap_ibu'),
				'Ttl_ibu'				=> $this->input->post('ttl_ibu'),
				'Agama_ibu'				=> $this->input->post('agama_ibu'),
				'Pekerjaan_ibu'			=> $this->input->post('pekerjaan_ibu'),
				'Penghasilan_ibu'		=> $this->input->post('penghasilan_ibu'),
				'kk'					=> $image_kk,
				'ktp'					=> $image_ktp
			);

			// echo json_encode($data_parent_income);
			// exit;
			if (!$this->admin_model->save_parent_income($data_parent_income)) {
				$this->session->set_flashdata('alert', 'Data berhasil ditambah.');
				$this->session->set_flashdata('alert_type', 'info');
				redirect('parent-income');
			}
		} else {

			$data['is_home'] = false;
			$data['title'] = 'Surat Keterangan Penghasilan Orang Tua';
			$this->load->view('service/templates/header');
			$this->load->view('service/templates/navbar', $data);
			$this->load->view('service/services/parent-income/index', $data);
			$this->load->view('service/templates/footer');
		}
	}

	/**end parent Income */

	/**FinancialHardship */
	public function serviceFinancialHardship()
	{
		$data['is_home'] = false;
		$data['title'] = 'Surat Keterangan Tidak Mampu';
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar', $data);
		$this->load->view('service/services/financial-hardship/index', $data);
		$this->load->view('service/templates/footer');
	}

	public function addFinancialHardship()
	{
		if ($this->input->post('no_kk') != null) {

			$image_kk           = $_FILES['foto_kk']['name'];

			if ($image_kk != null) {
				$config['upload_path'] = './assets/img-admin/sktm';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_kk')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_financial_hardship', $error);
					echo $error;
				} else {
					$image_kk = $this->upload->data('file_name');
				}
			}

			$data_financial_hardship = array(
				'Tanggal_keterangantidakmampu' 	=> $this->input->post('tanggal'),
				'No_kk' 						=> $this->input->post('no_kk'),
				'Nik' 							=> $this->input->post('nik'),
				'Nama' 							=> $this->input->post('nama_lengkap'),
				'Ttl' 							=> $this->input->post('ttl'),
				'Jenis_kelamin' 				=> $this->input->post('jenis_kelamin'),
				'Agama' 						=> $this->input->post('agama'),
				'Alamat' 						=> $this->input->post('alamat'),
				'kk'							=> $image_kk
			);

			if (!$this->admin_model->save_financial_hardship($data_financial_hardship)) {
				$this->session->set_flashdata('alert', 'Data berhasil ditambah.');
				$this->session->set_flashdata('alert_type', 'info');
				redirect('financial-hardship');
			}
		} else {

			$data['is_home'] = false;
			$data['title'] = 'Surat Keterangan Tidak Mampu';
			$this->load->view('service/templates/header');
			$this->load->view('service/templates/navbar', $data);
			$this->load->view('service/services/financial-hardship/index', $data);
			$this->load->view('service/templates/footer');
		}
	}

	/**end FinancialHardship */


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

	public function addBirthCertificate()
	{
		if ($this->input->post('ttl') != null) {

			$image_kk           = $_FILES['foto_kk']['name'];

			if ($image_kk != null) {
				$config['upload_path'] = './assets/img-admin/skkl';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_kk')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_birth_announcement', $error);
					echo $error;
				} else {
					$image_kk = $this->upload->data('file_name');
				}
			}

			$data_birth_announcement = array(
				'Tanggal_keterangankelahiran'	=> $this->input->post('tanggal'),
				'Nama' 							=> $this->input->post('nama'),
				'Ttl' 							=> $this->input->post('ttl'),
				'Jenis_kelamin' 				=> $this->input->post('jenis_kelamin'),
				'Agama' 						=> $this->input->post('agama'),
				'Alamat' 						=> $this->input->post('alamat'),
				'Nama_ayah' 					=> $this->input->post('nama_ayah'),
				'Nama_ibu' 						=> $this->input->post('nama_ibu'),
				'kk'                           	=> $image_kk
			);

			if (!$this->admin_model->save_birth_announcement($data_birth_announcement)) {
				$this->session->set_flashdata('alert', 'Data berhasil ditambah.');
				$this->session->set_flashdata('alert_type', 'info');
				redirect('birth-certificate');
			}
		} else {

			$data['is_home'] = false;
			$data['title'] = 'Surat Keterangan Kelahiran';
			$this->load->view('service/templates/header');
			$this->load->view('service/templates/navbar', $data);
			$this->load->view('service/services/birth-certificate/index', $data);
			$this->load->view('service/templates/footer');
		}
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

	public function addDeathCertificate()
	{
		if ($this->input->post('nik') != null) {

			$image_ktp           = $_FILES['foto_ktp']['name'];

			if ($image_ktp != null) {
				$config['upload_path'] = './assets/img-admin/skm';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_ktp')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_death_certificate', $error);
					echo $error;
				} else {
					$image_ktp = $this->upload->data('file_name');
				}
			}

			$data_death_certificate = array(
				'Tanggal_keterangankematian'	=> $this->input->post('tanggal'),
				'Nik' 							=> $this->input->post('nik'),
				'Nama' 							=> $this->input->post('nama'),
				'Ttl' 							=> $this->input->post('ttl'),
				'Jenis_kelamin' 				=> $this->input->post('jenis_kelamin'),
				'Pekerjaan' 					=> $this->input->post('pekerjaan'),
				'Agama' 						=> $this->input->post('agama'),
				'Alamat' 						=> $this->input->post('alamat'),
				'Hari_kematian' 				=> $this->input->post('hari_kematian'),
				'Tanggal_kematian' 				=> $this->input->post('tanggal_kematian'),
				'ktp'							=> $image_ktp
			);

			if (!$this->admin_model->save_death_certificate($data_death_certificate)) {
				$this->session->set_flashdata('alert', 'Data berhasil ditambah.');
				$this->session->set_flashdata('alert_type', 'info');
				redirect('death-certificate');
			}
		} else {

			$data['is_home'] = false;
			$data['title'] = 'Surat Keterangan Kematian';
			$this->load->view('service/templates/header');
			$this->load->view('service/templates/navbar', $data);
			$this->load->view('service/services/death-certificate/index', $data);
			$this->load->view('service/templates/footer');
		}
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

	public function addMarriageLetter()
	{
		if ($this->input->post('ttl') != null) {

			$image_kk           = $_FILES['foto_kk']['name'];
			$image_ktp           = $_FILES['foto_ktp']['name'];

			if ($image_kk != null) {
				$config['upload_path'] = './assets/img-admin/spn';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_kk')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_marriage_recommendation', $error);
					echo $error;
				} else {
					$image_kk = $this->upload->data('file_name');
				}
			}
			if ($image_ktp != null) {
				$config['upload_path'] = './assets/img-admin/spn';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_ktp')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_marriage_recommendation', $error);
					echo $error;
				} else {
					$image_ktp = $this->upload->data('file_name');
				}
			}

			$data_marriage_recommendation = array(
				'Tanggal_pengantarnikah'	=> $this->input->post('tanggal'),
				'Nama' 						=> $this->input->post('nama'),
				'Ttl' 						=> $this->input->post('ttl'),
				'Jenis_kelamin' 			=> $this->input->post('jenis_kelamin'),
				'Pekerjaan' 				=> $this->input->post('pekerjaan'),
				'Agama' 					=> $this->input->post('agama'),
				'Status_kawin' 				=> $this->input->post('status_kawin'),
				'Alamat' 					=> $this->input->post('alamat'),
				'Anak_ke' 					=> $this->input->post('anak_ke'),
				'Nama_ayah' 				=> $this->input->post('nama_ayah'),
				'Ttl_ayah' 					=> $this->input->post('ttl_ayah'),
				'Agama_ayah' 				=> $this->input->post('agama_ayah'),
				'Pekerjaan_ayah' 			=> $this->input->post('pekerjaan_ayah'),
				'Alamat_ayah' 				=> $this->input->post('alamat_ayah'),
				'Nama_ibu' 					=> $this->input->post('nama_ibu'),
				'Ttl_ibu' 					=> $this->input->post('ttl_ibu'),
				'Agama_ibu' 				=> $this->input->post('agama_ibu'),
				'Pekerjaan_ibu'		 		=> $this->input->post('pekerjaan_ibu'),
				'Alamat_ibu' 				=> $this->input->post('alamat_ibu'),
				'Ktp' 						=> $image_ktp,
				'kk'                       	=> $image_kk
			);

			if (!$this->admin_model->save_marriage_recommendation($data_marriage_recommendation)) {
				$this->session->set_flashdata('alert', 'Data berhasil ditambah.');
				$this->session->set_flashdata('alert_type', 'info');
				redirect('marriage-letter');
			}
		} else {

			$data['is_home'] = false;
			$data['title'] = 'Surat Pengantar Nikah';
			$this->load->view('service/templates/header');
			$this->load->view('service/templates/navbar', $data);
			$this->load->view('service/services/marriage-letter/index', $data);
			$this->load->view('service/templates/footer');
		}
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

	public function addPoliceRecordLetter()
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
