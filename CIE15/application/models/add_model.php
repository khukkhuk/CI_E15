<?php
class Add_model extends CI_model {

	public function __construct(){
		parent::__construct();

	}
	public function getRows($table){
		$rs=$this->db->get($table);
	return $rs->num_rows();
	}
}
?>