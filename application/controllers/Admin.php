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

			$tanggal 				= $this->input->post('tanggal');
			$sambutan_kepala_desa 	= $this->input->post('sambutan_kepala_desa');
			$visi 					= $this->input->post('visi');
			$misi 					= $this->input->post('misi');
			$jam_kerja 				= $this->input->post('jam_kerja');

			$data_profile = array(
				'Tanggal_profil' 		=> $tanggal,
				'Sambutan_kepaladesa' 	=> $sambutan_kepala_desa,
				'Visi' 					=> $visi,
				'Misi' 					=> $misi,
				'Jam_kerja' 			=> $jam_kerja
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

			$tanggal 				= $this->input->post('tanggal');
			$sambutan_kepala_desa 	= $this->input->post('sambutan_kepala_desa');
			$visi 					= $this->input->post('visi');
			$misi 					= $this->input->post('misi');
			$jam_kerja 				= $this->input->post('jam_kerja');

			$data_profile = array(
				'Tanggal_profil' 		=> $tanggal,
				'Sambutan_kepaladesa' 	=> $sambutan_kepala_desa,
				'Visi' 					=> $visi,
				'Misi' 					=> $misi,
				'Jam_kerja' 			=> $jam_kerja
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

			$tanggal 			= $this->input->post('tanggal');
			$nama_informasi 	= $this->input->post('nama_informasi');
			$isi_informasi 		= $this->input->post('isi_informasi');
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
				}
			}

			$data_information = array(
				'Tanggal_informasi' => $tanggal,
				'Nama_informasi'	=> $nama_informasi,
				'Isi'				=> $isi_informasi,
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

			$tanggal 			= $this->input->post('tanggal');
			$nama_informasi 	= $this->input->post('nama_informasi');
			$isi_informasi 		= $this->input->post('isi_informasi');
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
				'Tanggal_informasi' => $tanggal,
				'Nama_informasi'	=> $nama_informasi,
				'Isi'				=> $isi_informasi,
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

			$tanggal 			= $this->input->post('tanggal');
			$no_kk 				= $this->input->post('no_kk');
			$nik 				= $this->input->post('nik');
			$nama_lengkap 		= $this->input->post('nama_lengkap');
			$ttl 				= $this->input->post('ttl');
			$jenis_kelamin 		= $this->input->post('jenis_kelamin');
			$agama 				= $this->input->post('agama');
			$nik_ayah 			= $this->input->post('nik_ayah');
			$nama_lengkap_ayah	= $this->input->post('nama_lengkap_ayah');
			$ttl_ayah 			= $this->input->post('ttl_ayah');
			$agama_ayah 		= $this->input->post('agama_ayah');
			$pekerjaan_ayah 	= $this->input->post('pekerjaan_ayah');
			$penghasilan_ayah 	= $this->input->post('penghasilan_ayah');
			$nik_ibu 			= $this->input->post('nik_ibu');
			$nama_lengkap_ibu 	= $this->input->post('nama_lengkap_ibu');
			$ttl_ibu 			= $this->input->post('ttl_ibu');
			$agama_ibu 			= $this->input->post('agama_ibu');
			$pekerjaan_ibu 		= $this->input->post('pekerjaan_ibu');
			$penghasilan_ibu 	= $this->input->post('penghasilan_ibu');

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
				'Tanggal_penghasilan' 	=> $tanggal,
				'No_kk'					=> $no_kk,
				'Nik'					=> $nik,
				'Nama'					=> $nama_lengkap,
				'Ttl'					=> $ttl,
				'Jenis_kelamin'			=> $jenis_kelamin,
				'Agama'					=> $agama,
				'Nik_ayah'				=> $nik_ayah,
				'Nama_ayah'				=> $nama_lengkap_ayah,
				'Ttl_ayah'				=> $ttl_ayah,
				'Agama_ayah'			=> $agama_ayah,
				'Pekerjaan_ayah'		=> $pekerjaan_ayah,
				'Penghasilan_ayah'		=> $penghasilan_ayah,
				'Nik_ibu'				=> $nik_ibu,
				'Nama_ibu'				=> $nama_lengkap_ibu,
				'Ttl_ibu'				=> $ttl_ibu,
				'Agama_ibu'				=> $agama_ibu,
				'Pekerjaan_ibu'			=> $pekerjaan_ibu,
				'Penghasilan_ibu'		=> $penghasilan_ibu,
				'kk'					=> $image_kk,
				'ktp'					=> $image_ktp
			);

			if (!$this->admin_model->save_parent_income($data_parent_income)) {
				$this->session->set_flashdata('update_parent_income', 'Ubah data berhasil disimpan!');
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

			$tanggal 			= $this->input->post('tanggal');
			$no_kk 				= $this->input->post('no_kk');
			$nik 				= $this->input->post('nik');
			$nama_lengkap 		= $this->input->post('nama_lengkap');
			$ttl 				= $this->input->post('ttl');
			$jenis_kelamin 		= $this->input->post('jenis_kelamin');
			$agama 				= $this->input->post('agama');
			$nik_ayah 			= $this->input->post('nik_ayah');
			$nama_lengkap_ayah	= $this->input->post('nama_lengkap_ayah');
			$ttl_ayah 			= $this->input->post('ttl_ayah');
			$agama_ayah 		= $this->input->post('agama_ayah');
			$pekerjaan_ayah 	= $this->input->post('pekerjaan_ayah');
			$penghasilan_ayah 	= $this->input->post('penghasilan_ayah');
			$nik_ibu 			= $this->input->post('nik_ibu');
			$nama_lengkap_ibu 	= $this->input->post('nama_lengkap_ibu');
			$ttl_ibu 			= $this->input->post('ttl_ibu');
			$agama_ibu 			= $this->input->post('agama_ibu');
			$pekerjaan_ibu 		= $this->input->post('pekerjaan_ibu');
			$penghasilan_ibu 	= $this->input->post('penghasilan_ibu');
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
				'Tanggal_penghasilan' 	=> $tanggal,
				'No_kk'					=> $no_kk,
				'Nik'					=> $nik,
				'Nama'					=> $nama_lengkap,
				'Ttl'					=> $ttl,
				'Jenis_kelamin'			=> $jenis_kelamin,
				'Agama'					=> $agama,
				'Nik_ayah'				=> $nik_ayah,
				'Nama_ayah'				=> $nama_lengkap_ayah,
				'Ttl_ayah'				=> $ttl_ayah,
				'Agama_ayah'			=> $agama_ayah,
				'Pekerjaan_ayah'		=> $pekerjaan_ayah,
				'Penghasilan_ayah'		=> $penghasilan_ayah,
				'Nik_ibu'				=> $nik_ibu,
				'Nama_ibu'				=> $nama_lengkap_ibu,
				'Ttl_ibu'				=> $ttl_ibu,
				'Agama_ibu'				=> $agama_ibu,
				'Pekerjaan_ibu'			=> $pekerjaan_ibu,
				'Penghasilan_ibu'		=> $penghasilan_ibu,
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
}
