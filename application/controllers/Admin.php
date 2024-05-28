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
		unlink('./assets/img-admin/' . $image->Foto);

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
					$this->session->set_flashdata('danger_parent_income', $error);
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
}
