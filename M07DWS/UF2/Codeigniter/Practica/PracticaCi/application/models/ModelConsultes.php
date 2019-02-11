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
    
    var $config;
    
    public function generar($id,$year,$month,$dinici){
		
		/*
        $this->config = array(
			'start_day'    => 'monday',
			'month_type'   => 'long',
			'day_type'     => 'long',
			'show_next_prev' => true,
			'next_prev_url'   => base_url() . 'index.php/Propietari/generarCalendari/'. $id
		);
        
        $this->config['template'] = '
            {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

			{heading_row_start}<tr>{/heading_row_start}

			{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt; Anterior</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}" class="titol">{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th><a href="{next_url}">Següent &gt;&gt;</a></th>{/heading_next_cell}

			{heading_row_end}</tr>{/heading_row_end}

			{week_row_start}<tr>{/week_row_start}
			{week_day_cell}<td class="dies">{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}

			{cal_row_start}<tr class="days">{/cal_row_start}
			{cal_cell_start}<td>{/cal_cell_start}
			{cal_cell_start_today}<td>{/cal_cell_start_today}
			{cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

			{cal_cell_content}
                <div class="day_num">{day}</div>
                <div class="content">{content}</div>
            {/cal_cell_content}
			{cal_cell_content_today}
                <div class="day_num highlight">{day}</div>
                <div class="content">{content}</div>
            {/cal_cell_content_today}

			{cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

			{cal_cell_blank}&nbsp;{/cal_cell_blank}

			{cal_cell_other}{day}{/cal_cel_other}

			{cal_cell_end}</td>{/cal_cell_end}
			{cal_cell_end_today}</td>{/cal_cell_end_today}
			{cal_cell_end_other}</td>{/cal_cell_end_other}
			{cal_row_end}</tr>{/cal_row_end}

			{table_close}</table>{/table_close}
        ';
        
		$this->load->library('calendar', $this->config);
        
        
        $cal_data = array(
            15 => 'foo',
            17 => 'test'
        );
        
		if($year==NULL && $month==NULL){
			$date = DateTime::createFromFormat("Y-m-d", $dinici);
			$any = $date->format("Y");
			$mes = $date->format("n");
			return $this->calendar->generate($any,$mes, $cal_data);
		}else{
			return $this->calendar->generate($year,$month, $cal_data);
		}
		*/
		
        
    }
}

/* End of file ModelConsultes.php */
/* Location: ./application/models/ModelConsultes.php */