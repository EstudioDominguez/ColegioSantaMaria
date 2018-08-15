<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends Public_Controller 
{
	private $_members = '';
		
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios/usuarios_model');		
	}	
	
	public function login()
	{
		if($this->session->userdata('login')){
			redirect('admin/paginas/');
		}								

			
		if ($this->input->post('q')) {
			
			$email = $this->input->post('email');
			$password = $this->input->post('password');
				
			$this->db->select('Usuarios.*');		
			$this->db->where('Usuarios.email', $email);					
			$this->db->where('Usuarios.password', md5($password));										
			$query = $this->db->get('Usuarios');
			   
			if( $query->num_rows() > 0 ) {
				
				$data = array(
						'id_usuarios' => $query->row()->id,
						'nombre' => $query->row()->nombre,
						'apellido' => $query->row()->apellido,
						'email' => $query->row()->email,
						'login' => true								
						);			
				$this->session->set_userdata($data);
					
				redirect('admin/paginas/');
				
			} else {
				$data['error'] = 'Usuario o Claves Incorrectos';	
			}
		}		
		
		$data['h1'] = 'Acceso';
		$data['h2'] = 'Permisos';
		$data['contenido'] = 'usuarios/login';
		

		$this->parser->parse('templates/mustang/layout',$data);	
	}	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuarios/login');	
	}	
	
	public function recuperar()
	{
		if($this->session->userdata('logged') == true){
			redirect('admin/dashboard/');
		}	
		
		$error = '';
		
		$success = '';
				
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|xss_clean|max_length[100]');
							
		$this->form_validation->set_error_delimiters('<br /><div class="alert alert-error">', '</div>');
		
		$this->form_validation->set_message('valid_email', 'Debe ingresar un email valido');
				
		if ($this->form_validation->run() == FALSE) {
				
				
				
		} else {			
			
		 	$this->load->helper('url');						
		    $email= set_value('email');			
		    $q = $this->db->query("select * from sys_users where email='" . $email . "'");			
		    if ($q->num_rows > 0) {		    	
		        $user = $q->row();    				
		        $this->resetpassword($user);				
		        $info = "Password has been reset and has been sent to email id: ". $email;				
		        redirect(base_url().'/admin');				
		    }
		    	$error= "El email no existe en la base de datos";
				
			}				
		
	
		$data = array(
					 'h1' => 'Acceso',
					 'h2' => 'Permisos',
					 'contenido' => 'usuarios/recuperar',
					 'login' => true,
					 'success' => $success,
					  'error' => $error,
					  );			
		
		 $this->parser->parse('templates/mustang/layout',$data);		
	}		



	private function resetpassword($user)
	{
	    date_default_timezone_set('GMT');
	    $this->load->helper('string');
	    $password = random_string('alnum', 16);
	    $this->db->where('id', $user->id);
	    $this->db->update('sys_users',array('password' => MD5($password)));
	    $this->load->library('email');
	    $this->email->from('cantreply@allytech.com', 'Nextar');
	    $this->email->to($user->email);   
	    $this->email->subject('Nueva Clave');
	    $this->email->message('Se ha generado una nueva clave para tu cuenta, Tu Clave es: '. $password);  
	    $this->email->send();
	}
		 	
		 	
		
}