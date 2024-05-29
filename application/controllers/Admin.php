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

		if ($this->session->userdata('is_login') != true) {
			echo "
			<script>
				var userConfirmed = confirm('Silakan masuk/login terlebih dahulu');
				if (userConfirmed) {
					window.location.href = '" . base_url() ."'; 
				}
			</script>
			";
		}
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

	function police_reports()
	{
		$data['active'] = "Surat Pengantar SKCK";
		$data['police_reports'] = $this->admin_model->get_police_reports();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/police_reports/police_reports', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_police_report()
	{
		if ($this->input->post('ttl') != null) {

			$image_ktp           = $_FILES['foto_ktp']['name'];

			if ($image_ktp != null) {
				$config['upload_path'] = './assets/img-admin/spkck';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_ktp')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_police_report', $error);
					echo $error;
				} else {
					$image_ktp = $this->upload->data('file_name');
				}
			}

			$data_police_report = array(
				'Tanggal_pengantarskck'		=> $this->input->post('tanggal'),
				'Nama' 						=> $this->input->post('nama'),
				'Ttl' 						=> $this->input->post('ttl'),
				'Jenis_kelamin' 			=> $this->input->post('jenis_kelamin'),
				'Pekerjaan' 				=> $this->input->post('pekerjaan'),
				'Agama' 					=> $this->input->post('agama'),
				'Status_kawin' 				=> $this->input->post('status_kawin'),
				'Alamat' 					=> $this->input->post('alamat'),
				'Nik' 						=> $this->input->post('nik'),
				'Ktp' 						=> $image_ktp
			);

			if (!$this->admin_model->save_police_report($data_police_report)) {
				$this->session->set_flashdata('success_police_report', 'Tambah data berhasil disimpan!');
				redirect('police_reports');
			}
		} else {

			$data['active'] = "Tambah Surat Pengantar SKCK";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/police_reports/add_police_report');
			$this->load->view('backend/templates/footer');
		}
	}

	function verification_police_report($id_police_report)
	{
		$data_police_report = array('Status_pengantarskck' => 'Terverifikasi');

		if (!$this->admin_model->update_police_report($data_police_report, $id_police_report)) {
			$this->session->set_flashdata('success_police_report', 'SK berhasil diverifikasi!');
			redirect('police_reports');
		}
	}

	function delete_police_report($id_police_report)
	{
		$image = $this->admin_model->get_police_reports($id_police_report);
		unlink('./assets/img-admin/spkck/' . $image->Ktp);

		if (!$this->admin_model->delete_police_report($id_police_report)) {
			$this->session->set_flashdata('danger_police_report', 'Data berhasil dihapus!');
			redirect('police_reports');
		}
	}

	function update_police_report($id_police_report)
	{
		if ($this->input->post('this_update') == true) {

			$image_ktp_origin	= $this->input->post('image_ktp_origin');
			$image_ktp       	= $_FILES['foto_ktp']['name'];

			if ($image_ktp != null) {
				$config['upload_path'] = './assets/img-admin/spkck';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_ktp')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('danger_parent_income', $error);
					echo $error;
				} else {
					$image_ktp = $this->upload->data('file_name');

					unlink('./assets/img-admin/spkck/' . $image_ktp_origin);
				}
			} else {
				$image_ktp = $image_ktp_origin;
			}

			$data_police_report = array(
				'Tanggal_pengantarskck'		=> $this->input->post('tanggal'),
				'Nama' 						=> $this->input->post('nama'),
				'Ttl' 						=> $this->input->post('ttl'),
				'Jenis_kelamin' 			=> $this->input->post('jenis_kelamin'),
				'Pekerjaan' 				=> $this->input->post('pekerjaan'),
				'Agama' 					=> $this->input->post('agama'),
				'Status_kawin' 				=> $this->input->post('status_kawin'),
				'Alamat' 					=> $this->input->post('alamat'),
				'Nik' 						=> $this->input->post('nik'),
				'Ktp' 						=> $image_ktp
			);

			if (!$this->admin_model->update_police_report($data_police_report, $id_police_report)) {
				$this->session->set_flashdata('update_police_report', 'Ubah data berhasil disimpan!');
				redirect('police_reports');
			}
		} else {

			$data['active'] = "Ubah Surat Pengantar SKCK";
			$data['data_police_report'] = $this->admin_model->get_police_reports($id_police_report);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/police_reports/update_police_report', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	function galleries()
	{
		$data['active'] = "Galeri";
		$data['data_galleries'] = $this->admin_model->get_galleries();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/galleries/galleries', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_gallery()
	{
		if ($this->input->post('nama_galeri') != null) {

			$image		= $_FILES['foto_galeri']['name'];

			if ($image != null) {
				$config['upload_path'] = './assets/img-admin/galeri';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_galeri')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('failed_upload_image', $error);
					echo $error;
				} else {
					$image = $this->upload->data('file_name');
				}
			}

			$data_gallery = array(
				'Tanggal_galeri'	=> $this->input->post('tanggal'),
				'Nama_galeri'		=> $this->input->post('nama_galeri'),
				'Foto'				=> $image
			);

			if (!$this->admin_model->save_gallery($data_gallery)) {
				$this->session->set_flashdata('add_gallery', 'Data berhasil disimpan!');
				redirect('galleries');
			}
		} else {

			$data['active'] = "Tambah Galeri";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/galleries/add_gallery');
			$this->load->view('backend/templates/footer');
		}
	}

	function delete_gallery($id_gallery)
	{
		$image = $this->admin_model->get_galleries($id_gallery);
		unlink('./assets/img-admin/galeri/' . $image->Foto);

		if (!$this->admin_model->delete_gallery($id_gallery)) {

			$this->session->set_flashdata('delete_gallery', 'Data berhasil dihapus!');

			redirect('galleries');
		}
	}

	function update_gallery($id_gallery)
	{
		if ($this->input->post('this_update') == true) {

			$image_origin 		= $this->input->post('image_origin');
			$image              = $_FILES['foto_galeri']['name'];

			if ($image != null) {
				$config['upload_path'] = './assets/img-admin/galeri';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_galeri')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('failed_upload_image', $error);
					echo $error;
				} else {
					$image = $this->upload->data('file_name');

					unlink('./assets/img-admin/galeri/' . $image_origin);
				}
			} else {
				$image = $image_origin;
			}

			$data_gallery = array(
				'Tanggal_galeri' 	=> $this->input->post('tanggal'),
				'Nama_galeri'		=> $this->input->post('nama_galeri'),
				'Foto'				=> $image
			);

			if (!$this->admin_model->update_gallery($data_gallery, $id_gallery)) {
				$this->session->set_flashdata('update_gallery', 'Ubah data berhasil disimpan!');
				redirect('galleries');
			}
		} else {

			$data['active'] = "Ubah Galeri";
			$data['data_gallery'] = $this->admin_model->get_galleries($id_gallery);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/galleries/update_gallery', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	function contacts()
	{
		$data['active'] = "Kontak";
		$data['data_contacts'] = $this->admin_model->get_contacts();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/contacts/contacts', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_contact()
	{
		if ($this->input->post('email') != null) {

			$data_contact = array(
				'Alamat' 		=> $this->input->post('alamat'),
				'Email' 		=> $this->input->post('email'),
				'Telepon'       => $this->input->post('telepon')
			);

			if (!$this->admin_model->save_contact($data_contact)) {
				$this->session->set_flashdata('add_contact', 'Data berhasil disimpan!');
				redirect('contacts');
			}
		} else {

			$data['active'] = "Tambah Kontak";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/contacts/add_contact');
			$this->load->view('backend/templates/footer');
		}
	}

	function delete_contact($id_contact)
	{
		if (!$this->admin_model->delete_contact($id_contact)) {
			$this->session->set_flashdata('delete_contact', 'Data berhasil dihapus!');
			redirect('contacts');
		}
	}

	function update_contact($id_contact)
	{
		if ($this->input->post('this_update') == true) {

			$data_contact = array(
				'Alamat' 		=> $this->input->post('alamat'),
				'Email' 		=> $this->input->post('email'),
				'Telepon'       => $this->input->post('telepon')
			);

			if (!$this->admin_model->update_contact($data_contact, $id_contact)) {
				$this->session->set_flashdata('update_contact', 'Ubah data berhasil disimpan!');
				redirect('contacts');
			}
		} else {

			$data['active'] = "Ubah Kontak";
			$data['data_contact'] = $this->admin_model->get_contacts($id_contact);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/contacts/update_contact', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	function users()
	{
		$data['active'] = "User";
		$data['data_users'] = $this->admin_model->get_users();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/templates/sidebar', $data);
		$this->load->view('backend/users/users', $data);
		$this->load->view('backend/templates/footer');
	}

	function add_user()
	{
		if ($this->input->post('username') != null) {

			$data_user = array(
				'Nama_user'		=> $this->input->post('nama'),
				'Username' 		=> $this->input->post('username'),
				'password'  	=> md5($this->input->post('password'))
			);

			if (!$this->admin_model->save_user($data_user)) {
				$this->session->set_flashdata('add_user', 'Data berhasil disimpan!');
				redirect('users');
			}
		} else {

			$data['active'] = "Tambah User";
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/users/add_user');
			$this->load->view('backend/templates/footer');
		}
	}

	function delete_user($id_user)
	{
		if (!$this->admin_model->delete_user($id_user)) {
			$this->session->set_flashdata('delete_user', 'Data berhasil dihapus!');
			redirect('users');
		}
	}

	function update_user($id_user, $type = null)
	{
		if ($this->input->post('this_update') == true) {

			if ($this->input->post('this_reset') == true) {
				$data_user = array(
					'password'  	=> md5($this->input->post('password'))
				);
				$message = "Ubah password berhasil disimpan!";
			} else {
				$data_user = array(
					'Nama_user'		=> $this->input->post('nama'),
					'Username' 		=> $this->input->post('username')
				);
				$message = "Ubah data berhasil disimpan!";
			}

			if (!$this->admin_model->update_user($data_user, $id_user)) {
				$this->session->set_flashdata('update_user', $message);
				redirect('users');
			}
		} else {

			$data['active'] = "Ubah User";
			$data['data_user'] = $this->admin_model->get_users($id_user);
			$data['type'] = $type;
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/templates/sidebar', $data);
			$this->load->view('backend/users/update_user', $data);
			$this->load->view('backend/templates/footer');
		}
	}
}
