<?php
/**
 * FormCategoria Form List
 * @author  Renán Darío Gonzales Apaza
 */
class FormCategoria extends TPage
{
	protected $form; // form
	private $datagrid; // listing
	private $pageNavigation;
	private $formgrid;
	private $loaded;
	private $deleteButton;
    
    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct( $param )
    {
        parent::__construct();
        
        // creates the form
        $this->form = new TQuickForm('form_BlogCategoria');
        $this->form->class = 'tform'; // change CSS class
        		$this->form = new  BootstrapFormBuilderLTE('form_BlogCategoria');
        $this->form->style = 'display: table;width:100%'; // change style
        $this->form->setFormTitle('Categorias');
        //$this->form->setFieldsByRow(1);
        
		// define the fields
        $idcategoria = new TEntry('idcategoria');
        $denominacion = new TEntry('denominacion');


$idcategoria->setSize('100%');
$denominacion->setSize('100%');


$denominacion->addValidation('Denominacion', new TRequiredValidator);


$this->form->addFields([new TLabel('Idcategoria')], [$idcategoria]);
$this->form->addFields([new TLabel('Denominacion')], [$denominacion]);




        if (!empty($idcategoria))
        {
            $idcategoria->setEditable(FALSE);
        }
        /** samples
         $this->form->addQuickFields('Date', array($date1, new TLabel('to'), $date2)); // side by side fields
         $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
         $fieldX->setSize( 100, 40 ); // set size
         **/
         
        // create the form actions
        $save = $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o');
        $new = $this->form->addAction(_t('New'),  new TAction(array($this, 'onClear')), 'bs:plus-sign green');
        //$list = $this->form->addAction(_t('List'),  new TAction(array($this, 'onLoad')), 'bs:plus-sign green');
        
        // creates a Datagrid
        $this->datagrid = new TDataGrid;
        		$this->datagrid = new BootstrapDatagridWrapper( new TQuickGrid );
        $this->datagrid->style = 'width: 100%';
        // $this->datagrid->datatable = 'true';
// $this->datagrid->makeScrollable();
// $this->datagrid->disableDefaultClick();
// $this->datagrid->setGroupColumn('city', '<b>City</b>: <i>{city}</i>');
        // $this->datagrid->enablePopover('Popover', 'Hi <b> {name} </b>');
        
// define columns
        $column_idcategoria = new TDataGridColumn('idcategoria', 'ID', 'left');
        $this->datagrid->addColumn($column_idcategoria);
        $order_idcategoria = new TAction(array($this, 'onReload'));
        $order_idcategoria->setParameter('order', 'idcategoria');##PARAMETERS##
        $column_idcategoria->setAction($order_idcategoria);
        
        $idcategoria_edit = new TDataGridAction(array($this, 'onInlineEdit'));
        $idcategoria_edit->setField('idcategoria');##PARAMETERS##
        $column_idcategoria->setEditAction($idcategoria_edit);
        
        $column_denominacion = new TDataGridColumn('denominacion', 'DenominaciÃ³n', 'left');
        $this->datagrid->addColumn($column_denominacion);
        $order_denominacion = new TAction(array($this, 'onReload'));
        $order_denominacion->setParameter('order', 'denominacion');##PARAMETERS##
        $column_denominacion->setAction($order_denominacion);
        
        $denominacion_edit = new TDataGridAction(array($this, 'onInlineEdit'));
        $denominacion_edit->setField('idcategoria');##PARAMETERS##
        $column_denominacion->setEditAction($denominacion_edit);
        

        
        // creates two datagrid actions
        $action_edit = new TDataGridAction(array($this, 'onEdit'));
        $action_edit->setUseButton(FALSE);
        $action_edit->setButtonClass('btn btn-default');
        $action_edit->setLabel(_t('Edit'));
        $action_edit->setImage('fa:pencil-square-o blue fa-lg');
        $action_edit->setField('idcategoria');
        


        // create DELETE action
        $action_del = new TDataGridAction(array($this, 'onDelete'));
        $action_del->setUseButton(FALSE);
        $action_del->setButtonClass('btn btn-default');
        $action_del->setLabel(_t('Delete'));
        $action_del->setImage('fa:trash-o red fa-lg');
        $action_del->setField('idcategoria');
       


        $this->datagrid->addAction($action_edit);
        $this->datagrid->addAction($action_del);

        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
##LIST_FORM_COLLECTION##

##BOOTSTRAP##

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add(TPanelGroup::pack('', $this->datagrid));
        $container->add($this->pageNavigation);
        
        parent::add($container);
    }




    /**
     * Load the datagrid with data
     */
    public function onReload($param = NULL)
    {
        try
        {
            // open a transaction with database 'database'
            TTransaction::open('database');
            
            // creates a repository for BlogCategoria
            $repository = new TRepository('BlogCategoria');
            $limit = 10;
            // creates a criteria
            $criteria = new TCriteria;
            
            // default order
            if (empty($param['order']))
            {
                $param['order'] = 'idcategoria';
                $param['direction'] = 'asc';
            }
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);
            
            if (TSession::getValue('BlogCategoria_filter'))
            {
                // add the filter stored in the session to the criteria
                $criteria->add(TSession::getValue('BlogCategoria_filter'));
            }
            
            // load the objects according to criteria
            $objects = $repository->load($criteria, FALSE);
            
            if(is_callable($this->transformCallback)){
				call_user_func($this->transformCallback, $objects, $param);
			}
            
            $this->datagrid->clear();
            if ($objects)
            {
                // iterate the collection of active records
                foreach ($objects as $object)
                {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($object);
                }
            }
            
            // reset the criteria for record count
            $criteria->resetProperties();
            $count= $repository->count($criteria);
            
            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit
            
            // close the transaction
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
    
    /**
     * Ask before deletion
     */
    public function onDelete($param)
    {
        // define the delete action
        $action = new TAction(array($this, 'Delete'));
        $action->setParameters($param); // pass the key parameter ahead
        
        // shows a dialog to the user
        new TQuestion(TAdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);
    }
    
    /**
     * Delete a record
     */
    public function Delete($param)
    {
        try
        {
            $key=$param['key']; // get the parameter $key
            TTransaction::open('database'); // open a transaction with database
            $object = new BlogCategoria($key, FALSE); // instantiates the Active Record
            $object->delete(); // deletes the object from the database
            TTransaction::close(); // close the transaction
            $this->onReload( $param ); // reload the listing
            new TMessage('info', TAdiantiCoreTranslator::translate('Record deleted')); // success message
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Save form data
     * @param $param Request
     */
    public function onSave( $param )
    {
        try
        {
            TTransaction::open('database'); // open a transaction
            
            /**
            // Enable Debug logger for SQL operations inside the transaction
            TTransaction::setLogger(new TLoggerSTD); // standard output
            TTransaction::setLogger(new TLoggerTXT('log.txt')); // file
            **/
            
            $this->form->validate(); // validate form data
            $data = $this->form->getData(); // get form data as array
            
            $object = (empty($data->idgrupo)) ? new BlogCategoria : new BlogCategoria($data->idcategoria, true); // create an empty object
            $object->fromArray( (array) $data); // load the object with data
            $object->store(); // save the object
            
            // get the generated idcategoria
            $data->idcategoria = $object->idcategoria;
            
            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction
            
            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved')); // success message
            $this->onReload(); // reload the listing
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Clear form data
     * @param $param Request
     */
    public function onClear( $param )
    {
        $this->form->clear();
    }
    
    /**
     * Load object to form data
     * @param $param Request
     */
    public function onEdit( $param )
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open('database'); // open a transaction
                $object = new BlogCategoria($key); // instantiates the Active Record
                $this->form->setData($object); // fill the form
                TTransaction::close(); // close the transaction
            }
            else
            {
                $this->form->clear();
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
##LIST_DELETE_COLLECTION##

##LIST_FORMAT_CHECK##
    
/**
     * Inline record editing
     * @param $param Array containing:
     *              key: object ID value
     *              field name: object attribute to be updated
     *              value: new attribute content 
     */
    public function onInlineEdit($param)
    {
        try
        {
            // get the parameter $key
            $field = $param['field'];
            $key   = $param['key'];
            $value = $param['value'];
            
            TTransaction::open('database'); // open a transaction with database
            $object = new BlogCategoria($key); // instantiates the Active Record
            $object->{$field} = $value;
            $object->store(); // update the object in the database
            TTransaction::close(); // close the transaction
            
            $this->onReload($param); // reload the listing
            new TMessage('info', "Record Updated");
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * method show()
     * Shows the page
     */
    public function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded AND (!isset($_GET['method']) OR $_GET['method'] !== 'onReload') )
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }
}
