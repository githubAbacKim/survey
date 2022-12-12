<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['title'] = "Administrator";
		$data['sub_heading'] = "Main Page";
		$data['page'] = 'Frontdesk';

		$data['record'] = $this->admin_model->property_info();

		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer',$data);
	}
}
