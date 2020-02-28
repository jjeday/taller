<?php

/**
 * BlogArticulo Active Record
 * @author  Renán Darío Gonzales Apaza
 */
class BlogUs extends TRecord
{
    const TABLENAME = 'us';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max'; // {max, serial}
    
    //use traitBlogArticulo;

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
        parent::addAttribute('description'); 
        parent::addAttribute('visible'); 
    }

    /**
     * Method get_blogcategoria
     * @returns BlogCategoria instance
     */
    public function get_blogcategoria()
    {
        // loads the associated object
        if (empty($this->blogcategoria))
            $this->blogcategoria = new BlogUs($this->categoria_id);

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
