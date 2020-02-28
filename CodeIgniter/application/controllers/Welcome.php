<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public $empresa;
    public $description;
    public $titulo;


    public function __construct()
    {
        parent::__construct();

        $this->titulo = 'Asociaci&oacute;n de ciencias puras Gauss';
        $this->empresa = 'Asociaci&oacute;n de ciencias puras Gauss';
        $this->description = '';
        $this->img = base_url('app/images/logo.png');

    }

    public function index()
    {
        $data['titulo'] = $this->titulo;
        $data['description'] = $this->description;
        $data['site_name'] = $this->empresa;
        $data['img'] = $this->img;

        $data['recent'] = $this->get_recent_articles(10);
        $data['courses'] = $this->get_articles_by(1, 6);
        $data['tutoriales'] = $this->get_articles_by(2, 3);
        $data['servicios'] = $this->get_articles_by(4, 3);

        $data['catalogo'] = $this->get_articles_by(5, 9);
        $data['nosotros'] = $this->get_articles_by(6, 3);
        $data['clientes'] = $this->get_articles_by(7, 3);
        $data['proveedores'] = $this->get_articles_by(9, 3);
        $data['inicio'] = $this->get_articles_by(8, 3);

        $data['client'] = $this->get_client();

        $data['contenido'] = $this->load->view('main', $data, true);

        $this->load->view('layout', $data);
    }

    public function view_article($slug = '')
    {
        TTransaction::open('database');

        $items = ViewArticulo::where('slug', '=', $slug)->load();

        if ($items)
        {
            foreach ($items as $item)
            {
                $articulo['articulo'] = $item;

                if ($item->tipo == 'publicacion')
                {

                    $articulo['recent'] = $this->get_recent_articles(13);
                    $data['contenido'] = $this->load->view('view_article', $articulo, true);

                } else
                {
                    $data['contenido'] = $this->load->view('view_vista', $articulo, true);
                }

                $data['recent'] = $this->get_recent_articles();

                $data['titulo'] = $item->titulo . ' | ' . $this->empresa;
                $data['description'] = substr(strip_tags($item->contenido), 0, 500);
                $data['site_name'] = $this->empresa;
                $data['img'] = base_url('uploads/' . $item->image_head);
                $this->load->view('layout', $data);
            }
        } else {
            $items = ViewArticulo::where('idarticulo', '=', $slug)->load();

            if ($items)
            {
                foreach ($items as $item)
                {
                    $articulo['articulo'] = $item;

                    if ($item->tipo == 'publicacion')
                    {

                        $articulo['recent'] = $this->get_recent_articles(13);
                        $data['contenido'] = $this->load->view('view_article', $articulo, true);

                    } else
                    {
                        $data['contenido'] = $this->load->view('view_vista', $articulo, true);
                    }

                    $data['recent'] = $this->get_recent_articles();


                    $data['titulo'] = $item->titulo . ' | ' . $this->empresa;
                    $data['description'] = substr(strip_tags($item->contenido), 0, 500);
                    $data['site_name'] = $this->empresa;
                    $data['img'] = base_url('uploads/' . $item->image_head);
                    $this->load->view('layout', $data);
                }
            } else
            {
                $this->error_404();
            }
        }
        TTransaction::close();
    }

    public function view_cursos($curso = '')
    {
        TTransaction::open('database');

        $titulo = 'NUESTROS CURSOS';

        $criteria = new TCriteria;
        $param['order'] = 'idarticulo';
        $param['direction'] = 'desc';

        $criteria->setProperties($param);
        $criteria->setProperty('limit', 100);
        $criteria->add(new TFilter('categoria_id', '=', '1'));
        $criteria->add(new TFilter('tipo', '=', 'vista'));

        $items = new TRepository('ViewArticulo');
        $items = $items->load($criteria, false);

        TTransaction::close();

        if ($items)
        {
            $blog['titulo'] = $titulo;
            $blog['entradas'] = $items;

            $data['contenido'] = $this->load->view('view_curso', $blog, true);
        }

        $data['recent'] = $this->get_recent_articles();


        $data['titulo'] = $titulo . ' | ' . $this->empresa;
        $data['site_name'] = $this->empresa;
        $data['img'] = $this->img;
        $this->load->view('layout', $data);
    }

    public function view_blog($category = '')
    {
        TTransaction::open('database');

        $titulo = 'BLOG ACADEMIA GAUSS';

        $criteria = new TCriteria;
        $param['order'] = 'idarticulo';
        $param['direction'] = 'desc';
        $criteria->setProperties($param);
        $criteria->setProperty('limit', 100);
        $criteria->add(new TFilter('tipo', '=', 'publicacion'));

        if ($category != '')
        {
            $criteria->add(new TFilter('categoria_denominacion', '=', $category));
            $titulo = strtoupper($category);
        }

        $items = new TRepository('ViewArticulo');
        $items = $items->load($criteria, false);

        TTransaction::close();


        if ($items)
        {

            $blog['titulo'] = $titulo;
            $blog['entradas'] = $items;

            $data['contenido'] = $this->load->view('view_blog', $blog, true);
        }

        $data['recent'] = $this->get_recent_articles();

        $data['titulo'] = $titulo . ' | ' . $this->empresa;
        $data['site_name'] = $this->empresa;
        $data['img'] = $this->img;
        $this->load->view('layout', $data);

    }

    private function get_articles_by($categoria = 1, $limit = 5)
    {
        TTransaction::open('database');

        $criteria = new TCriteria;
        $param['order'] = 'idarticulo';
        $param['direction'] = 'desc';
        $criteria->setProperties($param);
        $criteria->setProperty('limit', $limit);
        $criteria->add(new TFilter('categoria_id', '=', $categoria));

        $items = new TRepository('ViewArticulo');
        $items = $items->load($criteria, false);


        TTransaction::close();

        if ($items)
        {
            return $items;
        }

        return $items;
    }

    private function get_client($limit = 3)
    {
        try
        {
            TTransaction::open('database');

            $criteria = new TCriteria;
            $param['order'] = 'id';
            $param['direction'] = 'desc';
            $criteria->setProperties($param);
            $criteria->setProperty('limit', $limit);
            //$criteria->add(new TFilter('categoria_id', '=', $categoria));


            $items = new TRepository('Client');
            $items = $items->load($criteria, false);


            TTransaction::close();

            if ($items)
            {
                return $items;
            }

            return $items;
        }
        catch (exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData($this->form->getData()); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
        
    }

    private function get_recent_articles($limit = 5)
    {
        TTransaction::open('database');

        $criteria = new TCriteria;
        $param['order'] = 'idarticulo';
        $param['direction'] = 'desc';
        $criteria->setProperties($param);
        $criteria->setProperty('limit', $limit);
        $criteria->add(new TFilter('tipo', '=', 'publicacion'));

        $items = new TRepository('ViewArticulo');
        $items = $items->load($criteria, false);


        TTransaction::close();

        if ($items)
        {
            return $items;
        }

        return array();
    }

    public function clear()
    {
        $CI = &get_instance();
        $path = $CI->config->item('cache_path');

        $cache_path = ($path == '') ? APPPATH . 'cache/' : $path;

        $handle = opendir($cache_path);
        while (($file = readdir($handle)) !== false)
        {
            //Leave the directory protection alone
            if ($file != '.htaccess' && $file != 'index.html')
            {
                @unlink($cache_path . '/' . $file);
            }
        }
        closedir($handle);
    }


    public function error_404()
    {
        $data['titulo'] = $this->titulo;
        $data['description'] = $this->description;
        $data['site_name'] = $this->empresa;
        $data['img'] = $this->img;
        
        
        $data['contenido'] = $this->load->view('error_404', $data, true);
        $this->load->view('layout', $data);
    }

}
