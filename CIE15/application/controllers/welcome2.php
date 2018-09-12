<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
function __construct(){
		parent::__construct();
		$this->load->model('Add_model');
		$this->load->helper('form');
		$this->load->helper('url');

	}


	public function index()
	{
		//$this->load->view('welcome_message');
	echo "sanphet";
}
	public function addform(){
		$this->load->view('addview');
	}
	public function add(){
		$data['title']= "เพิ่มข้อมูล ";
		$data['level']= "E1-5";
		$data['num']=$this->Add_model->getRows("user");
	 	$this->load->view('addview',$data);
	 	if($this->input->post('btnsave')!=null){
		$data = array(
		'id' => '',
  		'user' => $this->input->post("user") ,
   		'pass' => $this->input->post("pass") ,
   		'status' => $this->input->post("status") );
   		$this->db->insert('user', $data); 
   		redirect("welcome/show","refresh");
   		exit();
	}

}
			
	public function show(){
		$sql = "select * from user";
		$rs = $this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view('showview',$data);
			}

	public function del($id){
		echo "id=".$id;
		$this->db->delete('user', array('id'=>$id));
		redirect("welcome/show","refresh");
		exit();
	}




	public function edit($id){
		echo "id=".$id;
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
  		'user' => $this->input->post("user") ,
   		'pass' => $this->input->post("pass") ,
   		'status' => $this->input->post("status") );
   		$this->db->update('user', $data, array('id' => $id));
   		redirect("welcome/show","refresh");
   		exit();
	}
}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */