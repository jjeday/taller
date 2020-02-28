<?php

/**
 * BlogArticulo Active Record
 * @author  Renán Darío Gonzales Apaza
 */
class BlogProduct extends TRecord
{
    const TABLENAME = 'product';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max'; // {max, serial}
    
    use traitBlogProduct;

    //Variables de asociacion
    private $blogcategory;
    //Variables de composición
    private $composicion_blogcomentario;
    /**
     * Constructor method
     */
    public function __construct($id = null, $callObjectLoad = true)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de BlogArticulo
        parent::addAttribute('idcategory');
        parent::addAttribute('name');
        parent::addAttribute('trademark');
        parent::addAttribute('model');
        parent::addAttribute('measure');
        parent::addAttribute('color');
        parent::addAttribute('image');
        parent::addAttribute('image_head');
        parent::addAttribute('description');
        parent::addAttribute('visible');
        parent::addAttribute('creating_user');
        parent::addAttribute('creating_date');
        parent::addAttribute('updating_user');
        parent::addAttribute('updating_date'); 

    }

    /**
     * Method get_blogcategoria
     * @returns BlogCategoria instance
     */
    public function get_blogcategory()
    {
        // loads the associated object
        if (empty($this->blogcategory))
            $this->blogcategory = new BlogCategory($this->idcategory);

        // returns the associated object
        return $this->blogcategory;
    }

    /**
     * Method set_blogcategoria
     * @param $object Instance of BlogCategoria
     */
    public function set_blogcategory(BlogCategory $object)
    {
        $this->blogcategory = $object;
        $this->idcategory = $object->idcategory;
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
