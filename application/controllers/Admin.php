<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Controller ini untuk halaman backend
	 */

	public function index()
	{
		$this->load->view('backend/templates/header');
		$this->load->view('backend/templates/sidebar');
		$this->load->view('backend/dashboard');
		$this->load->view('backend/templates/footer');
	}
}
