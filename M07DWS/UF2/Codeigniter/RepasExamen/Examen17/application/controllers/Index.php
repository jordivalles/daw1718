<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('session');	
	}

	public function index(){
    
		$this->load->view('Index');

	}
	
    public function checkLogin(){
		
		////carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		
		//mail
        $data['mail'] = $this->input->post('fmail');
        
        //contrasenya
		$data['pw'] = $this->input->post('fpw');
		
        $data['check'] = $this->ModelConsultes->checkUsuari($data);
		
		if($data['check']==true && ($data['mail']=='admin' && $data['pw']=='admin')){
			//$this->load->view('Admin');
			redirect('Admin/index', 'refresh');
		}else if($data['check']==true){
			//$this->load->view('Menu');
			//agafem l'id de l'artista actual
			$data['id'] = $this->ModelConsultes->getIdArtista($data);
			$this->session->codiArtista = $data['id'][0]["id"];
			redirect('Menu/index', 'refresh');
		}else{
			$data['error'] = "Credencials incorrectes<br/>";
			$this->load->view('Index',$data);
		}
		
    }
    
    public function loadRegistre(){
    
        $this->load->view('Registre');

    }
    
    public function checkRegistre(){
        
        //dni
        $data['dni'] = $this->input->post('fdni');
        
        //nom
		$data['nom'] = $this->input->post('fnom');
        
		//nom artístic
		$data['num'] = $this->input->post('fnum');
		
		//carreguem el model per fer les consultes
        $this->load->model('ModelConsultes');
			
		$data['check'] = $this->ModelConsultes->checkRepetit($data);
		
        if($data['dni']=='' || $data['nom']=='' || $data['num']==''){
            $data['error'] = "Les dades no poden estar buides.<br/>";
			$data['correcte'] = false;
        }else if($data['check']==true){
			$data['error'] = "Error. Ja existeix un representant amb aquest dni.<br/>";
			$data['correcte'] = false;
		}else{
			
			$data['correcte'] = true;
			
			//var_dump($this->input->post('enviat'));
			
			if($this->input->post('enviat')!=NULL){ //controlar form
				for($data['x']=0;$data['x']<$data['num'];$data['x']++){
					$data['membre'] = $this->input->post('fmembre'."".($data['x']+1));
					$data['datanaix'] = $this->input->post('fdate'."".($data['x']+1));
					echo $data['membre'] ." ".$data['datanaix'];
				}
				$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
$fecha_entrada = strtotime("19-11-2028 21:00:00");
	
if($fecha_actual > $fecha_entrada)
	{
	echo "La fecha actual es mayor a la comparada.";
	}else
		{
		echo "La fecha comparada es igual o menor";
		}

			}
            //$this->ModelConsultes->registrar($data);
			
            /*$data['exit'] = "El teu registre s'ha completat satisfactòriament. Ja pots entrar desde la pàgina principal.";
			$data['mail']='';
			$data['pw1']='';
			$data['pw2']='';
			$data['nom']='';*/
        }
        
        $this->load->view('Registre',$data);
        
    }
	
}




