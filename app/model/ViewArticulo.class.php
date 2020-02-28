<?php

/**
 * ViewArticulo Active Record
 * @author  Renán Darío Gonzales Apaza
 */
class ViewArticulo extends TRecord
{
    const TABLENAME = 'blog_articulos';
    const PRIMARYKEY = 'idarticulo';
    const IDPOLICY = 'max'; // {max, serial}


    /**
     * Constructor method
     */
    public function __construct($id = null, $callObjectLoad = true)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de ViewArticulo
        parent::addAttribute('categoria_id');
        parent::addAttribute('slug');
        parent::addAttribute('titulo');
        parent::addAttribute('icon');
        parent::addAttribute('image_head');
        parent::addAttribute('contenido');
        parent::addAttribute('user_creacion');
        parent::addAttribute('fecha_creacion');
        parent::addAttribute('user_modificacion');
        parent::addAttribute('fecha_modificacion');
        parent::addAttribute('tipo');
        parent::addAttribute('etiqueta');
        parent::addAttribute('visible');
        parent::addAttribute('categoria_denominacion');

        parent::addAttribute('marca');
        parent::addAttribute('medida');
    }

}
