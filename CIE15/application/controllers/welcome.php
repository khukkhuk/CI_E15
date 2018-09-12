<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('sql_model');
		$this->load->model('Add_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');

	}

	public function index()
	{
		$this->load->view('login');
}		
	//////////////LOGIN/////////////////
	public function chk_login()
	{	
		$username  = $this->input->post('username');
		$password  = $this->input->post('password');

	$numr = $this->db->query("SELECT * from user where username='$username' && password='$password'");
		$chknum = $numr->num_rows();
		if($chknum==1){ 

			foreach ($numr->result() as $row)
			{
			    $status=$row->status;
			    $user_fname =$row->user_fname;
				$user_id =$row->id;

			$data = array(
				'user_id'=>$user_id,
				'user_fname'=>$user_fname
						);
			$this->session->set_userdata($data);

			if($status=="admin"){
			redirect("welcome/admin_index","refresh");
		}///admin
			if($status=="user"){
			redirect("welcome/user_index","refresh");
		}///user
		
		}
	}////user&pass OK
		else{
			$this->load->view('LoginFail');
			//echo "no";
			//echo "SELECT * from user where username='$username' && password='$password'";
		}
		//////////////////////////


	/////////////INDEX-ADMIN////////////////
	}
	public function admin_index()
	{
		$this->load->view('admin_index');
	}

	/////////////////ADMIN-USER///////////////////////

	public function user_show(){
		$query = $this->db->query("SELECT * FROM user WHERE status='user'");
		$data['show'] = $query->result_array();

		$this->load->view('user_show',$data);
}

	

///////////////////////////EDIT USER
	public function user_editshow($id){
		$sql ="SELECT * FROM user WHERE id='$id'";
		$show = $this->db->query($sql);
		if($show->num_rows()==0){
			$data['show']=array();
			}else {
				$data['show'] = $show->row_array();
			}
		
		$this->load->view('editview',$data);
		}
	public function user_edit(	){		
		if($this->input->post('submit')!=null){
		$id = $this->input->post("id");
		$data = array(
  		'username' => $this->input->post("username") ,
   		'password' => $this->input->post("password") ,
   		'user_fname' => $this->input->post("user_fname") ,
   		'user_lname' => $this->input->post("user_lname") ,
   		'user_depart' => $this->input->post("user_depart") ,
   		'user_level' => $this->input->post("user_level") );
   		$this->db->update('user', $data, array('id' => $id));
   		redirect("welcome/user_index","refresh");
   		exit();
			}
	}
///////////////////////////EDIT ADMIN
	public function admin_editshow($id){
		$sql ="SELECT * FROM user WHERE id='$id'";
		$show = $this->db->query($sql);
		if($show->num_rows()==0){
			$data['show']=array();
			}else {
				$data['show'] = $show->row_array();
			}
		
		$this->load->view('editview_admin',$data);
		}
	public function admin_edit(	){		
		if($this->input->post('submit')!=null){
		$id = $this->input->post("id");
		$data = array(
  		'username' => $this->input->post("username") ,
   		'password' => $this->input->post("password") ,
   		'user_fname' => $this->input->post("user_fname") ,
   		'user_lname' => $this->input->post("user_lname") ,
   		'user_depart' => $this->input->post("user_depart") ,
   		'user_level' => $this->input->post("user_level") );
   		$this->db->update('user', $data, array('id' => $id));
   		redirect("welcome/user_show","refresh");
   		exit();
			}
	}


	public function user_del($id){
		echo "id=".$id;
		$this->db->delete('user', array('id'=>$id));
		redirect("welcome/user_show","refresh");
		exit();
	}

	public function user_addview(){
		$this->load->view('user_addview');
	}
	public function user_add(){
		$data['num']=$this->Add_model->getRows("user");
	 	$this->load->view('user_addview',$data);
	 
	 	if($this->input->post('submit')!=null){
		$data = array(
		'id' => '',
  		'username' => $this->input->post("username"),
  		'password' => $this->input->post("password"),
  		'user_fname' => $this->input->post("user_fname"),
  		'user_lname' => $this->input->post("user_lname"),
  		'user_depart' => $this->input->post("user_depart"),
  		'user_level' => $this->input->post("user_level"),
  		'status' => $this->input->post("status") );
   		$this->db->insert('user', $data); 
   		redirect("welcome/user_show","refresh");
   		exit();
		}
	}
	
	/////////////////ADMIN-ACTIVITY///////////////////////
	public function act_show(){
		$sql ="SELECT * FROM activity where status='ดำเนินการ' ";
		$show = $this->db->query($sql);
		$data['show'] = $show->result_array();
		$this->load->view('act_show',$data);
		
	}
	public function act_show_complete(){
		$sql ="SELECT * FROM activity where status='สำเร็จ' ";
		$show = $this->db->query($sql);
		$data['show'] = $show->result_array();
		$this->load->view('act_show_complete',$data);
		
	}
	public function act_editshow($id){
		$sql ="SELECT * FROM activity WHERE act_id='$id'";
		$show = $this->db->query($sql);
		if($show->num_rows()==0){
			$data['show']=array();
			}else {
				$data['show'] = $show->row_array();
			}
		
		$this->load->view('act_editview',$data);
		}
	public function act_edit(	){		
		if($this->input->post('submit')!=null){
		$act_id = $this->input->post("act_id");
		$data = array(
  		'act_name' => $this->input->post("act_name") ,
   		'act_staff' => $this->input->post("act_staff") ,
   		'act_want' => $this->input->post("act_want") ,
   		'act_have' => $this->input->post("act_have") ,
   		'date' => $this->input->post("date") ,
   		'act_detail' => $this->input->post("act_detail") );
   		$this->db->update('activity', $data, array('act_id' => $act_id));
   		redirect("welcome/act_show","refresh");
   		exit();
			}
	}


	public function act_del($act_id){
		echo "id=".$act_id;
		$this->db->delete('activity', array('act_id'=>$act_id));
		redirect("welcome/act_show","refresh");
		exit();
	}

	public function act_addview(){
		$this->load->view('act_addview');
	}
	public function act_add(){
		$data['act']=$this->Add_model->getRows("activity");
	 	$this->load->view('act_addview',$data);
	 
	 	if($this->input->post('submit')!=null){
		$data = array(
		'act_id' => '',
  		'act_name' => $this->input->post("act_name") ,
  		'act_staff' => $this->input->post("act_staff") ,
  		'act_want' => $this->input->post("act_want") ,
  		'date' => $this->input->post("date") ,
   		'act_detail' => $this->input->post("act_detail"),
  		'status' => $this->input->post("status")  );
   		$this->db->insert('activity', $data); 
   		redirect("welcome/act_show","refresh");
   		exit();
		}
	}
	/////////////////////ADMIN-REPORT//////////////
	public function act_report($id){
	
    	$sql = "SELECT * FROM report as r INNER JOIN user as u ON(r.user_id=u.id)INNER JOIN activity as a ON (r.act_id=a.act_id) WHERE r.act_id='$id' ";
		$show = $this->db->query($sql);
		$data['show'] = $show->result_array();
	$this->load->view('act_report',$data);
	}
	///////////////////INDEX-USER///////////
	public function user_index(){
		$id=$this->session->userdata('user_id');
		//$sql ="SELECT * FROM activity as a INNER JOIN report as r ON (a.act_id=r.act_id) where r.user_id!='$id' AND a.status='ดำเนินการ' ";
		//$sql ="SELECT * FROM activity as a INNER JOIN report as r ON(a.act_id=r.act_id) WHERE r.user_id!='$id' AND a.status='ดำเนินการ'";

		$sql ="SELECT * FROM activity WHERE status='ดำเนินการ'";
		$show = $this->db->query($sql);
		$data['show'] = $show->result_array();
		$this->load->view('user_index',$data);


			$sql3 = "SELECT * FROM report as r INNER JOIN activity as a ON (r.act_id=a.act_id) WHERE user_id = '$id'";
			$show3 = $this->db->query($sql3);

			if($show3->num_rows()==2){
			echo"<script language=\"JavaScript\">";
			echo"alert('กิจกรรมของคุณครบแล้ว')";
			echo"</script>";

			}
		}
	public function user_detail_act($id){

		$sql ="SELECT * FROM activity WHERE act_id='$id'";
		$show = $this->db->query($sql);
		if($show->num_rows()==0){
			$data['show']=array();
			}else {
				$data['show'] = $show->row_array();
			}
		

		$this->load->view('user_detail_act',$data);
	}

	public function user_confirm_act(){
		$act_id = $this->input->post("act_id");
		$id=$this->session->userdata('user_id');
		$data['num']=$this->Add_model->getRows("report");
	 	//$this->load->view('user_detail_act',$data);
	 	
		
	 	if($this->input->post('submit')!=null){
	 	$sql = "SELECT * FROM activity WHERE act_id = '$act_id'";
	 	$show =$this->db->query($sql);
	 	$data = $show->result();
		$acthave=$data[0]->act_have;
		$actwant=$data[0]->act_want;
		$sum = $actwant - $acthave;
		//echo $sum;
		$sqlChk ="SELECT * FROM report WHERE user_id ='$id' && act_id ='$act_id'";
		$qryChk = $this->db->query($sqlChk);
		if($qryChk->num_rows()==0){
			$user_double = 0;
		}
			else{
		$user_double = 1;
			}
			//echo "user_double= ".$user_double;

			if($sum<1){
				//echo "น้อยกว่า1";
			}
		/////////////////////////////////
		$sqlChk ="SELECT * FROM report WHERE user_id ='$id'";
		$qryChk = $this->db->query($sqlChk);
		$count_act=0;
		if($qryChk->num_rows()==2){
			$count_act = 2;
		}	


		/////////////////เช็คค่าว่าสามารถลงทะเบียนกิจกรรมได้อยู่
		if($user_double==1 or $sum<1 or $count_act ==2){
			$this->load->view('user_noSuc_act');//redirectไปหน้าแจ้ง error
			}
		else
		{
		//echo "<br>".$sum."&&".$user_double."<br>";

		
		
	 	$act_id = $this->input->post("act_id");
	 	$sql1 = "SELECT * FROM activity WHERE act_id='$act_id'";
	 	$show1 = $this->db->query($sql1);
		$data1= $show1->result();
		$data= $show1->result();
		//echo var_dump($data);
		$acthave=$data[0]->act_have;
		$acthave++;
		//echo "After-acthave=".$acthave;
		//echo "actid =".$act_id;
		//echo "id=".$id;

		$sqlUp_1 ="UPDATE activity SET act_have = '$acthave' Where act_id = '$act_id'";
		$chkUp_1=$this->db->query($sqlUp_1);
		$sqlUp_2 = "INSERT INTO report (user_id, act_id)
VALUES ('$id', '$act_id')";
		$chkUp_2 =$this->db->query($sqlUp_2);
   		redirect("welcome/show_useract","refresh");
   				}// else
	 	}// btn
		}// function


	public function show_useract(){
		$id=$this->session->userdata('user_id');
		//$sql = "SELECT * FROM report as r INNER JOIN user as u ON(r.user_id=u.id)INNER JOIN activity as a ON (r.act_id=a.act_id) WHERE r.user_id='$id' ";
		$sql = "SELECT * FROM report as r INNER JOIN activity as a ON (r.act_id=a.act_id) WHERE user_id = '$id'";
			$show = $this->db->query($sql);
			$data['show'] = $show->result_array();
		$this->load->view('show_useract',$data);
	}

}////Controller

	 	//ดึงค่า act_have ออกมา เพื่อที่จะทำ +1 ของค่าที่มีอยู่ 
	 	/*$show = $this->db->query($sql1);
	 	if($show->num_rows()==0){
			$data['show']=array();
			}else {
				$data['show'] = $show->row_array();
			}
	 	
		$data = array(
		'report_id' => '',
  		'user_id' => $this->input->post("user_id") ,
  		'act_id' => $this->input->post("act_id") );
   		$this->db->insert('report', $data); 
   		redirect("welcome/user_index","refresh");
   		exit();
		*/
	
	/*
	public function show(){
		$sql="SELECT * FROM user";
		$rs= $this->db->query($sql);
		$data['rs']= $rs->result_array();
		$this->load->view('showview',$data);

	}

	public function addform(){
		$this->load->view('addview');
	}
	public function add(){
		$data['num']=$this->Add_model->getRows("user");
	 	$this->load->view('addview',$data);
	 	if($this->input->post('btnsave')!=null){
		$data = array(
		'id' => '',
  		'name' => $this->input->post("name") ,
  		'email' => $this->input->post("email") ,
  		'phone' => $this->input->post("phone") ,
   		'message' => $this->input->post("message") );
   		$this->db->insert('user', $data); 
   		redirect("welcome/show","refresh");
   		exit();
		}
	}

	public function del($id){
		echo "id=".$id;
		$this->db->delete('user', array('id'=>$id));
		redirect("welcome/show","refresh");
		exit();
	}
public function edit($id){
		$sql ="SELECT * FROM user WHERE id='$id'";
		$rs = $this->db->query($sql);
		if($rs->num_rows()==0){
			$data['rs']=array();
			}else {
				$data['rs'] = $rs->row_array();
			}
		
		$this->load->view('editview',$data);
		}
	

		

	public function edit2(	){
		if($this->input->post('btnsave')!=null){
		$id = $this->input->post("id");
		$data = array(
  		'name' => $this->input->post("name") ,
   		'email' => $this->input->post("email") ,
   		'phone' => $this->input->post("phone") ,
   		'message' => $this->input->post("message") );
   		$this->db->update('user', $data, array('id' => $id));
   		redirect("welcome/show","refresh");
   		exit();
	}
}
	public function sess(){
			$data = array(
				"user_id"=>"1234",
				"username"=>"admin",
				"password"=>"123456"

			);
			$this->session->set_userdata($data);
			$this->load->view('view1',$data);
			echo $this->session->userdata('user_id');
			echo $this->session->userdata('username');
			echo $this->session->userdata('password');



		/*$data = $this->session->set_userdata("user",'khuk');
		echo $this->session->userdata["user"];
		echo $data;
	}
*/




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */