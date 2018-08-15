<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
	
	public function __contruct()
	{
		parent::__construct();		
	}	

	public function login($usuario,$password)
	{	
		$this->db->select('*');		
		$this->db->where('sys_users.id', $user_id);
		$query = $this->db->get('clientes');		
		   
		if( $query->num_rows() > 0 ) {
			return $query->row_array();				

		} else {
			return array();
		}
	}
	
		
	
}