<?php
/**
 * BlogCategoria Active Record
 * @author  Renán Darío Gonzales Apaza
 */
class BlogCategoria extends TRecord
{
    const TABLENAME = 'blog_categoria';
    const PRIMARYKEY= 'idcategoria';
    const IDPOLICY =  'max'; // {max, serial}
    
    
			/**
			* Constructor method
			*/
			public function __construct($id = NULL, $callObjectLoad = TRUE)
			{
				parent::__construct($id, $callObjectLoad);
				//Atributos de BlogCategoria
				parent::addAttribute('denominacion');
			}    
}