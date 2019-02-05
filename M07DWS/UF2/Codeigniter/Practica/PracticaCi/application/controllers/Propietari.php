<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
class Propietari extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}

	public function index()
	{    
		$data['id'] = $this->session->codiPropietari;
		
		//cursos del propietari
		$data['cursos'] = $this->ModelConsultes->getCursosPropietari($data);
		
		$this->load->view('Propietari',$data);
	}
	
	public function modificarCurs(){
		
		//id del curs
		$data['idcurs'] = $this->uri->segment('3');
		
        $data['dades'] = $this->ModelConsultes->getDadesCurs($data);
        
        //var_dump($data['dades']);
        
        $this->load->view('ModificarCurs',$data);
        
		//redirect('Menu/index', 'refresh');
	}
	
    
    public function updateCurs(){
        
        //guardem id
        $data['cid'] = $this->input->post('fid');
        
		//guardem el titol
		$data['titol'] = $this->input->post('ftitol');
        
		//guardem data inici
		$data['datainici'] = $this->input->post('fdatainici');
		
		//guardem hores totals
		$data['htotals'] = $this->input->post('fhtotals');
		
		//guardem hores setmanals
		$data['hsetmanals'] = $this->input->post('fhsetmanals');
		
		//modifiquem el curs
		$this->ModelConsultes->actualitzarCurs($data);
		
		$data['exit'] = "Els canvis s'han efectuat correctament.";
		
		//un cop modificat tornem al menú del propietari
		$data['id'] = $this->session->codiPropietari;
		
        //cursos del propietari
		$data['cursos'] = $this->ModelConsultes->getCursosPropietari($data);
		
		$this->load->view('Propietari',$data);
	}
    
	public function generarCalendari($id, $year = null, $month = null){
		
		//id del curs
		//$data['idcurs'] = $this->uri->segment('3');
		//$data['idcurs'] = $id;
        
        $data['calendari'] = $this->ModelConsultes->generar($id,$year,$month);
        
        
        
        //tornem al menú del propietari
		$data['id'] = $this->session->codiPropietari;
        //cursos del propietari
		$data['cursos'] = $this->ModelConsultes->getCursosPropietari($data);
        
		$this->load->view('Propietari',$data);
		/*
		$prefs = array(
			'local_time'   => 'time()',
			'start_day'    => 'monday',
			'month_type'   => 'long',
			'day_type'     => 'short',
			'show_next_prev' => true,
			'next_prev_url'   => '',
			'show_other_days' => false
		);

		$this->load->library('calendar', $prefs);

		$data = array(
			3  => 'http://example.com/news/article/2006/06/03/',
			7  => 'http://example.com/news/article/2006/06/07/',
			13 => 'http://example.com/news/article/2006/06/13/',
			26 => 'http://example.com/news/article/2006/06/26/'
		);

		echo $this->calendar->generate(2018, 12, $data);
		*/
		
        /*
		$prefs['template'] = '

			{table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

			{heading_row_start}<tr>{/heading_row_start}

			{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

			{heading_row_end}</tr>{/heading_row_end}

			{week_row_start}<tr>{/week_row_start}
			{week_day_cell}<td>{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}

			{cal_row_start}<tr>{/cal_row_start}
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
        */
        
        
	}
	
	public function eliminarReserva(){
		//id
		$data['id'] = $this->uri->segment('3');
		$data['data'] = $this->uri->segment('4');
		//echo $data['id']." ".$data['data'];
		
		$this->ModelConsultes->deleteReserva($data);
		$this->ModelConsultes->habilitarData($data);
		redirect('Menu/index', 'refresh');
	}
	
}




