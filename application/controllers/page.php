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

		// echo $_SERVER['HTTP_HOST'];
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

	function generateRandomString($length = 10) 
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function getResultChar($sh,$ts,$th)
	{	
		$sh_true = 0;
		$sh_false = 0;
		$sh_return = null; 
		foreach($sh as $shval)
		{
			($shval === 'agree') ? $sh_true++ : $sh_false++;
		}
		$sh_return = ($sh_true > $sh_false) ?  'S' : 'H';		

		$ts_true = 0;
		$ts_false = 0;
		$ts_return = null; 
		foreach($ts as $tsval)
		{
			($tsval === 'agree') ? $ts_true++ : $ts_false++;
		}
		$ts_return = ($ts_true > $ts_false) ? 'T' :'S';

		$th_true = 0;
		$th_false = 0;
		$th_return = null; 
		foreach($th as $thval)
		{
			($thval === 'agree') ? $th_true++ : $th_false++;
		}
		$th_return = ($th_true > $th_false) ? 'T' : 'H';

		return $sh_return.$ts_return.$th_return;
	}

	// for val stat && question stat
	function getResultData($id,$type,$where){
		$where = array('participant_id'=>$id);		
		$data = $this->survey_model->select('participants_answer',$where);
		
		$sh = array();
		$ts = array();
		$th = array();
		$index = 0;
		foreach ($data as $key => $value) {
			if($value->question_num < 4 && $value->question_num > 0) { $sh[$key] = array($value->answer);};
			if($value->question_num > 3 && $value->question_num < 7) { $ts[$key] = array($value->answer);};
			if($value->question_num > 6 && $value->question_num < 10) { $th[$key] = array($value->answer);};			
		}
		if($type === "sh") return $sh;
		if($type === "ts") return $ts;
		if($type === "th") return $ts;
	}

	function fetchMayorType($result){
		$type = array(
			"SSH"=>"????????? ?????????_H ?????? ??????",
			"SST" => "????????? ?????????_T ?????? ??????",
			"HTH" => "????????? ?????????_T ?????? ??????",
			"HSH" => "?????? ?????????_S??? ??????",
			"STT" => "????????? ?????????_S??? ??????",
			"HTT" => "????????? ?????????_H??? ??????",
			"HST" => "?????? ?????????_A ?????? ??????",
			"STH" => "?????? ?????????_B ?????? ??????"
		);		
		return $type[$result];
	}

	function fetchProfile($result){
		$return = null;
		$char_profile = array(
			"SSH"=>"resources/images/personality/social.svg",
			"SST" => "resources/images/personality/social.svg",
			"HTH" => "resources/images/personality/human.svg",
			"HSH" => "resources/images/personality/human.svg",
			"STT" => "resources/images/personality/technical.svg",
			"HTT" => "resources/images/personality/technical.svg",
			"HST" => "resources/images/personality/balance.svg",
			"STH" => "resources/images/personality/balance.svg"
		);
		$return = ($result !== false) ?  $char_profile[$result] : $return = $char_profile;	
		return $return;
	}
	
	function fetchScale($result){
		$return = null;
		$scale = array(
			"SSH" =>array('resources/images/scale/agreeisgreater.svg','resources/images/scale/oppositeisgreater.svg','resources/images/scale/oppositeisgreater.svg'),
			"SST" =>array('resources/images/scale/agreeisgreater.svg','resources/images/scale/oppositeisgreater.svg','resources/images/scale/agreeisgreater.svg'),
			"HTH" =>array('resources/images/scale/oppositeisgreater.svg','resources/images/scale/agreeisgreater.svg','resources/images/scale/oppositeisgreater.svg'),
			"HSH" =>array('resources/images/scale/oppositeisgreater.svg','resources/images/scale/oppositeisgreater.svg','resources/images/scale/oppositeisgreater.svg'),
			"STT" =>array('resources/images/scale/agreeisgreater.svg','resources/images/scale/agreeisgreater.svg','resources/images/scale/agreeisgreater.svg'),
			"HTT" =>array('resources/images/scale/oppositeisgreater.svg','resources/images/scale/agreeisgreater.svg','resources/images/scale/agreeisgreater.svg'),
			"HST" =>array('resources/images/scale/oppositeisgreater.svg','resources/images/scale/oppositeisgreater.svg','resources/images/scale/agreeisgreater.svg'),
			"STH" =>array('resources/images/scale/agreeisgreater.svg','resources/images/scale/agreeisgreater.svg','resources/images/scale/oppositeisgreater.svg'),
		);
		$return = ($result !== false) ?  $scale[$result] : $scale;	
		return $return;
	}

	function fetchLabelRotate($result){
		$return = null;
		$label = array(
			"SSH" =>array('rotate-left','rotate-right','rotate-right'),
			"SST" =>array('rotate-left','rotate-right','rotate-left'),
			"HTH" =>array('rotate-right','rotate-left','rotate-right'),
			"HSH" =>array('rotate-right','rotate-right','rotate-right'),
			"STT" =>array('rotate-left','rotate-left','rotate-left'),
			"HTT" =>array('rotate-right','rotate-left','rotate-left'),
			"HST" =>array('rotate-right','rotate-right','rotate-left'),
			"STH" =>array('rotate-left','rotate-left','rotate-right'),
		);
		$return = ($result !== false) ?  $label[$result] : $label;	
		return $return;
	}

	function fetchLabelStyle($result){
		$return = null;
		$labelstyle = array(
			// sh1 ,sh2, ts1, ts2, th1, th2
			// rotate-left: 'leftbig','rightsmall'
			// rotateright: 'leftsmall','rightbig'
			"SSH" =>array('leftbig','rightsmall','leftsmall','rightbig','leftsmall','rightbig'),
			"SST" =>array('leftbig','rightsmall','leftsmall','rightbig','leftbig','rightsmall'),
			"HTH" =>array('leftsmall','rightbig','leftbig','rightsmall','leftsmall','rightbig'),
			"HSH" =>array('leftsmall','rightbig','leftsmall','rightbig','leftsmall','rightbig'),
			"STT" =>array('leftbig','rightsmall','leftbig','rightsmall','leftbig','rightsmall'),
			"HTT" =>array('leftsmall','rightbig','leftbig','rightsmall','leftbig','rightsmall'),
			"HST" =>array('leftsmall','rightbig','leftsmall','rightbig','leftbig','rightsmall'),
			"STH" =>array('leftbig','rightsmall','leftbig','rightsmall','leftsmall','rightbig'),
		);
		$return = ($result !== false) ?  $labelstyle[$result] : $labelstyle;	
		return $return;
	}

	//data result for question stat search
	function fetchResultData(){
		$result = $this->getResultChar($this->session->userdata('sh'),$this->session->userdata('ts'),$this->session->userdata('th'));
		$data['type_mayor'] = $this->fetchMayorType($result);
		$data['profile'] = $this->fetchProfile($result);
		$data['scale'] = $this->fetchScale($result);
		$data['labelrot'] = $this->fetchLabelRotate($result);
		$data['labelstyle'] = $this->fetchLabelStyle($result);
		$data['type'] = $result;

		echo json_encode($data);
	}

	function lookUpQuestionStat(){
		$this->form_validation->set_rules('gender', '??????', 'required',array('required'=>'?????? ???????????? {field}'));
		$this->form_validation->set_rules('school_level', '?????????', 'required',array('required'=>'?????? ???????????? {field}'));

		if( $this->input->post('school_level') === "????????????"){
			$this->form_validation->set_rules('elem', '????????????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if( $this->input->post('school_level') === "?????????"){
			$this->form_validation->set_rules('elem', '?????????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if( $this->input->post('school_level') === "????????????"){
			$this->form_validation->set_rules('highschool', '????????????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if( $this->input->post('school_level') === "??????"){
			$this->form_validation->set_rules('college', '??????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			//$msg['error'] = "???????????? ?????? ????????? ????????????. ?????? ????????? ??????????????????.";
			$msg['status'] = false;
		} else {
			if(set_value('school_level') === "????????????"){
				$classification  = set_value('elem');
			}
			if(set_value('school_level') === "?????????"){
				$classification = set_value('elem');
			}
			if(set_value('school_level') === "????????????"){
				$classification = set_value('highschool');
			}
			if(set_value('school_level') === "??????"){
				$classification = set_value('college');
			}

			$where = array(
				"gender" => set_value('gender'),
				"school_level" => set_value('school_level'),
				"classification" => strval($classification)
			);

			$var = array(
				"tab1"=>"participants_answer pa",
				"tab2"=>"participants p",
				"id1"=>"p.participant_id",
				"id2"=>"pa.participant_id"
			);
			$result = $this->survey_model->select_join($var,$like=false,$where);
			if($result !== false){
				$msg['data'] = $this->processSearch($result);
				$msg['status'] = true;
			}else{
				$msg['status'] = false;
				$msg['error'] = "????????? ????????????.";
				// no result
			}
		}
		echo json_encode($msg);
	}

	function lookUpValueStat(){
		$this->form_validation->set_rules('gender', '??????', 'required',array('required'=>'?????? ???????????? {field}'));
		$this->form_validation->set_rules('school_level', '?????????', 'required',array('required'=>'?????? ???????????? {field}'));

		if( $this->input->post('school_level') === "????????????"){
			$this->form_validation->set_rules('elem', '????????????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if( $this->input->post('school_level') === "?????????"){
			$this->form_validation->set_rules('elem', '?????????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if( $this->input->post('school_level') === "????????????"){
			$this->form_validation->set_rules('highschool', '????????????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if( $this->input->post('school_level') === "??????"){
			$this->form_validation->set_rules('college', '??????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if ($this->form_validation->run() == FALSE) {
			$msg['error'] = validation_errors();
			//$msg['error'] = "???????????? ?????? ????????? ????????????. ?????? ????????? ??????????????????.";
			$msg['status'] = false;
		} else {
			if(set_value('school_level') === "????????????"){
				$classification  = set_value('elem');
			}
			if(set_value('school_level') === "?????????"){
				$classification = set_value('elem');
			}
			if(set_value('school_level') === "????????????"){
				$classification = set_value('highschool');
			}
			if(set_value('school_level') === "??????"){
				$classification = set_value('college');
			}

			$where = array(
				"gender" => set_value('gender'),
				"school_level" => set_value('school_level'),
				"classification" => strval($classification)
			);
			
			$result = $this->survey_model->select("participants",$like=false,$where);
			if($result !== false){
				$msg['data'] = $this->processValStatSearch($result);
				$msg['status'] = true;
			}else{
				$msg['status'] = false;
				$msg['error'] = "????????? ????????????.";
				// no result
			}
		}
		echo json_encode($msg);
	}

	function processSearch($result){
		$ag1=0;$op1=0;
		$ag2=0;$op2=0;
		$ag3=0;$op3=0;
		$ag4=0;$op4=0;
		$ag5=0;$op5=0;
		$ag6=0;$op6=0;
		$ag7=0;$op7=0;
		$ag8=0;$op8=0;
		$ag9=0;$op9=0;
		foreach ($result as $key => $value) {
			// echo $value->question_num.'-'.$value->answer;
			// echo'<br>';
			if((int)$value->question_num === 1 && $value->answer === "agree") $ag1++;
			if((int)$value->question_num === 1 && $value->answer === "disagree") $op1++;

			if((int)$value->question_num === 2 && $value->answer === "agree") $ag2++;
			if((int)$value->question_num === 2 && $value->answer === "disagree") $op2++;
			
			if((int)$value->question_num === 3 && $value->answer === "agree") $ag3++;
			if((int)$value->question_num === 3 && $value->answer === "disagree") $op3++;
			
			if((int)$value->question_num === 4 && $value->answer === "agree") $ag4++;
			if((int)$value->question_num === 4 && $value->answer === "disagree") $op4++;

			if((int)$value->question_num === 5 && $value->answer === "agree") $ag5++;
			if((int)$value->question_num === 5 && $value->answer === "disagree") $op5++;

			if((int)$value->question_num === 6 && $value->answer === "agree") $ag6++;
			if((int)$value->question_num === 6 && $value->answer === "disagree") $op6++;
			
			if((int)$value->question_num === 7 && $value->answer === "agree") $ag7++;
			if((int)$value->question_num === 7 && $value->answer === "disagree") $op7++;

			if((int)$value->question_num === 8 && $value->answer === "agree") $ag8++;
			if((int)$value->question_num === 8 && $value->answer === "disagree") $op8++;

			if((int)$value->question_num === 9 && $value->answer === "agree") $ag9++;
			if((int)$value->question_num === 9 && $value->answer === "disagree") $op9++;
		}
		
		$resultarr = array(
			"1"=>array($ag1,$op1),
			"2"=>array($ag2,$op2),
			"3"=>array($ag3,$op3),
			"4"=>array($ag4,$op4),
			"5"=>array($ag5,$op5),
			"6"=>array($ag6,$op6),
			"7"=>array($ag7,$op7),
			"8"=>array($ag8,$op8),
			"9"=>array($ag9,$op9)
		);
		return $resultarr;
	}

	function processValStatSearch($result){
		$ssh=0; $sst=0; $hth=0; $hsh=0; $stt=0; $htt=0; $hst=0; $sth=0;	
		$return_arr = null;
		foreach ($result as $key => $value) {
			if($value->result === "SSH") $ssh++;			
			if($value->result === "SST") $sst++;
			if($value->result === "HTH") $hth++;
			if($value->result === "HSH") $hsh++;
			if($value->result === "STT") $stt++;
			if($value->result === "HTT") $htt++;
			if($value->result === "HST") $hst++;
			if($value->result === "STH") $sth++;
		}
		$return_arr = array(
			$ssh,
			$sst,
			$hth,
			$hsh,
			$stt,
			$htt,
			$hst,
			$sth
		);
		return $return_arr;
	}

	function fetchDefaultData(){
		$var = array(
			"tab1"=>"participants_answer pa",
			"tab2"=>"participants p",
			"id1"=>"p.participant_id",
			"id2"=>"pa.participant_id"
		);
		$result = $this->survey_model->select_join($var,$like=false,$where=false);
		if($result !== false){
			$msg['data'] = $this->processSearch($result);
			$msg['status'] = true;
		}else{
			$msg['status'] = false;
			$msg['error'] = "????????? ????????????.";
			// no result
		}
		echo json_encode($msg);
	}

	function fetchAllLink($result){
		$return = null;
		$type = array(
			"SSH"=>array("name"=>"ssh","desc"=>"????????????_H??? ?????????","bgcolor"=>"#6370E3","color"=>"#E3E6FF"),
			"SST"=>array("name"=>"sst","desc"=>"????????????_T??? ?????????","bgcolor"=>"#BEC5FF","color"=>"#2230AF"),
			"HTH"=>array("name"=>"hth","desc"=>"????????????_T??? ?????????","bgcolor"=>"#42C696","color"=>"#D7FFF0"),
			"HSH"=>array("name"=>"hsh","desc"=>"????????????_S??? ?????????","bgcolor"=>"#9AF5D4","color"=>"#11734F"),
			"STT"=>array("name"=>"stt","desc"=>"????????????_S??? ?????????","bgcolor"=>"#BB6BED","color"=>"#FCF8FF"),
			"HTT"=>array("name"=>"htt","desc"=>"????????????_H??? ?????????","bgcolor"=>"#DDB1FF","color"=>"#A445DF"),
			"HST"=>array("name"=>"hst","desc"=>"????????????_A??? ?????????","bgcolor"=>"#FF9C27","color"=>"#FFF9EA"),
			"STH"=>array("name"=>"sth","desc"=>"????????????_B??? ?????????","bgcolor"=>"#FFD772","color"=>"#EC840B")
		);		
		($result !== false) ? $return = $type[$result] : $return = $type;	
		return $return;
	}

	function fetchDefaultResultType(){				
		$default = "SSH";
		$result = $this->survey_model->select("participants");
		$msg['data'] = $this->processValStatSearch($result);
		$msg['link'] = $this->fetchAllLInk(false);
		$msg['rotate'] = $this->fetchLabelRotate($default);
		$msg['label'] = $this->fetchLabelStyle($default);
		$msg['scale'] = $this->fetchScale($default);
		echo json_encode($msg);
	}

	// processing script	
	public function register_participants()
	{	
		$this->form_validation->set_rules('gender', '??????', 'required',array('required'=>'?????? ???????????? {field}'));
		$this->form_validation->set_rules('school_level', '?????????', 'required',array('required'=>'?????? ???????????? {field}'));

		if( $this->input->post('school_level') === "????????????"){
			$this->form_validation->set_rules('elem', '????????????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if( $this->input->post('school_level') === "?????????"){
			$this->form_validation->set_rules('elem', '?????????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if( $this->input->post('school_level') === "????????????"){
			$this->form_validation->set_rules('highschool', '????????????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if( $this->input->post('school_level') === "??????"){
			$this->form_validation->set_rules('college', '??????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		if( $this->input->post('school_level') === "?????????"){
			$this->form_validation->set_rules('public', '?????????', 'required',array('required'=>'?????? ???????????? {field}'));
		}
		$this->form_validation->set_rules('regional_scale', '????????????', 'required',array('required'=>'?????? ???????????? {field}'));

		if ($this->form_validation->run() == FALSE) {
			//$msg['error'] = validation_errors();
			$msg['error'] = "???????????? ?????? ????????? ????????????. ?????? ????????? ??????????????????.";
			$msg['status'] = false;
		} else {
			if(set_value('school_level') === "????????????"){
				$classification  = set_value('elem');
			}
			if(set_value('school_level') === "?????????"){
				$classification = set_value('elem');
			}
			if(set_value('school_level') === "????????????"){
				$classification = set_value('highschool');
			}
			if(set_value('school_level') === "??????"){
				$classification = set_value('college');
			}
			if(set_value('school_level') === "?????????"){
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
			$this->form_validation->set_rules($name, 'Question #'.$i, 'required',array('required'=>'?????? ???????????? {field}'));
		}

		if ($this->form_validation->run() == FALSE) {
			// $msg['error'] = validation_errors();
			$msg['error'] = "???????????? ?????? ????????? ????????????. ?????? ????????? ??????????????????.";
			$msg['status'] = false;
		} else {
			$varcont = array();
			$num = 1;
			$id = $this->session->userdata('participant_id');
			for ($i=0; $i <= 8; $i++) {
				$answer = 'rq'.$num;
				$comment = 'comment'.$num;
				$varcont[$i] = array('participant_id'=>$id,'question_num'=>$num,'answer'=>set_value($answer),'comment'=>set_value($comment));
				$num++;
			}
			$sh = array(set_value('rq1'),set_value('rq2'),set_value('rq3'));
			$ts = array(set_value('rq4'),set_value('rq5'),set_value('rq6'));
			$th = array(set_value('rq7'),set_value('rq8'),set_value('rq9'));

			$add = $this->survey_model->insert_batch('participants_answer', $varcont);
			if ($add === true) {				
				//update participants result data
				$vardata = $this->getResultChar($sh,$ts,$th);
				$data = array("result"=>$vardata);
				$where = array('participant_id'=>$this->session->userdata('participant_id'));
				$table_name = "participants";
				$update = $this->survey_model->update($table_name,$where,$data);

				if($update === false){
					$msg['status'] = false;
					$msg['error'] = '?????? ???????????? ??????!!';
				}else{
					$result_arr = array(
						"sh"=>$sh,
						"ts"=>$ts,
						"th"=>$th
					);
					$this->session->set_userdata($result_arr);
					$msg['status'] = true;
				}
			} else {
				$msg['status'] = false;
				$msg['error'] = '????????? ?????? ??????!!';
			}	
		}
		echo json_encode($msg);
	}

	public function valsession()
	{
		if($this->session->userdata('participant_id') !== null || $this->session->has_userdata('participant_id')){
			$data['status'] = true;
		}else{
			$data['status'] = false;
		}
		echo json_encode($data);
	}

	public function clearSession(){
		$result_arr = array("sh","ts","th","participants_id");
		$this->session->unset_userdata($result_arr);
		$this->session->sess_destroy();

		if($this->session->userdata('participants_id')) 
		{
			$msg['success'] = false;
			$msg['error'] = "??????????????? ?????? ????????? ??? ????????????! ????????? ?????? ???????????????.";	
			
		}else 
		{
			$msg['success'] = true;
		} 			

		echo json_encode($msg);
	}

	public function test(){
		$var = array(
			"tab1"=>"participants_answer pa",
			"tab2"=>"participants p",
			"id1"=>"p.participant_id",
			"id2"=>"pa.participant_id"
		);
		//
		$where = array("gender"=>"??????","school_level"=>"????????????","classification"=>strval(3));
		$like = array();
		$result = $this->survey_model->select_join($var,$like=false,$where=false);
		// array that will have question_num, t_agree & t_disagree		
		echo count($result,1);
		$ag1=0;$op1=0;
		$ag2=0;$op2=0;
		$ag3=0;$op3=0;
		$ag4=0;$op4=0;
		$ag5=0;$op5=0;
		$ag6=0;$op6=0;
		$ag7=0;$op7=0;
		$ag8=0;$op8=0;
		$ag9=0;$op9=0;
		foreach ($result as $key => $value) {
			// echo $value->question_num.'-'.$value->answer;
			// echo'<br>';
			if((int)$value->question_num === 1 && $value->answer === "agree") $ag1++;
			if((int)$value->question_num === 1 && $value->answer === "disagree") $op1++;

			if((int)$value->question_num === 2 && $value->answer === "agree") $ag2++;
			if((int)$value->question_num === 2 && $value->answer === "disagree") $op2++;
			
			if((int)$value->question_num === 3 && $value->answer === "agree") $ag3++;
			if((int)$value->question_num === 3 && $value->answer === "disagree") $op3++;
			
			if((int)$value->question_num === 4 && $value->answer === "agree") $ag4++;
			if((int)$value->question_num === 4 && $value->answer === "disagree") $op4++;

			if((int)$value->question_num === 5 && $value->answer === "agree") $ag5++;
			if((int)$value->question_num === 5 && $value->answer === "disagree") $op5++;

			if((int)$value->question_num === 6 && $value->answer === "agree") $ag6++;
			if((int)$value->question_num === 6 && $value->answer === "disagree") $op6++;
			
			if((int)$value->question_num === 7 && $value->answer === "agree") $ag7++;
			if((int)$value->question_num === 7 && $value->answer === "disagree") $op7++;

			if((int)$value->question_num === 8 && $value->answer === "agree") $ag8++;
			if((int)$value->question_num === 8 && $value->answer === "disagree") $op8++;

			if((int)$value->question_num === 9 && $value->answer === "agree") $ag9++;
			if((int)$value->question_num === 9 && $value->answer === "disagree") $op9++;
		}
		
		$resultarr = array(
			"1"=>array($ag1,$op1),
			"2"=>array($ag2,$op2),
			"3"=>array($ag3,$op3),
			"4"=>array($ag4,$op4),
			"5"=>array($ag5,$op5),
			"6"=>array($ag6,$op6),
			"7"=>array($ag7,$op7),
			"8"=>array($ag8,$op8),
			"9"=>array($ag9,$op9)
		);
		print_r($resultarr);
	}

	public function test2(){
		$result = 'SSH';
		echo print_r($this->fetchScale($result));
	}

}
