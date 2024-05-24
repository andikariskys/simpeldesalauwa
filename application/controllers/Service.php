<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{

	/**
	 * Controller ini untuk halaman pengunjung
	 */

	public function index()
	{
		$this->load->view('service/templates/header');
		$this->load->view('service/templates/navbar');
		$this->load->view('service/dashboard');
		$this->load->view('service/templates/footer');
	}
}
