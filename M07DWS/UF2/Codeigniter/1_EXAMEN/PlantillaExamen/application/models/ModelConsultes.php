<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelConsultes extends CI_Model{
    
	/***********Login*************/
	
	public function checkUsuari($data){
		$condition = "mail =" . "'" . $data['mail'] . "' AND " . "password =" . "'" . $data['pw'] . "'";
		$this->db->select('*');
		$this->db->from('usuari');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function getIdPropietari($data){
		$condition = "mail =" . "'" . $data['mail'] . "' AND " . "password =" . "'" . $data['pw'] . "'";
		$this->db->select('id');
		$this->db->from('usuari');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/************Registre**********/
	public function checkRepetit($data){
		$condition = "mail =" . "'" . $data['mail'] . "'";
		$this->db->select('*');
		$this->db->from('usuari');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function registrar($data){
		$this->db->set('mail', $data['mail']);
		$this->db->set('nom', $data['nom']);
		$this->db->set('password', $data['pw1']);
		$this->db->insert('usuari');
	}
	
	/*******Menú Admin*************/
	
    public function getCursos(){
		$this->db->select('c.*,u.nom');
		$this->db->from('curs c');
		$this->db->join('usuari u', 'u.id = c.propietari');
		$this->db->order_by("id", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getPropietaris(){
		$condition = "mail != 'admin'";
		$this->db->select('id,nom');
		$this->db->from('usuari');
		$this->db->where($condition);
		$this->db->order_by("mail", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function crearCurs($data){
		$this->db->set('id', $data['id']);
		$this->db->set('propietari', $data['propietari']);
		$this->db->insert('curs');
	}
	
	public function checkCurs($data){
		$condition = "id =" . "'" . $data['id'] . "'";
		$this->db->select('*');
		$this->db->from('curs');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
    public function getMailPropietari($data){
		$condition = "id =" . "'" . $data['propietari'] . "'";
		$this->db->select('mail');
		$this->db->from('usuari');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
        return $query->result_array(); 
	}
	
	/********Menú Propietaris***************/
	
	public function getCursosPropietari($data){
		$condition = "propietari =" . "'" . $data['id'] . "'";
		$this->db->select('*');
		$this->db->from('curs');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}
	
    public function getDadesCurs($data){
		$condition = "id =" . "'" . $data['idcurs'] . "'";
		$this->db->select('*');
		$this->db->from('curs');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}
    
	public function actualitzarCurs($data){
		$condition = "id ='" . $data['cid'] . "'";
		$this->db->set('titol', $data['titol']);
		$this->db->set('datainici', $data['datainici']);
		$this->db->set('htotals', $data['htotals']);
		$this->db->set('hsetmanals', $data['hsetmanals']);
		$this->db->where($condition);
		$this->db->update('curs');
	}
	
	public function deleteDataDisponible($data){
		$this->db->where('dia', $data['data']);
		$this->db->delete('dates');
	}
	
	public function deleteReserva($data){
		$this->db->where('id', $data['id']);
		$this->db->delete('calendari');
	}
}

/* End of file ModelConsultes.php */
/* Location: ./application/models/ModelConsultes.php */