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
		$this->load->view('backend/profiles', $data);
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
			$this->load->view('backend/add_profile');
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
			$this->load->view('backend/update_profile', $data);
			$this->load->view('backend/templates/footer');
		}
	}
}
