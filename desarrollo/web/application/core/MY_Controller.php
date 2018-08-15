<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* The MX_Controller class is autoloaded as required */

require APPPATH."third_party/MX/Controller.php"; 

class Admin_Controller extends MX_Controller 
{

      function __construct()
      {			
        parent::__construct();  			
		if($this->session->userdata('logged') == false){
			//redirect('users/login');		
		}		
	
		
		
	  }

}

class Public_Controller extends MX_Controller 
{
	
	 public $members = array();
	
      function __construct()
      {
        parent::__construct();  
						        
      }
}



