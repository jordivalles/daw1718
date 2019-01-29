<?php

class AuthController extends Zend_Controller_Action
{

   
    public function simulaACCES ($user, $pass) {
        // Create an in-memory SQLite database connection
        $dbAdapter = new Zend_Db_Adapter_Pdo_Sqlite(array('dbname' =>
                                                      ':memory:'));     
        // Build a simple table creation query
        $sqlCreate = 'CREATE TABLE [users] ('
               . '[id] INTEGER  NOT NULL PRIMARY KEY, '
               . '[username] VARCHAR(50) UNIQUE NOT NULL, '
               . '[password] VARCHAR(32) NULL, '
               . '[real_name] VARCHAR(150) NULL)';
     
        // Create the authentication credentials table
        $dbAdapter->query($sqlCreate);
    
     
        // Build a query to insert a row for which authentication may succeed
        $sqlInsert = "INSERT INTO users (username, password, real_name) "
               . "VALUES ('u_mbrufau', 'p_mbrufau', 'Marc Brufau')";
     
        // Insert the data
        $dbAdapter->query($sqlInsert);
        
         $authAdapter = new Zend_Auth_Adapter_DbTable(
                        $dbAdapter,
                        'users',
                        'username',
                        'password'
        );
         $authAdapter
                ->setIdentity($user)
                ->setCredential($pass);

            $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
                return ($result->isValid());
        
    }
    
    public function init()
    {
    }

    public function indexAction()
    {
               
        $form = new Application_Form_Lform();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()){
            
            if ($form->isValid($_POST)) {
                if ($this->simulaACCES($_POST['userName'], $_POST['Pass'])) {
                    
                    echo "Ok";
                    // $this->_forward("Index");
                } else {
                    echo "Ko";
                } 
            }               
        }
    }
}

