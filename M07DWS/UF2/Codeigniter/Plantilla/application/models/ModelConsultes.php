<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelConsultes extends CI_Model{
    
	/***********Login*************/
	
	public function checkUsuari($data){
		$condition = "mail =" . "'" . $data['mail'] . "' AND " . "password =" . "'" . $data['pw'] . "'";
		$this->db->select('*');
		$this->db->from('artistes');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function getIdArtista($data){
		$condition = "mail =" . "'" . $data['mail'] . "' AND " . "password =" . "'" . $data['pw'] . "'";
		$this->db->select('id');
		$this->db->from('artistes');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/************Registre**********/
	public function checkRepetit($data){
		$condition = "mail =" . "'" . $data['mail'] . "'";
		$this->db->select('*');
		$this->db->from('artistes');
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
		$this->db->set('password', $data['pw1']);
		$this->db->set('nomArtistic', $data['nom']);
		$this->db->insert('artistes');
	}
	
	
	/**********Calendari públic********/
    public function getReserves(){
		$this->db->select('c.*,a.nomArtistic');
		$this->db->from('calendari c');
		$this->db->join('artistes a', 'a.id = c.artista');
		$this->db->order_by("dia", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/*******Menú Admin*************/
	
    public function getDatesDisponibles(){
		$this->db->select('*');
		$this->db->from('dates');
		$this->db->order_by("dia", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function habilitarData($data){
		$this->db->set('dia', $data['data']);
		$this->db->insert('dates');
	}
	
	public function checkData($data){
		$condition = "dia =" . "'" . $data['data'] . "'";
		$this->db->select('*');
		$this->db->from('dates');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	
	/********Menú Artistes***************/
	
	public function getReservesArtista($data){
		$condition = "artista =" . "'" . $data['id'] . "'";
		$this->db->select('*');
		$this->db->from('calendari');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function reservar($data){
		$this->db->set('dia', $data['data']);
		$this->db->set('hinici', $data['hora']);
		$this->db->set('durada', $data['durada']);
		$this->db->set('artista', $data['id']);
		$this->db->insert('calendari');
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