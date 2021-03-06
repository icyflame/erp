<?php
class Member extends CI_Controller{
	public $data1 = "";
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('table');		
		$this->load->model('memberModel');
		$this->data1 = $this->memberModel->getYearList();
	}
	private function accessCheck(){
		$privilege = $this->session->userdata('privilege');
		if($privilege=='2'||$privilege=='1'){
			return "True";
		}

	}

	public function index(){
		if($this->accessCheck()){
		$data = array('years'=>$this->memberModel->getYearList());
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('members/home',$data);
		//fetch data for networking summary
		//$this->load->view('members/summary');
		$this->load->view('templates/footer');
		
	}
else{
	$this->load->view('templates/accessErr');
}}

	public function year($year){
		if($this->accessCheck()){

		$this->data1 = $this->memberModel->getYearList();
		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year);
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}


	}else{
	$this->load->view('templates/accessErr');
}}

	public function positive($year){
				if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"positive");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}
else{
	$this->load->view('templates/accessErr');
}}
	public function negative($year){
				if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"negative");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}
}
	else{
	$this->load->view('templates/accessErr');
}}
	public function neutral($year){
				if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"neutral");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}else{
	$this->load->view('templates/accessErr');
}}

	public function registered($year){
				if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"register");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}else{
	$this->load->view('templates/accessErr');
}}
	public function uncontacted($year){
						if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"uncontacted");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}else{
	$this->load->view('templates/accessErr');
}}
	public function unsearched($year){
						if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"unsearched");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}else{
	$this->load->view('templates/accessErr');
}}
	public function notFound($year){
								if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"notFound");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}else{
	$this->load->view('templates/accessErr');
}}
public function getProfile(){
	$id=$this->input->get('id');
	$data = $this->memberModel->getPrimaryInfo($id);
	
	echo json_encode($data);
}


public function search(){

		if($this->session->userdata('privilege')){
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('members/search');
		$this->load->view('templates/footer');

		}
		else
		$this->load->view('templates/accessErr');
	}

	public function generate_result(){

	
		if($this->session->userdata('privilege')){
			$data = $this->memberModel->search();
		
						if($data){
							$this->load->view('templates/header');
							$this->load->view('templates/menu');
							$this->load->view('members/search_result',$data);
							$this->load->view('templates/footer');
						}
				
				
			
		}else{
			$this->load->view('templates/accessErr');
}

}

public function updateProfile(){
	if($this->accessCheck()){
		if($this->input->post('submit')){

			if($this->memberModel->updateProfile()=="success"){
				header('Refresh:2,url='.$_SERVER["HTTP_REFERER"]);//security issues here
				echo "Values updated, you are being redirected back";
			}
		}

	}else{
		$this->load->view('templates/accessErr');
	}


}

public function updateSearch(){
	if($this->accessCheck()){
		$alumid = $this->input->get('alumid');
		$search = $this->input->get('search');
		$result = $this->memberModel->updateSearch($alumid,$search);
			echo $result;
		}
		else{
		$this->load->view('templates/accessErr');
	}
}
public function updateResponse(){
	if($this->accessCheck()){
		$alumid = $this->input->get('alumid');
		$response = $this->input->get('response');
		$result = $this->memberModel->updateResponse($alumid,$response);
			echo $result;
		}
		else{
		$this->load->view('templates/accessErr');
	}
}
public function updatePayment(){
	if($this->accessCheck()){
			$payment  = $this->input->get('payment');
			$alumid = $this->input->get('alumid');
			$dateofpayment = $this->input->get('dateofpayment');
			$referenceNo =	$this->input->get('referenceNo');
			$paymentAmt = $this->input->get('paymentAmt');
			$result = $this->memberModel->updatePayment($payment,$alumid,$dateofpayment,$referenceNo,$paymentAmt);
			
				echo $result;
			
			
		

	}else{
		$this->load->view('templates/accessErr');
	}
}
public function addCallDetail(){
	$alumid = $this->input->get('alumid');
	date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('H:i:s');
	echo $this->memberModel->addCallDetail($alumid,$date,$time);
}

public function updateCall(){
		$remarks = $this->input->get('remarks');
		$nextdate = $this->input->get('nextdate');
		$nexttime = $this->input->get('nexttime');
		$callid = $this->input->get('callid');
		$alumid = $this->input->get('alumid');
		echo $this->memberModel->updateCall($remarks,$nextdate,$nexttime,$callid,$alumid);
	
}
}

?>