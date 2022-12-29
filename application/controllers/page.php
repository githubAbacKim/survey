<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

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

		$this->load->view('header', $data);
		$this->load->view('index', $data);
		$this->load->view('footer', $data);
	}

	public function survey_page()
	{
		$data['title'] = "Survey Page";

		$this->load->view('headerplain', $data);
		$this->load->view('survey', $data);
		$this->load->view('footer', $data);

	}

	public function survey_result()
	{

		$data['title'] = "Survey Result Page";

		$this->load->view('headerplain', $data);
		$this->load->view('surveyResult', $data);
		$this->load->view('footer', $data);
	}

	public function questionStatistics()
	{
		$data['title'] = "Question Statistics Page";

		$this->load->view('headerplain', $data);
		$this->load->view('questionStat', $data);
		$this->load->view('footer', $data);
	}

	public function valueStatistic()
	{
		$data['title'] = "Value Statistics Page";

		$this->load->view('headerplain', $data);
		$this->load->view('valueStat', $data);
		$this->load->view('footer', $data);
	}

	public function questions()
	{
		$data['title'] = "Question Page";

		$this->load->view('headerplain', $data);
		$this->load->view('questions', $data);
		$this->load->view('footer', $data);
	}

	// fetch functions

	public function shuffledQuestion()
	{
		$result = array('data' => array());
		$data = $this->survey_model->select('question');
		shuffle($data);

		echo json_encode($data);
	}

	public function fetchquestion()
	{
		$result = array('data' => array());
		$data = $this->survey_model->select('question');
		echo json_encode($data);
	}

	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function baseurl(){
		$data['url'] = base_url();
		echo json_encode($data);
	}

	// insert functions

	public function register_participants()
	{
		$this->form_validation->set_rules('gender', '성별', 'required');
		$this->form_validation->set_rules('school_level', '학교급', 'required');

		if( $this->input->post('school_level') === "초등학교"){
			$this->form_validation->set_rules('elem', '초등학교', 'required');
		}
		if( $this->input->post('school_level') === "중학교"){
			$this->form_validation->set_rules('highschool', '중학교', 'required');
		}
		if( $this->input->post('school_level') === "고등학교"){
			$this->form_validation->set_rules('highschool', '고등학교', 'required');
		}
		if( $this->input->post('school_level') === "대학"){
			$this->form_validation->set_rules('college', '대학', 'required');
		}
		if( $this->input->post('school_level') === "일반인"){
			$this->form_validation->set_rules('public', '일반인', 'required');
		}
		$this->form_validation->set_rules('regional_scale', '지역규모', 'required');

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['status'] = false;
		} else {
			if(set_value('school_level') === "초등학교"){
				$classification  = set_value('elem');
			}
			if(set_value('school_level') === "중학교"){
				$classification = set_value('highschool');
			}
			if(set_value('school_level') === "고등학교"){
				$classification = set_value('highschool');
			}
			if(set_value('school_level') === "대학"){
				$classification = set_value('college');
			}
			if(set_value('school_level') === "일반인"){
				$classification = set_value('public');
			}

			$data = array(
				"gender" => set_value('gender'),
				"school_level" => set_value('school_level'),
				"classification" => $classification,
				"regional_scale" => set_value('regional_scale')
			);

			$return = true;
			$add = $this->survey_model->insert('participants', $data,$return);
			if ($add[0] === true) {
				$msg['status'] = true;
				// set session values id, inserted data
				$this->session->set_userdata('participant_id', $add[1]);
			} else {
				$msg['status'] = false;
				$msg['error'] = 'Error adding data.';
			}
		}
		echo json_encode($msg);
	}

	public function survey_answers()
	{
		for ($i=1; $i <= 9; $i++) {
			$name = 'rq'.$i;
			$this->form_validation->set_rules($name, 'Question #'.$i, 'required');
		}

		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			$msg['status'] = false;
		} else {
			$id = $this->session->userdata('participant_id');
			// $data = array(
			// 	array($id,set_value('rq1'),'1'),
			// 	array($id,set_value('rq2'),'2'),
			// 	array($id,set_value('rq3'),'3'),
			// 	array($id,set_value('rq4'),'4'),
			// 	array($id,set_value('rq5'),'5'),
			// 	array($id,set_value('rq6'),'6'),
			// 	array($id,set_value('rq7'),'7'),
			// 	array($id,set_value('rq8'),'8'),
			// 	array($id,set_value('rq9'),'9')
			// );
			$data = array(
				set_value('rq1'),set_value('rq2'),set_value('rq3'),set_value('rq4'),set_value('rq5'),set_value('rq6'),
				set_value('rq7'),set_value('rq8'),set_value('rq9')
			);
			$msg['data'] = set_value('rq1');
		}
		echo json_encode($msg);
	}

	public function valsession(){
		if($this->session->userdata('participant_id') !== null || $this->session->has_userdata('participant_id')){
			$data['status'] = true;
		}else{
			$data['status'] = false;
		}
		echo json_encode($data);
	}

	public function clearSession(){
		$this->session->sess_destroy();
	}

	public function test(){
		$length = 5;
		echo $this->generateRandomString($length);
	}

}
