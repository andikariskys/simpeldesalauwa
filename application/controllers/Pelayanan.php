<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanan extends CI_Controller {

	/**
	 * Controller ini untuk halaman pengunjung
	 */

	public function index()
	{
		$this->load->view('pelayanan/templates/header');
		$this->load->view('pelayanan/templates/navbar');
		$this->load->view('pelayanan/dashboard');
		$this->load->view('pelayanan/templates/footer');
	}
}
