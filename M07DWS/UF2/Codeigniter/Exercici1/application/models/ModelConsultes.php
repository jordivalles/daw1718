<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelConsultes extends CI_Model{
	
	public function getAllDpts(){
		$query = $this->db->get('departaments');
        return $query->result_array();
	}
    
    public function getAllDpts2(){
		$this->db->select('*');
		$this->db->from('departaments');
		$query = $this->db->get();
		return $query->result_array();
	}
	
}

/* End of file ModelConsultes.php */
/* Location: ./application/models/ModelConsultes.php */