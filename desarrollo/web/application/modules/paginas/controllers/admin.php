<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller 
{	
		
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login')){
			redirect('usuarios/login');
		}
		
		$this->load->model('paginas/paginas_model','eventos');
		$this->load->library('grocery_CRUD');

	}
	
	public function index()
	{
		$this->noticias();
	}
	
	public function noticias()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('Noticias');
		$crud->set_language("spanish");
		
		$crud->set_relation('nivel_id','Niveles','nombre');
		
		$crud->set_relation_n_n('Niveles', 'NoticiasNiveles', 'Niveles', 'noticia_id', 'nivel_id', 'nombre');
		$crud->set_relation_n_n('Galerias', 'NoticiasGalerias', 'Galerias', 'noticia_id', 'galeria_id', 'titulo');
		
		
		$crud->columns('fecha_alta','titulo','activo','nivel_id');
		
		$crud->display_as('nivel_id','Pertenece a');
		$crud->required_fields('nivel_id','titulo','Niveles');
		
		
		$crud->set_field_upload('imagen_1','assets/uploads/');				
		$crud->set_field_upload('imagen_2','assets/uploads/');
		$crud->set_field_upload('imagen_3','assets/uploads/');
		$crud->set_field_upload('imagen_4','assets/uploads/');			
		
		$data = array(
					 'h1' => 'Noticias',					 
					 'contenido' => 'paginas/crud',					 
					 'output' => $crud->render()->output,
					 'css_files' => $crud->render()->css_files,
					 'js_files' => $crud->render()->js_files
					  );		
	   $this->parser->parse('templates/mustang/layout',$data);
	}	
	
	public function newsletters()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('Newsletters');
		$crud->set_language("spanish");		
		$crud->add_action('Preview', '', '','btn btn-default glyphicon glyphicon-search',array($this,'callback'));
	
		$crud->set_relation_n_n('Noticias', 'NewslettersNoticias', 'Noticias', 'newsletter_id', 'noticia_id', 'titulo','prioridad');
		
		
		$data = array(
					 'h1' => 'Newsletters',					 
					 'contenido' => 'paginas/crud',					 
					 'output' => $crud->render()->output,
					 'css_files' => $crud->render()->css_files,
					 'js_files' => $crud->render()->js_files
					  );		
	   $this->parser->parse('templates/mustang/layout',$data);
	}		
	
	public function callback($primary_key , $row)
	{
	    return site_url('/paginas/newsletter/' . $row->id);
	}	
	
	public function galerias()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('Galerias');
		$crud->set_relation('nivel_id','Niveles','nombre');
		$crud->set_language("spanish");
		$crud->add_action('Imagenes', base_url() .'assets/images/camera.png', 'admin/paginas/galerias_imagenes');
		$crud->display_as('nivel_id','Pertenece a');
		$crud->required_fields('nivel_id','titulo');		
		
		$data = array(
					 'h1' => 'Galerias',					 
					 'contenido' => 'paginas/crud',					 
					 'output' => $crud->render()->output,
					 'css_files' => $crud->render()->css_files,
					 'js_files' => $crud->render()->js_files
					  );		
	   $this->parser->parse('templates/mustang/layout',$data);
	}
	
	function galerias_imagenes()
	{
		$this->load->library('image_CRUD');

		$image_crud = new image_CRUD();

		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('imagen');
		$image_crud->set_table('GaleriasImagenes')
		->set_relation_field('galeria_id')
		->set_title_field('titulo')
		->set_ordering_field('orden')
		->set_image_path('assets/uploads/');

		$link_volver = '<a href="javascript:history.go(-1)" class="btn btn-success">Volver</a>' ;

		$data = array(
					 'h1' => 'Imagenes de Articulos |' . $link_volver,
					 'contenido' => 'paginas/crud',			
					 'output' => $image_crud->render()->output,
					 'css_files' => $image_crud->render()->css_files,
					 'js_files' => $image_crud->render()->js_files
					  );

		$this->parser->parse('templates/mustang/layout',$data);

	}			


	public function niveles()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('Niveles');
		$crud->set_language("spanish");
		
		$data = array(
					 'h1' => 'Niveles',					 
					 'contenido' => 'paginas/crud',					 
					 'output' => $crud->render()->output,
					 'css_files' => $crud->render()->css_files,
					 'js_files' => $crud->render()->js_files
					  );		
	   $this->parser->parse('templates/mustang/layout',$data);
	}
	
	public function usuarios()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('Usuarios');
		$crud->set_language("spanish");
		
		$data = array(
					 'h1' => 'Usuarios',					 
					 'contenido' => 'paginas/crud',					 
					 'output' => $crud->render()->output,
					 'css_files' => $crud->render()->css_files,
					 'js_files' => $crud->render()->js_files
					  );		
	   $this->parser->parse('templates/mustang/layout',$data);
	}	
	
		
}
