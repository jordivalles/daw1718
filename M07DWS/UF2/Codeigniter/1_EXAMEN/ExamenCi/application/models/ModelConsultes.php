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
	
	public function getIdUsuari($data){
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
	
    public function getPreguntes(){
		$this->db->select('p.*,c.nom');
		$this->db->from('pregunta p');
		$this->db->join('categoria c', 'c.id = p.categoria');
		$this->db->order_by("id", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getCategories(){
		$this->db->select('*');
		$this->db->from('categoria');
		$this->db->order_by("id", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function crearPregunta($data){
		$this->db->set('text', $data['text']);
		$this->db->set('categoria', $data['categoria']);
		$this->db->set('estat', $data['estat']);
		$this->db->insert('pregunta');
	}
	
    public function getDadesPregunta($data){
		$condition = "id =" . "'" . $data['idPregunta'] . "'";
		$this->db->select('*');
		$this->db->from('pregunta');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}
    
    public function actualitzarPregunta($data){
		$condition = "id ='" . $data['id'] . "'";
		$this->db->set('text', $data['text']);
		$this->db->set('categoria', $data['categoria']);
		$this->db->where($condition);
		$this->db->update('pregunta');
	}
	
    public function canviarEstat($data){
		$condition = "id ='" . $data['idPregunta'] . "'";
		$this->db->set('estat', $data['nouEstat']);
		$this->db->where($condition);
		$this->db->update('pregunta');
	}
    
	/********Menú Usuaris***************/
    
    public function getPreguntesSiRespostes($data){
        $condition = "up.idUsuari ='" . $data['idUsuari'] . "'";
        $this->db->select('p.text,up.resposta');
		$this->db->from('pregunta p');
		$this->db->join('usuaripregunta up', 'p.id = up.idPregunta');
        $this->db->where($condition);
		$this->db->order_by("id", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}
    
    public function getPreguntesNoRespostes($data){
        $idusuari = $data['idUsuari'];
        $query1 = $this->db->query("SELECT id,text FROM pregunta WHERE estat = 1 AND id NOT IN (SELECT idPregunta FROM usuariPregunta WHERE idUsuari = $idusuari)");
        $query1_result = $query1->result_array();
        return $query1_result;
	}
    
    public function respondrePregunta($data){
		$this->db->set('idUsuari', $data['idUsuari']);
		$this->db->set('idPregunta', $data['idPregunta']);
		$this->db->set('resposta', $data['resposta']);
		$this->db->insert('usuariPregunta');
	}
    
    public function getQtatRespostes($data){
        $condition = "id ='" . $data['idPregunta'] . "'";
		$this->db->select('respostes');
		$this->db->from('pregunta');
        $this->db->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}
    
    public function updateQtatRespostes($data){
		$condition = "id ='" . $data['idPregunta'] . "'";
		$this->db->set('respostes', $data['qtat']);
		$this->db->where($condition);
		$this->db->update('pregunta');
	}
}

/* End of file ModelConsultes.php */
/* Location: ./application/models/ModelConsultes.php */