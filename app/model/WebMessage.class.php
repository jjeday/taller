<?php
/**
 * WebMessage Active Record
 * @author  Renán Darío Gonzales Apaza
 */
class WebMessage extends TRecord
{
    const TABLENAME = 'web_message';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
			/**
			* Constructor method
			*/
			public function __construct($id = NULL, $callObjectLoad = TRUE)
			{
			parent::__construct($id, $callObjectLoad);
//Atributos de WebMessage
parent::addAttribute('system_user_id');
parent::addAttribute('mensaje_tipo');
parent::addAttribute('estado');
parent::addAttribute('subject');
parent::addAttribute('name');
parent::addAttribute('phone');
parent::addAttribute('email');
parent::addAttribute('message');
parent::addAttribute('dt_message');
parent::addAttribute('checked');
parent::addAttribute('archivado_por');
parent::addAttribute('enviado_por');

			}
    
}