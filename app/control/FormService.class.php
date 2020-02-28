<?php

/**
 * FormArticulo Form
 * @author  Renán Darío Gonzales Apaza
 */
class FormService extends TPage
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
        $this->form = new TQuickForm('form_BlogService');
        $this->form->class = 'tform'; // change CSS class
        $this->form = new BootstrapFormBuilder('form_BlogService');
        $this->form->style = 'display: table; width:100%'; // change style
        //$this->form->setFieldsByRow(1);

        // define the form title
        $this->form->setFormTitle('Servicios');

        // define the fields

        $criteria = new TCriteria;
        $criteria->add(new TFilter('visible', '=', 1));

        /*echo $criteria->dump();*/

        $id = new TEntry('id'); 
        $name = new TEntry('name');
        $image = new TFile('image');
        $description = new TText('description');
        $visible = new TRadioGroup('visible');



        //$tipo->addItems(array('vista' => 'Vista', 'publicacion' => 'Publicación'));
        $visible->addItems(array(1 => 'Si', 0 => 'No'));
        $visible->setLayout('horizontal');

        $id->setSize('100%');
        $name->setSize('100%');
        $image->setSize('100%');
        $description->setSize('100%');        
        //$tipo->setSize('100%');
        //$etiqueta->setSize('100%');

        $name->setTip('Escriba nombre de servicio');
        $description->setSize('Escriba una descripción del serivicio');
        //$colores->setTip('Escriba los colores separado por comas ( , )');
        //$etiqueta->setSize('100%');


        //$categoria_id->addValidation('Categoria Id', new TRequiredValidator);
        //$titulo->addValidation('Titulo', new TRequiredValidator);
        //$slug->addValidation('Imagen Mini', new TRequiredValidator);
        //$image_head->addValidation('Image Head', new TRequiredValidator);
        //$contenido->addValidation('Contenido', new TRequiredValidator);
        //$tipo->addValidation('Tipo', new TRequiredValidator);
        $name->addValidation('Nombre de servicio', new TRequiredValidator);
        $image->addValidation('Imagen', new TRequiredValidator);
        $description->addValidation('Comentario', new TRequiredValidator);
        


        $this->form->addFields([new TLabel('ID')], [$id]);

        //$this->form->addFields([new TLabel('Categoria')], [$categoria_id]);
        $this->form->addFields([new TLabel('Nombre')], [$name]);
        //$this->form->addFields([new TLabel('Titulo SEO')], [$slug]);
        
        //$this->form->addFields([new TLabel('Contenido')], [$contenido]);
        //$this->form->addFields([new TLabel('Tipo')], [$tipo], [new TLabel('Visible')], [$visible]);
        
        $this->form->addFields([new TLabel('Imagen')], [$image]);
        $this->form->addFields([new TLabel('Descripción')], [$description]); //
        
        $this->form->addFields([new TLabel('Visible')], [$visible]);
        
        $description->setSize('100%', 200);

        if (!empty($id))
        {
            $id->setEditable(false);
        }

        /** samples
         * $this->form->addQuickFields('Date', array($date1, new TLabel('to'), $date2)); // side by side fields
         * $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
         * $fieldX->setSize( 100, 40 ); // set size
         **/

        // create the form actions
        $save = $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o green');
        $new = $this->form->addAction(_t('New'), new TAction(array($this, 'onClear')), 'bs:plus-sign green');
        $list = $this->form->addAction(_t('List'), new TAction(array('ListService', 'onLoad')), 'bs:list green');


        ##BOOTSTRAP##
        
        TSession::setValue('image','____none___');

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

            $data = $this->form->getData(); // get form data as array            

            $object = (empty($data->id)) ? new BlogService : new BlogService($data->id, true); // create an empty object
            $object->fromArray((array)$data); // load the object with data

            //$object->slug = $this->url_title($object->name, '-');


            if ($data->image != '')
            {
                $source_file = 'tmp/' . $data->image;

                if (file_exists($source_file))
                {

                    //$rand = rand(1, 1000);
                    //$date=new DateTime();
                    $date = new DateTime();
                    $result = $date->format('YmdHis');

                    $target_file = 'uploads/' . $result . '_' . $data->image;
                    rename($source_file, $target_file);
                    $object->image = $result . '_' . $data->image;

                    $icon = new Thumb();
                    $icon->loadImage('uploads/' . $object->image);
                    $icon->crop(370, 240, 'center');
                    
                    $image = fopen('uploads/thumb_' . $object->image, 'w+');
                    if (fwrite($image, $icon->getContents()) === false)
                    {
                        unlink($image);
                        throw new Exception('No se puede crear ' . $image);
                    }
                    fclose($image);


                    $object->image_head = 'thumb_' . $object->image;

                    if ($object->image != TSession::getValue('image'))
                    {
                        if (file_exists('uploads/' . TSession::getValue('image')))
                        {
                            unlink('uploads/' . TSession::getValue('image'));
                        }
                        if (file_exists('uploads/thumb_' . TSession::getValue('image')))
                        {
                            unlink('uploads/thumb_' . TSession::getValue('image'));
                        }
                        
                        TSession::setValue('image', $object->image);
                    }
                }
            }


            $object->store(); // save the object

            // get the generated idarticulo
            $data->id = $object->id;

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
                $object = new BlogCatalogo($key); // instantiates the Active Record
                $this->form->setData($object); // fill the form
                echo $object->image;
                TSession::setValue('image', $object->image);
                TSession::setValue('image_head', $object->image_head);
                TTransaction::close(); // close the transaction
            } else {
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
