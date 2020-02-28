<?php

/**
 * FormArticulo Form
 * @author  Renán Darío Gonzales Apaza
 */
class FormArticulo extends TPage
{
    protected $form; // form

    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct($param)
    {
        parent::__construct();

        // creates the form
        $this->form = new TQuickForm('form_BlogArticulo');
        $this->form->class = 'tform'; // change CSS class
        $this->form = new BootstrapFormBuilder('form_BlogArticulo');
        $this->form->style = 'display: table;width:100%'; // change style
        //$this->form->setFieldsByRow(1);

        // define the form title
        $this->form->setFormTitle('BlogArticulo');

        // define the fields

        $criteria = new TCriteria;
        $criteria->add(new TFilter('visible', '=', 'Si'));

        $idarticulo = new TEntry('idarticulo');
        $categoria_id = new TDBCombo('categoria_id', 'database', 'BlogCategoria', 'idcategoria', 'denominacion', 'denominacion', $criteria);
        $titulo = new TEntry('titulo');
        $slug = new TEntry('slug');
        $image_head = new TFile('image_head');
        $contenido = new THtmlEditor('contenido');
        $tipo = new TCombo('tipo');
        $etiqueta = new TEntry('etiqueta');
        $visible = new TRadioGroup('visible');

        $marca = new TEntry('marca'); //
        $medida = new TEntry('medida'); //

        $tipo->addItems(array('vista' => 'Vista', 'publicacion' => 'Publicación'));
        $visible->addItems(array('Si' => 'Si', 'No' => 'No'));
        $visible->setLayout('horizontal');

        $idarticulo->setSize('100%');
        $categoria_id->setSize('100%');
        $titulo->setSize('100%');
        $slug->setSize('100%');
        $image_head->setSize('100%');
        $contenido->setSize('100%');
        $tipo->setSize('100%');
        $etiqueta->setSize('100%');

        $etiqueta->setTip('Escriba palabras clave separado por comas ( , )');


        $etiqueta->setSize('100%');
        $categoria_id->addValidation('Categoria Id', new TRequiredValidator);
        $titulo->addValidation('Titulo', new TRequiredValidator);
        //$slug->addValidation('Imagen Mini', new TRequiredValidator);
        //$image_head->addValidation('Image Head', new TRequiredValidator);
        $contenido->addValidation('Contenido', new TRequiredValidator);
        $tipo->addValidation('Tipo', new TRequiredValidator);
        $etiqueta->addValidation('Etiqueta', new TRequiredValidator);


        $this->form->addFields([new TLabel('ID')], [$idarticulo]);
        $this->form->addFields([new TLabel('Categoria')], [$categoria_id]);
        $this->form->addFields([new TLabel('Titulo')], [$titulo]);
        //$this->form->addFields([new TLabel('Titulo SEO')], [$slug]);
        $this->form->addFields([new TLabel('Image Head')], [$image_head]);
        $this->form->addFields([new TLabel('Contenido')], [$contenido]);
        $this->form->addFields([new TLabel('Tipo')], [$tipo], [new TLabel('Visible')], [$visible]);

        $this->form->addFields([new TLabel('Etiqueta')], [$etiqueta]);

        $this->form->addFields([new TLabel('Marca')], [$marca]); //
        $this->form->addFields([new TLabel('Medida')], [$medida]); //


        $contenido->setSize('100%', 500);

        if (!empty($idarticulo))
        {
            $idarticulo->setEditable(false);
        }

        /** samples
         * $this->form->addQuickFields('Date', array($date1, new TLabel('to'), $date2)); // side by side fields
         * $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
         * $fieldX->setSize( 100, 40 ); // set size
         **/

        // create the form actions
        $save = $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o');
        $new = $this->form->addAction(_t('New'), new TAction(array($this, 'onClear')), 'bs:plus-sign green');
        $list = $this->form->addAction(_t('List'), new TAction(array('ListArticulo', 'onLoad')), 'bs:list');


        ##BOOTSTRAP##
        
        TSession::setValue('image_head','____none___');

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);

        parent::add($container);
    }

    /**
     * Save form data
     * @param $param Request
     */
    public function onSave($param)
    {
        try
        {
            TTransaction::open('database'); // open a transaction

            /**
             * // Enable Debug logger for SQL operations inside the transaction
             * TTransaction::setLogger(new TLoggerSTD); // standard output
             * TTransaction::setLogger(new TLoggerTXT('log.txt')); // file
             **/

            $this->form->validate(); // validate form data

            $object = (empty($data->idgrupo)) ? new BlogArticulo : new BlogArticulo($data->idarticulo, true); // create an empty object
            $data = $this->form->getData(); // get form data as array
            $object->fromArray((array )$data); // load the object with data

            $object->slug = $this->url_title($object->titulo, '-');


            if ($data->image_head != '')
            {
                $source_file = 'tmp/' . $data->image_head;

                if (file_exists($source_file))
                {

                    $rand = rand(1, 1000);
                    $target_file = 'uploads/' . $rand . '_' . $data->image_head;
                    rename($source_file, $target_file);
                    $object->image_head = $rand . '_' . $data->image_head;

                    $icon = new Thumb();
                    $icon->loadImage('uploads/' . $object->image_head);
                    $icon->crop(370, 240, 'center');
                    
                    $image = fopen('uploads/thumb_' . $object->image_head, 'w+');
                    if (fwrite($image, $icon->getContents()) === false)
                    {
                        unlink($image);
                        throw new Exception('No se puede crear ' . $image);
                    }
                    fclose($image);


                    $object->icon = 'thumb_' . $object->image_head;

                    if ($object->image_head != TSession::getValue('image_head'))
                    {
                        if (file_exists('uploads/' . TSession::getValue('image_head')))
                        {
                            unlink('uploads/' . TSession::getValue('image_head'));
                        }
                        if (file_exists('uploads/thumb_' . TSession::getValue('image_head')))
                        {
                            unlink('uploads/thumb_' . TSession::getValue('image_head'));
                        }
                        
                        TSession::setValue('image_head', $object->image_head);
                    }
                }
            }


            $object->store(); // save the object

            // get the generated idarticulo
            $data->idarticulo = $object->idarticulo;

            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction

            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
        }
        catch (exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData($this->form->getData()); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
     * Clear form data
     * @param $param Request
     */
    public function onClear($param)
    {
        $this->form->clear();
    }

    /**
     * Load object to form data
     * @param $param Request
     */
    public function onEdit($param)
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key']; // get the parameter $key
                TTransaction::open('database'); // open a transaction
                $object = new BlogArticulo($key); // instantiates the Active Record
                $this->form->setData($object); // fill the form
                TSession::setValue('image_head', $object->image_head);
                TTransaction::close(); // close the transaction
            } else
            {
                $this->form->clear();
            }
        }
        catch (exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    

    public function url_title($str, $separator = '-', $lowercase = false)
    {
        define('UTF8_ENABLED', false);

        if ($separator === 'dash')
        {
            $separator = '-';
        } elseif ($separator === 'underscore')
        {
            $separator = '_';
        }

        $q_separator = preg_quote($separator, '#');

        $trans = array(
            '&.+?;' => '',
            '[^\w\d _-]' => '',
            '\s+' => $separator,
            '(' . $q_separator . ')+' => $separator);

        $str = strip_tags($str);
        foreach ($trans as $key => $val)
        {
            $str = preg_replace('#' . $key . '#i' . (UTF8_ENABLED ? 'u' : ''), $val, $str);
        }

        if ($lowercase === true)
        {
            $str = strtolower($str);
        }

        return trim(trim($str, $separator));
    }
}
