<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
        /* AUTOLOAD
		$this->load->library('session');
		$this->load->helper('url');*/	
	}

	public function index(){
    
		$this->load->view('Index');

	}
	
    public function checkLogin(){
		
		////NO CAL PERQUÈ JA ES CARREGA AL AUTOLOAD
		//$this->load->model('ModelConsultes');
		
		//mail
        $data['mail'] = $this->input->post('fmail');
        
        //contrasenya
		$data['pw'] = $this->input->post('fpw');
		
        //comprovem que l'usuari estigui registrat
        $data['check'] = $this->ModelConsultes->checkUsuari($data);
		
        //primer cas: si és admin
		if($data['check']==true && ($data['mail']=='admin' && $data['pw']=='admin')){
			//$this->load->view('Admin');
			redirect('Admin/index', 'refresh');
		}else if($data['check']==true){ //segon cas: usuari
			//agafem l'id del usuari actual
			$data['id'] = $this->ModelConsultes->getIdUsuari($data);
			$this->session->codiUsuari = $data['id'][0]["id"];
			redirect('Usuari/index', 'refresh');
		}else{
			$data['error'] = "Credencials incorrectes";
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
        
        //comprovem que l'usuari no existeixi
		$data['check'] = $this->ModelConsultes->checkRepetit($data);
		
        if($data['mail']=='' || $data['pw1']=='' || $data['pw2']=='' || $data['nom']==''){
            
            $data['error'] = "Les dades no poden estar buides.<br/>";
            
        }else if($data['pw1']!=$data['pw2']){
            
            $data['error'] = "Les dues contrasenyes han de coincidir.<br/>";
            
        }else if($data['check']==true){
            
			$data['error'] = "Ja existeix un usuari amb aquest mail!<br/>";
            
		}else{
            //registrem
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




