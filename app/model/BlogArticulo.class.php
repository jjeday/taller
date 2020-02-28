<?php

/**
 * BlogArticulo Active Record
 * @author  Renán Darío Gonzales Apaza
 */
class BlogArticulo extends TRecord
{
    const TABLENAME = 'blog_articulo';
    const PRIMARYKEY = 'idarticulo';
    const IDPOLICY = 'max'; // {max, serial}
    
    use traitBlogArticulo;

    //Variables de asociacion
    private $blogcategoria;
    //Variables de composición
    private $composicion_blogcomentario;
    /**
     * Constructor method
     */
    public function __construct($id = null, $callObjectLoad = true)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de BlogArticulo
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

        parent::addAttribute('marca');
        parent::addAttribute('medida');
    }

    /**
     * Method get_blogcategoria
     * @returns BlogCategoria instance
     */
    public function get_blogcategoria()
    {
        // loads the associated object
        if (empty($this->blogcategoria))
            $this->blogcategoria = new BlogCategoria($this->categoria_id);

        // returns the associated object
        return $this->blogcategoria;
    }

    /**
     * Method set_blogcategoria
     * @param $object Instance of BlogCategoria
     */
    public function set_blogcategoria(BlogCategoria $object)
    {
        $this->blogcategoria = $object;
        $this->categoria_id = $object->idcategoria;
    }

    /**
     * Reset agregaciones y composiciones
     */
    public function clearParts()
    {
        $this->composicion_blogcomentario = array();
    }

    /**
     * Composition with BlogComentario
     */
    public function addBlogComentario(BlogComentario $blogcomentario)
    {
        $this->composicion_blogcomentario[] = $blogcomentario;
    }

    /**
     * Return BlogComentario composition
     */
    public function getComposicion_BlogComentario()
    {
        return $this->composicion_blogcomentario;
    }

    /**
     * Load the object and the aggregates
     */
    public function load($id)
    {
        $BlogComentario_rep = new TRepository('BlogComentario');

        // load the BlogComentario composition
        $criteria = new TCriteria;
        $criteria->add(new TFilter("articulo_id", "=", $id));
        $items = $BlogComentario_rep->load($criteria);
        if ($items)
        {
            foreach ($items as $item)
            {
                $this->addBlogComentario($item);
            }
        }
        // load the object itself
        return parent::load($id);
    }

    /**
     * Store the object and its aggregates
     */
    public function store()
    {
        // store the object itself
        parent::store();
        parent::saveComposite('BlogComentario', 'articulo_id', $this->idarticulo, $this->composicion_blogcomentario);

    }

    /**
     * Delete the object and its aggregates
     * @param $id object ID
     */
    public function delete($id = null)
    {

        $repository = new TRepository('BlogComentario');
        $criteria = new TCriteria;
        $criteria->add(new TFilter('articulo_id', '=', $id));
        $objects = $repository->load($criteria);
        if ($objects)
        {
            foreach ($objects as $object)
            {
                $object->delete();
            }
        }


        // delete the object itself
        parent::delete($id);
    }

}
