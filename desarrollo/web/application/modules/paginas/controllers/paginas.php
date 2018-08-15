<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginas extends Public_Controller 
{	
		
	public function __construct()
	{
		parent::__construct();
		$this->load->model('paginas/paginas_model','paginas');
		$this->load->helper('url');
		

	}
	
	public function noticias($nivel = null) 
	{	
		
		if (!$nivel) show_404();
		
		$filter = array();
		$this->load->library('pagination');
		
		if($nivel){			
			$filter['nivel'] = $nivel; 
			
			if($nivel == 1){
				$data['swf'] = 'swf/top_inicial.swf'; 	
			}			
		}		
		
		$data['h1'] = 'Inicio';
		$data['nivel'] = $nivel;			
		$data['contenido'] = 'paginas/noticias';
		
		$noticiasTodas = $this->paginas->traer_noticias($filter,null,null,true);
		$noticiasUltimas = array_slice($noticiasTodas, 0, 5);		
	
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$config['base_url'] = base_url('paginas/noticias/'.$nivel.'/');		
		$config['per_page'] = 2;
		$config['total_rows'] = count($noticiasTodas);		
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);			    		
		$data['paginador'] = $this->pagination->create_links();
		$data['nivel'] = $nivel;		
		$data['noticiasUltimas'] = $noticiasUltimas;
		$data['noticias'] = $this->paginas->traer_noticias($filter,$config["per_page"], $page);		

		$data['ir'] = '?ir=noticias&ir2=noticias';
		
		if($nivel == 'destacadas'){
			$data['ir'] = '?ir=info&ir2=noticias';			
		}
		
		


		$this->parser->parse('templates/mustang/frontend',$data);	
	}

	public function noticia($nivel,$id,$titulo)
	{

		if( !isset($id) && !isset($nivel) ) show_404();

		$data['h1'] = 'Inicio';
		
		if($nivel != 'NA'){
			$data['nivel'] = $nivel;			
		}		
				
		$data['contenido'] = 'paginas/noticia';
		$data['noticia']  = $this->paginas->traer_noticias(array('id' => $id));		
		
		if($nivel != 'NA'){
			$data['noticias'] = $this->paginas->traer_noticias(array('nivel' => $nivel));
		} else {
			$data['noticias'] = $this->paginas->traer_noticias();	
		}
		
		if($data['noticia']['nivel_id'] == 1){			
			$data['swf'] = 'swf/top_inicial.swf';						
		}

		$data['nivel'] = $data['noticia']['nivel_id'];
		$data['ir'] = '?ir=noticias&ir2=noticias';
				
		$this->parser->parse('templates/mustang/frontend',$data);	
		
	}	
	
	
	
	public function galerias($nivel = null)
	{
		
		if( !isset($nivel) ) show_404();
		
		$this->load->library('pagination');
		
		$galeriasTodas = $this->paginas->traer_galerias($nivel);
	
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$config['base_url'] = base_url('paginas/galerias/');		
		$config['per_page'] = 10;
		$config['total_rows'] = count($galeriasTodas);		
		$config['uri_segment'] = 4;
		
		
		$this->pagination->initialize($config);
		$data['paginador'] = $this->pagination->create_links();				
		
		$data['noticiasUltimas'] = $this->paginas->traer_noticias();		
						
		$data['h1'] = 'Galerias';		
		$data['contenido'] = 'paginas/galerias';
		
		$data['galerias'] = $galeriasTodas;
		$data['galerias'] = $this->paginas->traer_galerias($nivel,$config["per_page"], $page);		

		$data['nivel'] = $nivel;
		
		$data['ir'] = '?ir=miranos&ir2=galeria';

		$this->parser->parse('templates/mustang/frontend',$data);	
	}

	public function galeria($id,$titulo = null)
	{
		if( !isset($id) && !isset($nivel) ) show_404();
		
		$data['galeria']  = $this->paginas->traer_galeria($id);
		
		if(count($data['galeria']) == 0) show_404();		
			
		if($data['galeria']['nivel_id'] == 1){			
			$data['swf'] = 'swf/top_inicial.swf';						
		}				
			
		$this->load->library('image_CRUD');
		$image_crud = new image_CRUD();
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('imagen');
		$image_crud->set_table('GaleriasImagenes')
		->set_relation_field('galeria_id')	
		->unset_delete()
		->unset_upload()
		->set_title_field_input('titulo')
		->set_ordering_field_input('orden')
		->set_image_path('assets/uploads/'); 		
		
		$data['nivel'] = $data['galeria']['nivel_id'];
		
		$data['output'] =  $image_crud->render()->output;
		$data['css_files'] =  $image_crud->render()->css_files;
		$data['js_files'] =  $image_crud->render()->js_files;		
		
		$data['noticiasUltimas'] = $this->paginas->traer_noticias();				
		
		$data['galerias'] = $this->paginas->traer_galerias($data['nivel'],null,null,true);
		
		//print_r($data['galerias']);exit;
				
		
		$data['h1'] = 'Galeria';		
		$data['contenido'] = 'paginas/galeria';
		$data['ir'] = '?ir=miranos&ir2=galeria';
	
		$this->parser->parse('templates/mustang/frontend',$data);					
		
	}	
	
	public function newsletter($id)
	{
		if( !isset($id) && !isset($nivel) ) show_404();		
		$data['newsletter']  = $this->paginas->traer_newsletter($id);	
		$this->load->view('paginas/newsletter',$data);
	}	
		
}
