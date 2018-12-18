<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('session');		
	}

	public function index()
	{    
		//carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		
		//cursos disponibles
		$data['cursos'] = $this->ModelConsultes->getCursos();
		
		//usuaris (propietaris)
		$data['propietaris'] = $this->ModelConsultes->getPropietaris();
		
		$this->load->view('Admin',$data);
	}
	
	public function crearCurs(){
		
        
		//carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		
		//guardem la data
		$data['id'] = $this->input->post('fid');
		$data['propietari'] = $this->input->post('fpropietari');
        
		$data['check'] = $this->ModelConsultes->checkCurs($data);
		
		if($data['check']==false){
            
			$this->ModelConsultes->crearCurs($data);
            
            //agafem el mail del propietari assignat
            $data['mail'] = $this->ModelConsultes->getMailPropietari($data);
            //echo $data['mail'][0]["mail"];
            //var_dump($data['mail']);
            
            //enviar el correu
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'w2.jvalles@infomila.info',
                'smtp_pass' => '47124284K',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
            );
            
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            
            $this->email->from('w2.jvalles@infomila.info', 'Administrador');
            //$this->email->to('w2.rperez@infomila.info');
            $this->email->to($data['mail'][0]["mail"]);
            
            $this->email->subject('Assignacio de curs');
            $this->email->message("Hola,t'informem que tens un nou curs assignat. Ja pots iniciar sessio al teu compte per a gestionar-lo.");  
            
            $result = $this->email->send();
            
            if($result){
                $data['exit'] = "Curs creat correctament. Mail enviat correctament.";
            }else{
                $data['error'] = "Curs creat correctament però hi ha hagut un error al enviar el mail.";
            }
            
		}else{
			$data['error'] = "Aquest curs ja existeix!";
		}
        
		//cursos disponibles
		$data['cursos'] = $this->ModelConsultes->getCursos();
		
		//usuaris (propietaris)
		$data['propietaris'] = $this->ModelConsultes->getPropietaris();
		
		$this->load->view('Admin',$data);
        
	}
	
}




