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
        
        //mail
        $data['mail'] = $this->input->post('fmail');
        
        //contrasenya 1
		$data['pw1'] = $this->input->post('fpw1');
        
        //contrasenya 2
		$data['pw2'] = $this->input->post('fpw2');
        
		//nom
		$data['nom'] = $this->input->post('fnom');
		
		//carreguem el model per fer les consultes
        $this->load->model('ModelConsultes');
			
		$data['check'] = $this->ModelConsultes->checkRepetit($data);
		
        if($data['mail']=='' || $data['pw1']=='' || $data['pw2']=='' || $data['nom']==''){
            $data['error'] = "Les dades no poden estar buides.<br/>";
        }else if($data['pw1']!=$data['pw2']){
            $data['error'] = "Les dues contrasenyes han de coincidir.<br/>";
        }else if($data['check']==true){
			$data['error'] = "Ja existeix un usuari amb aquest mail!<br/>";
		}else{
            $this->ModelConsultes->registrar($data);
            $data['exit'] = "El teu registre s'ha completat satisfactòriament. Ja pots entrar desde la pàgina principal.";
			$data['mail']='';
			$data['pw1']='';
			$data['pw2']='';
			$data['nom']='';
        }
        
        $this->load->view('Registre',$data);
        
    }
	
}




