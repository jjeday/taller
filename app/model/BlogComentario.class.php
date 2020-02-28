<?php
/**
 * BlogComentario Active Record
 * @author  Renán Darío Gonzales Apaza
 */
class BlogComentario extends TRecord
{
    const TABLENAME = 'blog_comentario';
    const PRIMARYKEY= 'idcomentario';
    const IDPOLICY =  'max'; // {max, serial}
    
    
			/**
			* Constructor method
			*/
			public function __construct($id = NULL, $callObjectLoad = TRUE)
			{
				parent::__construct($id, $callObjectLoad);
				//Atributos de BlogComentario
				parent::addAttribute('articulo_id');
				parent::addAttribute('nombre');
				parent::addAttribute('email');
				parent::addAttribute('telefono');
				parent::addAttribute('contenido');

			}
    
}