<?php
class MemberModel extends CI_Model{

	public function __construct(){
		$this->load->database();
		$this->load->library('table');
		$tmpl = array (
                    'table_open'          => '<table class="table table-striped table-bordered table-hover" border="5" cellpadding="6" cellspacing="4">',

                    'heading_row_start'   => '<tr >',// Important
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class="heading">',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr class="lookfor" >',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr class="lookfor" >',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

              

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl);

	}
	public function getUserId(){
		if($this->session->userdata('alias')){
			$username =  $this->session->userdata('alias');
			
		}
		else{
			$username = $this->session->userdata('username');
		}
		$query = $this->db->get_where('users',array('username'=>$username));
		if($query->num_rows()>0){
			$result = $query->row_array();
			return $result['userid'];
		}
	}

	public function getYearList(){
		$this->db->select('alumSince');
		$this->db->distinct();
		$query = $this->db->get('alumni');
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}

	public function getTable($year,$list="FullList"){
		$tmpl = array (
                    'table_open'          => '<table class="table table-striped table-bordered table-hover" border="5" cellpadding="6" cellspacing="4">',

                    'heading_row_start'   => '<tr >',// Important
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class="heading">',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr class="lookfor" >',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr class="lookfor" >',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

              

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl);
		if($list=="FullList")
			return $this->FullList($year);
		elseif($list=="positive")
			return $this->Positive($year);
		elseif($list=="negative")	
			return $this->Negative($year);
		elseif($list=="neutral")
			return $this->Negative($year);
		elseif($list=="register")
			return $this->Register($year);
		elseif($list=="uncontacted")
			return $this->Uncontacted($year);
		elseif($list=="unsearched")
			return $this->Unsearched($year);
		elseif($list=="notFound")
			return $this->Unsearched($year);
	}

	public function FullList($year){
		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->query("SELECT alumni.* FROM alumni JOIN status  ON alumni.alumid = status.alumid  LEFT JOIN callhistory ON callhistory.alumid = alumni.alumid WHERE status.userid = $userid AND alumni.alumSince = $year GROUP BY alumni.alumid ORDER BY callhistory.nextdate DESC");
		//$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year));
		if($query->num_rows==0){
			return -1;
		}else{
			
			$table = $this->table->generate($query);
			return $table;
		}
	}

	public function Positive($year){
		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->query("SELECT alumni.* FROM alumni JOIN status ON status.alumid = alumni.alumid WHERE status.called = 3 AND alumni.alumSince = $year AND status.userid = $userid");
		//$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year,'called'=>'3'));
		if($query->num_rows==0){
			return -1;
		}else{
			
			$table = $this->table->generate($query);
			return $table;
		}
	}

	public function Negative($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->query("SELECT alumni.* FROM alumni JOIN status ON status.alumid = alumni.alumid WHERE status.called = 2 AND alumni.alumSince = $year AND status.userid = $userid");
		//$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year,'called'=>'2'));
		if($query->num_rows==0){
			return -1;
		}else{
			
			$table = $this->table->generate($query);
			return $table;
		}

	}
	
	public function Neutral($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->query("SELECT alumni.* FROM alumni JOIN status ON status.alumid = alumni.alumid WHERE status.called = 1 AND alumni.alumSince = $year AND status.userid = $userid");
		if($query->num_rows==0){
			return -1;
		}else{
			
			$table = $this->table->generate($query);
			return $table;
		}

	}
	public function Register($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->query("SELECT alumni.* FROM alumni JOIN status ON status.alumid = alumni.alumid WHERE status.register = 1 AND alumni.alumSince = $year AND status.userid = $userid");
		if($query->num_rows==0){
			return -1;
		}else{
			
			$table = $this->table->generate($query);
			return $table;
		}

	}
	public function Uncontacted($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->query("SELECT alumni.* FROM alumni JOIN status ON status.alumid = alumni.alumid WHERE status.called = 0 AND alumni.alumSince = $year AND status.userid = $userid");
		if($query->num_rows==0){
			return -1;
		}else{
			
			$table = $this->table->generate($query);
			return $table;
		}

	}
	public function Unsearched($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->query("SELECT alumni.* FROM alumni JOIN status ON status.alumid = alumni.alumid WHERE status.search = 0 AND alumni.alumSince = $year AND status.userid = $userid");
		if($query->num_rows==0){
			return -1;
		}else{
			
			$table = $this->table->generate($query);
			return $table;
		}

	}
	public function notFound($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->query("SELECT alumni.* FROM alumni JOIN status ON status.alumid = alumni.alumid WHERE status.search = -1 AND alumni.alumSince = $year AND status.userid = $userid");
		if($query->num_rows==0){
			return -1;
		}else{
			
			$table = $this->table->generate();
			return $table;
		}

	}


	public function getPrimaryInfo($id){
	
		
		$query = $this->db->get_where('alumni',array('alumid'=>$id));
		if($query->num_rows()>0){
			$result = $query->row_array();
			$data['name'] = $result['name'];
			$data['hall'] = $result['hall'];
			$data['year'] = $result['alumSince'];
			//$data['department'] = $result['department'];
			$query = $this->db->get_where('callhistory',array('alumid'=>$id));
			if($query->num_rows()>0){
				$data['callhistory'] = $this->table->generate($query);
			
			}
			$query = $this->db->get_where('alumni',array('alumid'=>$id));
			if($query->num_rows()>0){
				$data['profile'] = form_open('member/updateProfile');
				$result = $query->row_array();
				$i = 0;
				
				foreach ($result as $key => $value) {
					if($key!="id"&&$key!="assigned"){
					$data['profile'] .= $key.'   :<input class="form-control"  name="'.$key.'" value="'.$value.'">';
					
				}elseif ($key=="id"){
					$data['profile'] .= $key.'   :<input style=" visibility:hidden" name="'.$key.'" value="'.$value.'">';

				}
				}
				$data['profile'].='<br><input type="button" name="submit" value="Update" class="btn btn-success"></form>';
			}
			$query = $this->db->get_where('status',array('alumid'=>$id));
				if($query->num_rows()>0){
					$data['searchstatus'] = "Current Status: ";
					//$this->table->set_heading(array('id','search status','call status','register status','pay status','userid','year'));
					switch ($query->row_array()['search']) {
						case '0':
							$data['searchstatus'] .= "Yet to be searched";
							break;
						case '1':
							$data['searchstatus'] .= "Found";
							break;
							case '2':
							$data['searchstatus'] .= "Unable to find";
							break;
							case '4':
							$data['searchstatus'] .= "Ready contact";
							break;
						
					}
					$data['searchstatus'] .= '<form name="form3" action="Javascript:updateSearch()">';
					$data['searchstatus'] .= '<input  name="alumid" value="'.$id.'" disabled>';
					$data['searchstatus'] .= '<select name="search" class="form-control"><option value="4">Ready</option><option value="1">Found</option><option value="0">Yet to be Found</option><option value="2">Unable to find</option></select>';
					$data['searchstatus'].='<input type="button" name="submit" value="Update" class="btn btn-success"></form>';

					$data['responsestatus'] = "Current Staus: ";
					switch ($query->row_array()['called']) {
						case '0':
						$data['responsestatus'] .="Not called";
						break;
						case '1':
							$data['responsestatus'] .= "Neutral";
							break;
						case '2':
							$data['responsestatus'] .= "Negative";
							break;
							case '3':
							$data['responsestatus'] .= "Positive";
							break;
							
						
					}
					$data['responsestatus'] .= '<form name="form4" action="Javascript:updateResponse()">';
					$data['responsestatus'] .= '<input  name="alumid" value="'.$id.'" disabled>';

					$data['responsestatus'] .= '<select name="response" class="form-control"><option value="1">Neutral</option><option value="3">Positive</option><option value="2">Negative</option><option value="0">Not Called</option></select>';
					
					$data['responsestatus'].='<input type="button" name="submit" value="Update" class="btn btn-success"></form>';

					$data['paymentstatus'] = "Current Staus: ";

				
					switch ($query->row_array()['pay']) {
						case '0':
						$data['paymentstatus'] .="Not Paid";
						$data['paymentstatus'] .= '<form name="form2" action="Javascript:updatePayment()">';

						$data['paymentstatus'] .= '<select name="payment" class="form-control"><option value="0">Not Paid</option><option value="1">Paid but not verified</option></select>';
						$data['paymentstatus'] .= '<table class="table table-striped table-bordered table-hover">';
						$data['paymentstatus'] .= '<tr><td><input type="text" name="alumid" value="'.$id.'" disabled></td><td><input type="date" name="dateofpayment" class="form-control"></td><td><input type="text" class="form-control" name="referenceNo"></td><td><input type="number" name="paymentAmt" class="form-control"></td></tr>';
						$data['paymentstatus'] .='</table>';
					
						$data['paymentstatus'] .='<input type="button" name="submit" value="Update" class="btn btn-success"></form>';
					

						break;
						case '1':
							$data['paymentstatus'] .= "Paid, Not verified";
							$query = $this->db->get_where('payment',array('alumid'=>$id));
							if($query->num_rows()>0){
								$result = $query->row_array();
								$data['paymentstatus'] .='<table class="table table-striped table-bordered table-hover"><tr>';
								foreach ($result as $key => $value) {
									$data['paymentstatus'] .='<th>'.$key.'</th>';
									# code...
								}
								$data['paymentstatus'] .='</tr><tr>';
								foreach ($result as $key => $value) {
									$data['paymentstatus'] .='<td>'.$value.'</td>';
									# code...
								}
								$data['paymentstatus'] .= '</tr></table></form>';
							}
							break;
						case '2':
							$data['paymentstatus'] .= "Verified";
							break;
							
							
						
					}
					
			}

			
			return $data;
		}
		
	}

	public function search(){
		$this->table->clear();
		$tmpl = array (
                    'table_open'          => '<table class="table table-striped table-bordered table-hover" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr><th></th>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl); 

		$sql = "SELECT * FROM alumni WHERE";
		$count= 0;
		if(isset($_POST['submit'])){
			
			foreach ($_POST as $key => $value) {
				if($key!=$value && $key!="submit"){
					$this->db->escape($key);
					$this->db->escape($value);
					if($count==0)
					$sql .=" $key='$value'";
				 	else
					$sql .=" AND $key='$value'";
					$count++;
					//echo $sql;
				}
			}
					$query = mysql_query($sql);
					if($query && $sql!="SELECT * FROM alumni WHERE" ){
						$num_rows = mysql_num_rows($query);

						while ($row = mysql_fetch_array($query)) {
							foreach ($row as $key1 => $value1) {
								if(is_string($key1))
									$dota[$key1] = $value1;
							}
							$this->table->add_row($dota);
						}
						
	}else{
		$sql = "SELECT * FROM alumni";
		$query = mysql_query($sql);
		$num_rows = mysql_num_rows($query);

		while ($row = mysql_fetch_array($query)) {
			foreach ($row as $key1 => $value1) {
				if(is_string($key1))
					$dota[$key1] = $value1;
			}
			$this->table->add_row($dota);
		}
	}
	$fields  = $this->db->list_fields('alumni');
		if($fields){
			$this->table->set_heading($fields);
		}

		$data['table'] =  $this->table->generate();
		$data['num_rows'] = $num_rows;
		return $data;
	
		}
	}
	public function updateProfile(){
		unset($_POST['submit']);
		$query = $this->db->where('alumid',$this->input->post('alumid'));

		if($this->db->update('alumni',$_POST)){
			$this->db->where('alumid',$_POST['alumid']);
			$this->db->update('status',array('year'=>$_POST['alumSince']));
			return "success";
		}
		else
			return "failed";

	}

	public function updateResponse($alumid,$response){
		
		$query = $this->db->where('alumid',$alumid);
		if($this->db->update('status',array('called'=>$response))){
			$query = $this->db->get_where('status',array('alumid'=>$alumid));
			$result = $query->row_array();
			return "Current Status:".$result['called'];
		}
		else
			return "false";

	}
	public function updateSearch($alumid,$search){
		
		$query = $this->db->where('alumid',$alumid);
		if($this->db->update('status',array('search'=>$search))){
			$query = $this->db->get_where('status',array('alumid'=>$alumid));
			$result = $query->row_array();
			return "Current Status:".$result['search'];
		}
		else
			return "false";

	}
	public function updatePayment($payment,$alumid,$dateofpayment,$referenceNo,$paymentAmt){
		if($payment!=1){
			return "Change the payment status first";
		}
		$query = $this->db->where('alumid',$alumid);
		if($this->db->update('status',array('pay'=>'1'))&& $this->db->insert('payment',array('alumid'=>$alumid,'dateofpayment'=>$dateofpayment,'referenceNo'=>$referenceNo,'paymentAmt'=>$paymentAmt))){
			$query = $this->db->get_where('payment',array('alumid'=>$alumid));
			$userid = $this->getUserId();
			$this->db->insert('notifications',array('alumid'=>$alumid,'userid'=>$userid,'message'=>"Verify payment"));
			return "Current Status: Paid<br>".$this->table->generate($query);
			
		}
		else
			return "There was some error. Please try again.";

	}
	public function addCallDetail($alumid,$date,$time){
		$query = $this->db->get_where('callhistory',array('alumid'=>$alumid));
		$num = $query->num_rows();
		$this->db->insert('callhistory',array('callid'=>($num+1),'alumid'=>$alumid,'date'=>$date,'time'=>$time));
		return $this->nextCallDetails($alumid);
	}
	public function nextCallDetails($alumid){
		$lastRow =array();

		$query = $this->db->get_where('callhistory',array('alumid'=>$alumid));
		foreach ($query->result_array() as $row) {
			$lastRow = $row;
		}
		$callRow = '<form name="form1" action="Javascript:updateCall()"><table class="table table-striped table-bordered table-hover">';
		$callRow .='<tr><td><input type="text" name="alumid" class="form-control" value="'.$lastRow['alumid'].'"disabled></td><td><input type="text" class="form-control" name="callid" value="'.$lastRow['callid'].'" disabled></td><td>'.$lastRow['date'].'</td><td>'.$lastRow['time'].'</td><td><input type="text" id="remarks" class="form-control" name="remarks"></td><td><input type="date" class="form-control" name="nextdate"></td><td><input type="text" name="nexttime" class="form-control"></td>';
		$callRow .='</tr></table><input type="button" name="submit" id="button1" class="btn btn-success" value="Update"></form>';
		return $callRow;
	}
	public function updateCall($remarks,$nextdate,$nexttime,$callid,$alumid){
		$tmpl = array (
                    'table_open'          => '<table class="table table-striped table-bordered table-hover" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl); 
	
		$this->db->where(array('alumid'=>$alumid,'callid'=>$callid));
		$this->db->update('callhistory',array('remarks'=>$remarks,'nextdate'=>$nextdate,'nexttime'=>$nexttime));
		$query = $this->db->get_where('callhistory',array('alumid'=>$alumid));
		return $this->table->generate($query);
	}

}








?>