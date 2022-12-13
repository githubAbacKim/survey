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
		$data['title'] = "Home Page";

		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer',$data);
	}

	public function survey_page(){
		$data['title'] = "Survey Page";

		$this->load->view('header',$data);
		$this->load->view('survey',$data);
		$this->load->view('footer',$data);
	
	}

	public function survey_result(){
		$data['title'] = "Survey Page";

		$this->load->view('header',$data);
		$this->load->view('survey_result',$data);
		$this->load->view('footer',$data);
	}

	public function question_statistic(){
		$data['title'] = "Survey Page";

		$this->load->view('header',$data);
		$this->load->view('question_statistics',$data);
		$this->load->view('footer',$data);
	}

	public function value_statistic(){
		$data['title'] = "Survey Page";

		$this->load->view('header',$data);
		$this->load->view('value_statistics',$data);
		$this->load->view('footer',$data);
	}

	function start_survey(){
		//add participants data
		//set session if adding is successful

	}

	function get_question(){
		//$result = $this->survey_model->select_join($table,$join,$like=false,$where=false,$order=false,$group=false,$or_where=false,$or_like=false,$where_not_in=false,$wni_column=false,$where_in = false);	
	}


}
