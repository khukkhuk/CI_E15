<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		echo "url=".base_url();
		echo "<br>";
		$this->load->view('main_view');
	echo "sanphet";
}
	
	public function show(){
		echo "showview";
		$this->load->view('showview');
	}

	public function add(){
	$data=array(	'id'=> $this->input->get('id'),
	
	);
	//$this->db->

}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */