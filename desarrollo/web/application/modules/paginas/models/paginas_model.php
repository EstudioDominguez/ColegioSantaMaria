<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Paginas_model extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}	
	
	public function traer_noticias($filter = null,$desde = null,$cantidad = null,$contar = null)
	{
		
		
		
		$this->db->select('Noticias.*,NoticiasNiveles.nivel_id as nivel');
		$this->db->join('NoticiasNiveles', 'NoticiasNiveles.noticia_id = Noticias.id', 'left');	
		
		if($filter && count($filter) > 0)
		{				
			if(isset($filter['nivel']))
			{		
				if($filter['nivel'] == 'destacadas')
				{
					$this->db->where('Noticias.destacada', 1);					
				}
				elseif(is_numeric($filter['nivel']))
				{
					$this->db->join('Niveles', 'Niveles.id = NoticiasNiveles.nivel_id');			
					$this->db->where('Niveles.id',$filter['nivel']);					
				}					
			}						
		}		
	
		if(!$desde && !$cantidad){	

			//
			
		} else {
			$this->db->limit($desde, $cantidad);
		}
		

		if($filter && isset($filter['id'])){
			$this->db->where('Noticias.id', $filter['id']);
		}


		$this->db->order_by("Noticias.id", "desc"); 
		$this->db->order_by("Noticias.destacada", "desc");

		$this->db->group_by('Noticias.id');
		$query = $this->db->get('Noticias');				


		if( $query->num_rows() > 0 ) {

			if(isset($filter['id'])){

				$output = $query->row_array();

				if($output['imagen_1'] != ''){
					$output['imagenes'][]	= $output['imagen_1'];	
				}

				if($output['imagen_2'] != ''){
					$output['imagenes'][]	= $output['imagen_2'];	
				}

				if($output['imagen_3'] != ''){
					$output['imagenes'][]	= $output['imagen_3'];	
				}

				if($output['imagen_4'] != ''){
					$output['imagenes'][]	= $output['imagen_4'];	
				}

				$output['galerias'] = $this->traer_galerias_noticias($output['id']);

				return $output;

				

			} else {
				
				
				if(isset($contar)){
					//return count($query->result_array());
				}

				foreach($query->result_array() as $key => $noticia){
				
					$output[$key]	= $noticia;

					if($noticia['imagen_1'] != ''){
						$output[$key]['imagenes'][]	= $noticia['imagen_1'];	
					}

					if($noticia['imagen_2'] != ''){
						$output[$key]['imagenes'][]	= $noticia['imagen_2'];	
					}

					if($noticia['imagen_3'] != ''){
						$output[$key]['imagenes'][]	= $noticia['imagen_3'];	
					}

					if($noticia['imagen_4'] != ''){
						$output[$key]['imagenes'][]	= $noticia['imagen_4'];	
					}																
				
				} 
				return $output;
			

			}


		} else {
			return array();
		}
	}



	public function traer_galerias_noticias($noticia_id)
	{		
		
		$this->db->select('Galerias.*');		
		$this->db->join('NoticiasGalerias', 'NoticiasGalerias.galeria_id = Galerias.id');	
		$this->db->where('NoticiasGalerias.noticia_id',$noticia_id);	
		$this->db->group_by('Galerias.id');
		
		$query = $this->db->get('Galerias');

		if( $query->num_rows() > 0 ) {
			
			foreach ($query->result_array() as $key => $value) {				
				$output[$key] = $value;
				$output[$key]['imagenes'] = $this->traer_galerias_noticias_imagenes($value['id']);
			}
			
			return $output;
			
		} else {
			return array();
		}		
	}

	public function traer_galerias($nivel,$desde = null,$cantidad = null,$principal = null)
	{		
		
		$this->db->select('Galerias.*');
		
		
		$this->db->where('nivel_id', $nivel);
		
		if(isset($desde) && isset($cantidad)){
			$this->db->limit($desde, $cantidad);	
		}
		
		
		if($principal){
			$this->db->limit(5);	
		}						
		
		$this->db->order_by("Galerias.id", "desc");
		
		$query = $this->db->get('Galerias');

		if( $query->num_rows() > 0 ) {
			
			foreach ($query->result_array() as $key => $value) {				
				$output[$key] = $value;
				$output[$key]['imagenes'] = $this->traer_galerias_noticias_imagenes($value['id']);
			}
			
			return $output;
			
		} else {
			return array();
		}		
	}
	
	public function traer_galeria($id)
	{	
		$this->db->select('Galerias.*');	 		
		$this->db->where('Galerias.id',$id);
		$query = $this->db->get('Galerias');	

		if( $query->num_rows() > 0 ) {										
			$output = $query->row_array();
			$output['imagenes'] = $this->traer_galerias_noticias_imagenes($output['id']);					
			return $output;
			
		} else {
			return array();
		}		
	}	
	
	
	
	public function traer_newsletter($id)
	{	
		$this->db->select('Newsletters.*');	 		
		$this->db->where('Newsletters.id',$id);
		$query = $this->db->get('Newsletters');	

		if( $query->num_rows() > 0 ) {										
			$output = $query->row_array();
			$output['noticias'] = $this->traer_newsletters_noticias($output['id']);					
			return $output;
			
		} else {
			return array();
		}		
	}	
	
	
	public function traer_newsletters_noticias($newsletter_id)
	{
		$this->db->select('Noticias.*');
		$this->db->join('NewslettersNoticias', 'NewslettersNoticias.noticia_id = Noticias.id');		
		$this->db->where('NewslettersNoticias.newsletter_id',$newsletter_id);
		$this->db->order_by("NewslettersNoticias.prioridad", "asc"); 

		$query = $this->db->get('Noticias');

		if( $query->num_rows() > 0 ) {
			
			return $query->result_array();
			
		} else {
			return array();
		}		
	}	
	

	public function traer_galerias_noticias_imagenes($galeria_id)
	{
		$this->db->select('GaleriasImagenes.*');	
		$this->db->where('GaleriasImagenes.galeria_id',$galeria_id);	
		$this->db->order_by("GaleriasImagenes.orden", "desc");		
		$query = $this->db->get('GaleriasImagenes');

		if( $query->num_rows() > 0 ) {
			
			return $query->result_array();
			
		} else {
			return array();
		}		
	}
	
	

	
}
