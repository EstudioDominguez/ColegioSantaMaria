<?php

class Acl
{
	private $_uri_total;
	private $_cont = 1;
	private $_check = true;
	
	public $CI;	
		
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('session');	
		$this->_uri_total = $this->CI->uri->total_segments();
		$this->_cont = 1;
	}
	
	
	public function verifica_email($email)
	{		
		$this->CI->db->select('sys_users.email');
		$this->CI->db->where('sys_users.email',$email);											
		$query = $this->CI->db->get('sys_users');
		if( $query->num_rows() > 0 ) {		
			return false;		

		} else {
			return true;
		}		
	}	
	
	
	public function login($username,$password,$facebook_id = null)
	{
		$tmp = array();	
		$tmp_roles = array();	
		
		$this->CI->db->select($this->CI->config->item('sys_users').'.*,sys_roles.name as nombrerol,sys_roles.key as rol');
		$this->CI->db->join('sys_roles', 'sys_roles.id = sys_users.rol_id');
		
		if(isset($facebook_id)){
			$this->CI->db->where($this->CI->config->item('sys_users').'.username', $facebook_id);	
		} else {
			$this->CI->db->where($this->CI->config->item('sys_users').'.username', $username);					
			$this->CI->db->where($this->CI->config->item('sys_users').'.password', md5($password));
		}
		
		$this->CI->db->where($this->CI->config->item('sys_users').'.active', 1);
									
		$query = $this->CI->db->get($this->CI->config->item('sys_users'));
		     
		   
		if( $query->num_rows() > 0 ) {			
			$roles = $this->get_roles($query->row()->id);			
			foreach($roles as $rol){				
				$tmp = $this->get_permissions($rol['id']);				
				foreach($tmp as $key => $perm){
					$permissions[] = $perm;					
				}
				$tmp_roles[] = $rol['key'];				
			}
			
			$roles = $tmp_roles;			
			$permissions = $this->get_recursive($permissions);				
				
			$data = array(
					'user_id' => $query->row()->id,
					'username' => $query->row()->username,
					'email' => $query->row()->email,
					'img' => $query->row()->img,
					'name' => $query->row()->name,
					'lastname' => $query->row()->lastname,										
					'roles' => $roles,	
					'membresia' => $query->row()->nombrerol,
					'rol' => $query->row()->rol,	
					'permissions' => $permissions,
					'logged' => true								
					);		

			$this->CI->session->set_userdata($data);
		
			return true;		

		} else {
			return false;
		}		
	}
	
	public function get_permissions($rol_id)
	{
		$this->CI->db->select($this->CI->config->item('sys_permissions').'.*');
		$this->CI->db->join($this->CI->config->item('sys_roles_permissions'), $this->CI->config->item('sys_roles_permissions').'.permission_id = '.$this->CI->config->item('sys_permissions').'.id');
		$this->CI->db->join($this->CI->config->item('sys_roles'), $this->CI->config->item('sys_roles_permissions').'.rol_id = '.$this->CI->config->item('sys_roles').'.id');		
		$this->CI->db->where($this->CI->config->item('sys_roles').'.id', $rol_id);
		$query = $this->CI->db->get($this->CI->config->item('sys_permissions'));   
		if( $query->num_rows() > 0 ) {			
			return $query->result_array();
		} else {
			return array();
		}		
	}	
	
	public function get_roles($user_id)
	{
		$this->CI->db->select($this->CI->config->item('sys_roles').'.*');
		$this->CI->db->join($this->CI->config->item('sys_users_roles'), $this->CI->config->item('sys_users_roles').'.rol_id = '.$this->CI->config->item('sys_roles').'.id');
		$this->CI->db->join($this->CI->config->item('sys_users'), $this->CI->config->item('sys_users_roles').'.user_id = '.$this->CI->config->item('sys_users').'.id');		
		$this->CI->db->where($this->CI->config->item('sys_users').'.id', $user_id);
		$query = $this->CI->db->get($this->CI->config->item('sys_roles'));   
		if( $query->num_rows() > 0 ) {		
			return $query->result_array();
		} else {
			return array();
		}
	}
	
	
	public function check()
	{
		$perms = $this->CI->session->userdata('permissions');		
		return (bool) $this->check_permissions($perms);		
	}
	
   public function check_permissions($perms)
   {
		if($this->_uri_total >= $this->_cont){		
	        foreach ($perms as $key => $v) {	        	
				if (in_array($this->CI->uri->segment($this->_cont), $v)) {
						$this->_cont  = $this->_cont + 1;	
					    $this->_check = true;
			       	     if (array_key_exists('children', $v)) {			            							
			                $this->check_permissions($v['children']);					
			            }
						break;
											
					} else {
						$this->_check = false;	
					}					
	        }
		} 
        return (bool) $this->_check;
    }	
	
	public function create_user($data = array())
	{			
		if( $this->CI->db->insert($this->CI->config->item('sys_users'), $data)) {
			return true;
		} else {
			return false;
		}			
	}
	
	public function do_resend_register($username)
	{
		
	}			
	
	public function do_reset_password($username)
	{
		
	}	
	
	public function do_confirm_password($hash)
	{
		$this->CI->db->select($this->CI->config->item('sys_users').'.*');
		$this->CI->db->where($this->CI->config->item('sys_users').'.hash', $hash);
		$query = $this->CI->db->get($this->CI->config->item('sys_users'));   
		if( $query->num_rows() > 0 ) {
			$this->reset_hash($query->result()->id);
			return true;
		} else {
			return false;
		}			
	}
	
	public function reset_hash($user_id)
	{
		$new_hash = array('hash' => random_string('user_', 32));		
		$this->db->where('id', $user_id);
		$this->db->update($this->CI->config->item('sys_users'), $new_hash); 		
	}		
	
	
    public function get_recursive($data)
    {
        $refs = array();
        $list = array();
        foreach ($data as $item) {      
            $thisref = &$refs[$item['id']];
            $thisref['parent_id'] = $item['parent_id'];
	        $thisref['key'] = $item['key'];
	        $thisref['id'] = $item['id'];             
				
            if ($item['parent_id'] == 0) {
                $list[$item['id']] = &$thisref;
				
            } else {            	
                $refs[$item['parent_id']]['children'][$item['id']] = &$thisref;
            }			
        }		
        return $list;
    }	
	
}