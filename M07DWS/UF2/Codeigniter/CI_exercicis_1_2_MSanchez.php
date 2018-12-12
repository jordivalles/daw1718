<?php
    //las vistas estan completas, de los controladores paso las funciones nuevas,
    //situadas en el controlador entre parentesis.
    //exercici 1
        //controlador (Departament)
            //sense session
                public function exercici1()
                {
                    $data['emps']=array();
                    $data['x_dpt']=-1;
                    $this->load->model('dpt');
                    $data['dpts']=$this->dpt->getAll();
                    $this->load->model('emp');
                    
                    if($this->input->post()){
                        if($this->input->post('empleats')==null){
                            if($this->input->post('dpts')!=null){
                                $data['x_dpt']=$this->input->post('dpts');
                                $data['emps']=$this->emp->getEmpsDpt($data['x_dpt']);
                            }
                        }
                        else{
                            foreach($this->input->post('empleats') as $emp){
                                
                                $this->emp->elimina($emp);
                            }
                            redirect("Departament/logout");
                        }
                    }
                    $this->load->view('ex_dpts',$data);
                }
            //amb session
                public function exercici1()
                {
                    
                    $this->load->model('dpt');
                    $data['dpts']=$this->dpt->getAll();
                    $this->load->model('emp');
                    if(!$this->session->fase){
                        $this->session->fase=0;
                    }
                    
                    if($this->input->post()){
                        if($this->session->fase==0){
                            $this->session->fase=1;
                            $data['emps']=$this->emp->getEmpsDpt($this->input->post('dpts'));
                        }
                        else{
                            foreach($this->input->post('empleats') as $emp){
                                $this->emp->elimina($emp);
                            }
                            redirect("Departament/logout");
                        }
                    }
                    $data['fase']=$this->session->fase;
                    $this->load->view('ex_dpts',$data);
                }
            //conjunt
                public function logout(){
                    $this->session->sess_destroy();
                    redirect("Departament/exercici1");
                }
        //vista
            //amb session
                <?php
                    defined('BASEPATH') OR exit('No direct script access allowed');
                ?>
                <!DOCTYPE html>
                <html lang="en">
                    <body>
                        <form name="f1" method="POST" action="<?php  echo site_url("Departament/exercici1");?>">
                                <select name="dpts" <?php if($fase==1){echo " disabled ";} ?>>
                                    <?php
                                        
                                        foreach($dpts as $dpt){
                                                echo "<option ";
                                                if($fase==1 && $dpt['id']==$emps[0]['dpt']){
                                                    echo "selected ";
                                                }
                                                echo "value='".$dpt['id']."'>".$dpt['nom']."</option>";
                                        }
                                    ?>
                                </select>
                                <?php
                                    if($fase==1){
                                        foreach($emps as $emp){
                                            echo "<input type='checkbox' name='empleats[]' value='".$emp['id']."'/> ".$emp['nom']." <br/>";
                                        }
                                    }
                                ?>
                                <input type="submit" name="envia" value="Envia"/>
                        </form>
                        <a href="<?php  echo site_url("Departament/logout");?>">Logout</a>
                    </body>
                </html>
            //sense session
                <?php
                    defined('BASEPATH') OR exit('No direct script access allowed');
                ?>
                <!DOCTYPE html>
                <html lang="en">
                    <body>
                        <form name="f1" method="POST" action="<?php  echo site_url("Departament/exercici1");?>">
                                <select name="dpts" <?php if($x_dpt!=-1){echo " disabled ";} ?>>
                                    <?php
                                        foreach($dpts as $dpt){
                                                echo "<option ";
                                                if($dpt['id']==$x_dpt)
                                                    echo "selected ";
                                                echo "value='".$dpt['id']."'>".$dpt['nom']."</option>";
                                        }
                                    ?>
                                </select>
                                <br/>
                                <?php
                                    foreach($emps as $emp){
                                        echo "<input type='checkbox' name='empleats[]' value='".$emp['id']."'/> ".$emp['nom']." <br/>";
                                    }
                                ?>
                                <input type="submit" name="envia" value="Envia"/>
                        </form>
                        <a href="<?php  echo site_url("Departament/logout");?>">Logout</a>
                    </body>
                </html>
        //funcio en el model Emp
        
        public function getEmpsDpt($dpt) {
            $sql = $this->db->query("select id,nom,dpt from emp where dpt=".$dpt.";");
            return $sql->result_array();
        }
        
    //exercici 2
        //controlador (Login)
            public function form(){
                $this->load->helper('form');
                $this->load->view('exercici_2',array("max"=>3));
            }
        //vista
            <?php
                defined('BASEPATH') OR exit('No direct script access allowed');
            ?>
            <!DOCTYPE html>
            <html lang="en">
                <body>
                    <?php
                        echo form_open("login/form",array("name"=>"f1"));
                        for($i=0;$i<$max;$i++){
                            echo form_input(array("name"=>"n$i"));
                        }
                        echo form_submit(array("name"=>"envia","value"=>"Click Me!"));
                        echo form_close();
                    ?>
                </body>
            </html>
?>      
