<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	/**
	 * Controller ini untuk halaman backend
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin_model');
	}

	public function index()
	{
		$data['count_all'] = $this->admin_model->get_count_dashboard();
		$data['active'] = "Dashboard";
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/dashboard', $data);
		$this->load->view('backend/templates/footer');
	}

	function profiles()
	{
		$data['active'] = "Profil";
		$data['data_profiles'] = $this->admin_model->get_profiles();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/profiles/profiles', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_profile()
	{
		if ($this->input->post('sambutan_kepala_desa') != null) {

			$data_profile = array(
				'Tanggal_profil' 		=> $this->input->post('tanggal'),
				'Sambutan_kepaladesa' 	=> $this->input->post('sambutan_kepala_desa'),
				'Visi' 					=> $this->input->post('visi'),
				'Misi' 					=> $this->input->post('misi'),
				'Jam_kerja' 			=> $this->input->post('jam_kerja')
			);

			if (!$this->admin_model->save_profile($data_profile)) {
				$this->session->set_flashdata('add_profile', 'Data berhasil disimpan!');
				redirect('profiles');
			}
		} else {

			$data['active'] = "Tambah Profil";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/profiles/add_profile');
			$this->load->view('backend/templates/footer');
		}
	}

	function delete_profile($id_profile)
	{
		if (!$this->admin_model->delete_profile($id_profile)) {
			$this->session->set_flashdata('delete_profile', 'Data berhasil dihapus!');
			redirect('profiles');
		}
	}

	function update_profile($id_profile)
	{
		if ($this->input->post('this_update') == true) {

			$data_profile = array(
				'Tanggal_profil' 		=> $this->input->post('tanggal'),
				'Sambutan_kepaladesa' 	=> $this->input->post('sambutan_kepala_desa'),
				'Visi' 					=> $this->input->post('visi'),
				'Misi' 					=> $this->input->post('misi'),
				'Jam_kerja' 			=> $this->input->post('jam_kerja')
			);

			if (!$this->admin_model->update_profile($data_profile, $id_profile)) {
				$this->session->set_flashdata('update_profile', 'Ubah data berhasil disimpan!');
				redirect('profiles');
			}
		} else {

			$data['active'] = "Ubah Profil";
			$data['data_profile'] = $this->admin_model->get_profiles($id_profile);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/profiles/update_profile', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	function informations()
	{
		$data['active'] = "Informasi";
		$data['data_informations'] = $this->admin_model->get_informations();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/informations/informations', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_information()
	{
		if ($this->input->post('nama_informasi') != null) {

			$image		= $_FILES['foto_informasi']['name'];

			if ($image != null) {
				$config['upload_path'] = './assets/img-admin/informasi';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_informasi')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('failed_upload_image', $error);
					echo $error;
				} else {
					$image = $this->upload->data('file_name');
				}
			}

			$data_information = array(
				'Tanggal_informasi' => $this->input->post('tanggal'),
				'Nama_informasi'	=> $this->input->post('nama_informasi'),
				'Isi'				=> $this->input->post('isi_informasi'),
				'Foto'				=> $image
			);

			if (!$this->admin_model->save_information($data_information)) {
				$this->session->set_flashdata('add_information', 'Data berhasil disimpan!');
				redirect('informations');
			}
		} else {

			$data['active'] = "Tambah Informasi";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/informations/add_information');
			$this->load->view('backend/templates/footer');
		}
	}

	function delete_information($id_information)
	{
		$image = $this->admin_model->get_informations($id_information);
		unlink('./assets/img-admin/informasi' . $image->Foto);

		if (!$this->admin_model->delete_information($id_information)) {

			$this->session->set_flashdata('delete_information', 'Data berhasil dihapus!');

			redirect('informations');
		}
	}

	function update_information($id_information)
	{
		if ($this->input->post('this_update') == true) {

			$image_origin 		= $this->input->post('image_origin');
			$image              = $_FILES['foto_informasi']['name'];

			if ($image != null) {
				$config['upload_path'] = './assets/img-admin/informasi';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_informasi')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('failed_upload_image', $error);
					echo $error;
				} else {
					$image = $this->upload->data('file_name');

					unlink('./assets/img-admin/informasi/' . $image_origin);
				}
			} else {
				$image = $image_origin;
			}

			$data_information = array(
				'Tanggal_informasi' => $this->input->post('tanggal'),
				'Nama_informasi'	=> $this->input->post('nama_informasi'),
				'Isi'				=> $this->input->post('isi_informasi'),
				'Foto'				=> $image
			);

			if (!$this->admin_model->update_information($data_information, $id_information)) {
				$this->session->set_flashdata('update_information', 'Ubah data berhasil disimpan!');
				redirect('informations');
			}
		} else {

			$data['active'] = "Ubah Informasi";
			$data['data_information'] = $this->admin_model->get_informations($id_information);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/informations/update_information', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	function parent_incomes()
	{
		$data['active'] = "SK Penghasilan Orang Tua";
		$data['parent_incomes'] = $this->admin_model->get_parent_incomes();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/parent_incomes/parent_incomes', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_parent_income()
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

			if (!$this->admin_model->save_parent_income($data_parent_income)) {
				$this->session->set_flashdata('success_parent_income', 'Tambah data berhasil disimpan!');
				redirect('parent_incomes');
			}
		} else {

			$data['active'] = "Tambah SK Penghasilan Orang Tua";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/parent_incomes/add_parent_income');
			$this->load->view('backend/templates/footer');
		}
	}

	function verification_parent_income($id_parent_income)
	{
		$data_parent_income = array('Status_penghasilanorangtua' => 'Terverifikasi');

		if (!$this->admin_model->update_parent_income($data_parent_income, $id_parent_income)) {
			$this->session->set_flashdata('success_parent_income', 'SK berhasil diverifikasi!');
			redirect('parent_incomes');
		}
	}

	function delete_parent_income($id_parent_income)
	{
		$image = $this->admin_model->get_parent_incomes($id_parent_income);
		unlink('./assets/img-admin/spot/' . $image->ktp);
		unlink('./assets/img-admin/spot/' . $image->kk);

		if (!$this->admin_model->delete_parent_income($id_parent_income)) {
			$this->session->set_flashdata('danger_parent_income', 'Data berhasil dihapus!');
			redirect('parent_incomes');
		}
	}

	function update_parent_income($id_parent_income)
	{
		if ($this->input->post('this_update') == true) {

			$image_ktp_origin 	= $this->input->post('image_ktp_origin');
			$image_kk_origin 	= $this->input->post('image_kk_origin');

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

					unlink('./assets/img-admin/spot/' . $image_ktp_origin);
				}
			} else {
				$image_ktp = $image_ktp_origin;
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

					unlink('./assets/img-admin/spot/' . $image_kk_origin);
				}
			} else {
				$image_kk = $image_kk_origin;
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

			if (!$this->admin_model->update_parent_income($data_parent_income, $id_parent_income)) {
				$this->session->set_flashdata('update_parent_income', 'Ubah data berhasil disimpan!');
				redirect('parent_incomes');
			}
		} else {

			$data['active'] = "Ubah SK Penghasilan Orang Tua";
			$data['data_parent_income'] = $this->admin_model->get_parent_incomes($id_parent_income);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/parent_incomes/update_parent_income', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	function financial_hardships()
	{
		$data['active'] = "SK Tidak Mampu";
		$data['financial_hardships'] = $this->admin_model->get_financial_hardships();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/financial_hardships/financial_hardships', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_financial_hardship()
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
				$this->session->set_flashdata('success_financial_hardship', 'Tambah data berhasil disimpan!');
				redirect('financial_hardships');
			}
		} else {

			$data['active'] = "Tambah SK Tidak Mampu";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/financial_hardships/add_financial_hardship');
			$this->load->view('backend/templates/footer');
		}
	}

	function verification_financial_hardship($id_financial_hardship)
	{
		$data_financial_hardship = array('Status_keterangantidakmampu' => 'Terverifikasi');

		if (!$this->admin_model->update_financial_hardship($data_financial_hardship, $id_financial_hardship)) {
			$this->session->set_flashdata('success_financial_hardship', 'SK berhasil diverifikasi!');
			redirect('financial_hardships');
		}
	}

	function delete_financial_hardship($id_financial_hardship)
	{
		$image = $this->admin_model->get_financial_hardships($id_financial_hardship);
		unlink('./assets/img-admin/sktm/' . $image->kk);

		if (!$this->admin_model->delete_financial_hardship($id_financial_hardship)) {
			$this->session->set_flashdata('danger_financial_hardship', 'Data berhasil dihapus!');
			redirect('financial_hardships');
		}
	}

	function update_financial_hardship($id_financial_hardship)
	{
		if ($this->input->post('this_update') == true) {

			$image_kk_origin 	= $this->input->post('image_kk_origin');
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

					unlink('./assets/img-admin/sktm/' . $image_kk_origin);
				}
			} else {
				$image_kk = $image_kk_origin;
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
				'kk'							=> $image_kk,
			);

			if (!$this->admin_model->update_financial_hardship($data_financial_hardship, $id_financial_hardship)) {
				$this->session->set_flashdata('update_financial_hardship', 'Ubah data berhasil disimpan!');
				redirect('financial_hardships');
			}
		} else {

			$data['active'] = "Ubah SK Tidak Mampu";
			$data['data_financial_hardship'] = $this->admin_model->get_financial_hardships($id_financial_hardship);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/financial_hardships/update_financial_hardship', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	function death_certificates()
	{
		$data['active'] = "SK Kematian";
		$data['death_certificates'] = $this->admin_model->get_death_certificates();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/death_certificates/death_certificates', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_death_certificate()
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
				$this->session->set_flashdata('success_death_certificate', 'Tambah data berhasil disimpan!');
				redirect('death_certificates');
			}
		} else {

			$data['active'] = "Tambah SK Kematian";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/death_certificates/add_death_certificate');
			$this->load->view('backend/templates/footer');
		}
	}

	function verification_death_certificate($id_death_certificate)
	{
		$data_death_certificate = array('Status_keterangankematian' => 'Terverifikasi');

		if (!$this->admin_model->update_death_certificate($data_death_certificate, $id_death_certificate)) {
			$this->session->set_flashdata('success_death_certificate', 'SK berhasil diverifikasi!');
			redirect('death_certificates');
		}
	}

	function delete_death_certificate($id_death_certificate)
	{
		$image = $this->admin_model->get_death_certificates($id_death_certificate);
		unlink('./assets/img-admin/skm/' . $image->ktp);

		if (!$this->admin_model->delete_death_certificate($id_death_certificate)) {
			$this->session->set_flashdata('danger_death_certificate', 'Data berhasil dihapus!');
			redirect('death_certificates');
		}
	}

	function update_death_certificate($id_death_certificate)
	{
		if ($this->input->post('this_update') == true) {

			$image_ktp_origin 	= $this->input->post('image_ktp_origin');
			$image_ktp           = $_FILES['foto_ktp']['name'];

			if ($image_ktp != null) {
				$config['upload_path'] = './assets/img-admin/skm';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_ktp')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_parent_income', $error);
					echo $error;
				} else {
					$image_ktp = $this->upload->data('file_name');

					unlink('./assets/img-admin/skm/' . $image_ktp_origin);
				}
			} else {
				$image_ktp = $image_ktp_origin;
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

			if (!$this->admin_model->update_death_certificate($data_death_certificate, $id_death_certificate)) {
				$this->session->set_flashdata('update_death_certificate', 'Ubah data berhasil disimpan!');
				redirect('death_certificates');
			}
		} else {

			$data['active'] = "Ubah SK Kematian";
			$data['data_death_certificate'] = $this->admin_model->get_death_certificates($id_death_certificate);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/death_certificates/update_death_certificate', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	function birth_announcements()
	{
		$data['active'] = "SK Kelahiran";
		$data['birth_announcements'] = $this->admin_model->get_birth_announcements();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/birth_announcements/birth_announcements', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_birth_announcement()
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
				$this->session->set_flashdata('success_birth_announcement', 'Tambah data berhasil disimpan!');
				redirect('birth_announcements');
			}
		} else {

			$data['active'] = "Tambah SK Kelahiran";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/birth_announcements/add_birth_announcement');
			$this->load->view('backend/templates/footer');
		}
	}

	function verification_birth_announcement($id_birth_announcement)
	{
		$data_birth_announcement = array('Status_keterangankelahiran' => 'Terverifikasi');

		if (!$this->admin_model->update_birth_announcement($data_birth_announcement, $id_birth_announcement)) {
			$this->session->set_flashdata('success_birth_announcement', 'SK berhasil diverifikasi!');
			redirect('birth_announcements');
		}
	}

	function delete_birth_announcement($id_birth_announcement)
	{
		$image = $this->admin_model->get_birth_announcements($id_birth_announcement);
		unlink('./assets/img-admin/skkl/' . $image->kk);

		if (!$this->admin_model->delete_birth_announcement($id_birth_announcement)) {
			$this->session->set_flashdata('danger_birth_announcement', 'Data berhasil dihapus!');
			redirect('birth_announcements');
		}
	}

	function update_birth_announcement($id_birth_announcement)
	{
		if ($this->input->post('this_update') == true) {

			$image_kk_origin     = $this->input->post('image_kk_origin');
			$image_kk           = $_FILES['foto_kk']['name'];

			if ($image_kk != null) {
				$config['upload_path'] = './assets/img-admin/skkl';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_kk')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_parent_income', $error);
					echo $error;
				} else {
					$image_kk = $this->upload->data('file_name');

					unlink('./assets/img-admin/skkl/' . $image_kk_origin);
				}
			} else {
				$image_kk = $image_kk_origin;
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

			if (!$this->admin_model->update_birth_announcement($data_birth_announcement, $id_birth_announcement)) {
				$this->session->set_flashdata('update_birth_announcement', 'Ubah data berhasil disimpan!');
				redirect('birth_announcements');
			}
		} else {

			$data['active'] = "Ubah SK Kelahiran";
			$data['data_birth_announcement'] = $this->admin_model->get_birth_announcements($id_birth_announcement);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/birth_announcements/update_birth_announcement', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	function marriage_recommendations()
	{
		$data['active'] = "Surat Pengantar Nikah";
		$data['marriage_recommendations'] = $this->admin_model->get_marriage_recommendations();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/marriage_recommendations/marriage_recommendations', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_marriage_recommendation()
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
				$this->session->set_flashdata('success_marriage_recommendation', 'Tambah data berhasil disimpan!');
				redirect('marriage_recommendations');
			}
		} else {

			$data['active'] = "Tambah Surat Pengantar Nikah";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/marriage_recommendations/add_marriage_recommendation');
			$this->load->view('backend/templates/footer');
		}
	}

	function verification_marriage_recommendation($id_marriage_recommendation)
	{
		$data_marriage_recommendation = array('Status_pengantarnikah' => 'Terverifikasi');

		if (!$this->admin_model->update_marriage_recommendation($data_marriage_recommendation, $id_marriage_recommendation)) {
			$this->session->set_flashdata('success_marriage_recommendation', 'SK berhasil diverifikasi!');
			redirect('marriage_recommendations');
		}
	}

	function delete_marriage_recommendation($id_marriage_recommendation)
	{
		$image = $this->admin_model->get_marriage_recommendations($id_marriage_recommendation);
		unlink('./assets/img-admin/spn/' . $image->Kk);
		unlink('./assets/img-admin/spn/' . $image->Ktp);

		if (!$this->admin_model->delete_marriage_recommendation($id_marriage_recommendation)) {
			$this->session->set_flashdata('danger_marriage_recommendation', 'Data berhasil dihapus!');
			redirect('marriage_recommendations');
		}
	}

	function update_marriage_recommendation($id_marriage_recommendation)
	{
		if ($this->input->post('this_update') == true) {

			$image_kk_origin  	= $this->input->post('image_kk_origin');
			$image_ktp_origin	= $this->input->post('image_ktp_origin');
			$image_kk         	= $_FILES['foto_kk']['name'];
			$image_ktp       	= $_FILES['foto_ktp']['name'];

			if ($image_kk != null) {
				$config['upload_path'] = './assets/img-admin/spn';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_kk')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_parent_income', $error);
					echo $error;
				} else {
					$image_kk = $this->upload->data('file_name');

					unlink('./assets/img-admin/spn/' . $image_kk_origin);
				}
			} else {
				$image_kk = $image_kk_origin;
			}

			if ($image_ktp != null) {
				$config['upload_path'] = './assets/img-admin/spn';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_ktp')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_parent_income', $error);
					echo $error;
				} else {
					$image_ktp = $this->upload->data('file_name');

					unlink('./assets/img-admin/spn/' . $image_ktp_origin);
				}
			} else {
				$image_ktp = $image_ktp_origin;
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

			if (!$this->admin_model->update_marriage_recommendation($data_marriage_recommendation, $id_marriage_recommendation)) {
				$this->session->set_flashdata('update_marriage_recommendation', 'Ubah data berhasil disimpan!');
				redirect('marriage_recommendations');
			}
		} else {

			$data['active'] = "Ubah Surat Pengantar Nikah";
			$data['data_marriage_recommendation'] = $this->admin_model->get_marriage_recommendations($id_marriage_recommendation);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/marriage_recommendations/update_marriage_recommendation', $data);
			$this->load->view('backend/templates/footer');
		}
	}
}
