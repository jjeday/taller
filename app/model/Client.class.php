<?php

/**
 * ViewArticulo Active Record
 * @author  Renán Darío Gonzales Apaza
 */
class Client extends TRecord
{
    const TABLENAME = 'client';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max'; // {max, serial}


    /**
     * Constructor method
     */
    public function __construct($id = null, $callObjectLoad = true)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de ViewArticulo
        parent::addAttribute('id');
        parent::addAttribute('name');
        parent::addAttribute('company');
        parent::addAttribute('image');
        parent::addAttribute('image_head');
        parent::addAttribute('comment');
        parent::addAttribute('visible');
        
        /*parent::addAttribute('fecha_creacion');
        parent::addAttribute('user_modificacion');
        parent::addAttribute('fecha_modificacion');
        parent::addAttribute('tipo');
        parent::addAttribute('etiqueta');
        parent::addAttribute('visible');
        parent::addAttribute('categoria_denominacion');*/
    }

}
