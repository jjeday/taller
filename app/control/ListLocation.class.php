<?php

/**
 * ListArticulo Listing
 * @author  Renán Darío Gonzales Apaza
 */
class ListLocation extends TPage
{
    private $form; // form
    private $datagrid; // listing
    private $pageNavigation;
    private $formgrid;
    private $loaded;
    private $deleteButton;

    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();

        // creates the form
        $this->form = new TQuickForm('form_search_BlogLocation');
        $this->form->class = 'tform'; // change CSS class
        $this->form = new BootstrapFormWrapper(new TQuickForm);
        $this->form->style = 'display: table;width:100%'; // change style
        $this->form->setFormTitle('Nosotros');

        // define the fields
        $address = new TEntry('address');
        $phone = new TEntry('phone');
        $email = new TEntry('email');
        $schedule = new TEntry('schedule');
        //$description = new TEntry('description');
        //$visible = new TEntry('visible');


        //$this->form->addQuickField('Categoria', $categoria_id, '100%' /*, new TRequiredValidator */ );
        $this->form->addQuickField('Dirección', $address, '100%' /*, new TRequiredValidator */ );
        $this->form->addQuickField('Teléfono', $phone, '100%' /*, new TRequiredValidator */ );
        $this->form->addQuickField('Email', $email, '100%' /*, new TRequiredValidator */ );
        $this->form->addQuickField('Horario', $schedule, '100%' /*, new TRequiredValidator */ );
        //$this->form->addQuickField('Vis', $company, '100%' /*, new TRequiredValidator */ );


        // keep the form filled during navigation with session data
        $this->form->setData(TSession::getValue('BlogLocation_filter_data'));

        // add the search form actions
        $this->form->addQuickAction(_t('Find'), new TAction(array($this, 'onSearch')), 'fa:search');
        $this->form->addQuickAction(_t('New'), new TAction(array('FormLocation', 'onEdit')), 'bs:plus-sign green');

        // creates a Datagrid
        $this->datagrid = new TDataGrid;
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->style = 'width: 100%';
        // $this->datagrid->datatable = 'true';
        // $this->datagrid->makeScrollable();
        // $this->datagrid->disableDefaultClick();
        // $this->datagrid->setGroupColumn('city', '<b>City</b>: <i>{city}</i>');
        // $this->datagrid->enablePopover('Popover', 'Hi <b> {name} </b>');

        // define columns
        $column_id = new TDataGridColumn('id', 'ID', 'left');
        $this->datagrid->addColumn($column_id);
        $column_address = new TDataGridColumn('address', 'Dirección', 'left');
        $this->datagrid->addColumn($column_address);
        $column_phone = new TDataGridColumn('phone', 'Teléfono', 'left');
        $this->datagrid->addColumn($column_phone);
        $column_email = new TDataGridColumn('email', 'Email', 'left');
        $this->datagrid->addColumn($column_email);
        $column_schedule = new TDataGridColumn('schedule', 'Horario', 'left');
        $this->datagrid->addColumn($column_schedule);
        $column_visible = new TDataGridColumn('visible', 'Visible', 'left');
        $this->datagrid->addColumn($column_visible);


        // create EDIT action
        $action_edit = new TDataGridAction(array('FormLocation', 'onEdit'));
        $action_edit->setUseButton(false);
        $action_edit->setButtonClass('btn btn-default');
        $action_edit->setLabel(_t('Edit'));
        $action_edit->setImage('fa:pencil-square-o blue fa-lg');
        $action_edit->setField('id');
        //$this->datagrid->addAction($action_edit);


        // create DELETE action
        $action_del = new TDataGridAction(array($this, 'onDelete'));
        $action_del->setUseButton(false);
        $action_del->setButtonClass('btn btn-default');
        $action_del->setLabel(_t('Delete'));
        $action_del->setImage('fa:trash-o red fa-lg');
        $action_del->setField('id');


        $this->datagrid->addAction($action_edit);
        $this->datagrid->addAction($action_del);

        // create the datagrid model
        $this->datagrid->createModel();

        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());

        ##LIST_FORM_COLLECTION##

        $panel = new TPanelGroup('Ubicaciones');
        $panel->add($this->form);
        $this->alertBox = new TElement('div');

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->alertBox);
        $container->add($panel);
        $container->add(TPanelGroup::pack('', $this->datagrid));
        $container->add($this->pageNavigation);

        parent::add($container);
    }

    public function onLoad($param)
    {

    }


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
            $key = $param['key'];
            $value = $param['value'];

            TTransaction::open('database'); // open a transaction with database
            $object = new BlogLocation($key); // instantiates the Active Record
            $object->{$field} = $value;
            $object->store(); // update the object in the database
            TTransaction::close(); // close the transaction

            $this->onReload($param); // reload the listing
            new TMessage('info', "Record Updated");
        }
        catch (exception $e) // in case of exception
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
     * Register the filter in the session
     */
    public function onSearch()
    {
        // get the search form data
        $data = $this->form->getData();

        // clear session filters
        // define the filter field
        $filters = array();
        TSession::setValue('BlogLocation_filters', array());
        TSession::setValue('BlogLocation_id', '');
        TSession::setValue('BlogLocation_name', '');
        TSession::setValue('BlogLocation_tipo', '');
        // check if the user has filled the form

        if ($data->address)
        {
            // creates a filter using what the user has typed
            $filter = new TFilter('address', 'Like', "%{$data->address}%");

            // stores the filter in the session
            TSession::setValue('BlogLocation_address', $data->address);
            $filters[] = $filter;
        }

        if ($data->phone)
        {
            // creates a filter using what the user has typed
            $filter = new TFilter('phone', 'Like', "%{$data->phone}%");

            // stores the filter in the session
            TSession::setValue('BlogLocation_phone', $data->phone);
            $filters[] = $filter;
        }

        if ($data->email)
        {
            // creates a filter using what the user has typed
            $filter = new TFilter('email', 'Like', "%{$data->email}%");

            // stores the filter in the session
            TSession::setValue('BlogLocation_email', $data->email);
            $filters[] = $filter;
        }

        if ($data->schedule)
        {
            // creates a filter using what the user has typed
            $filter = new TFilter('schedule', 'Like', "%{$data->schedule}%");

            // stores the filter in the session
            TSession::setValue('BlogLocation_schedule', $data->schedule);
            $filters[] = $filter;
        }


        // fill the form with data again
        $this->form->setData($data);
        TSession::setValue('BlogLocation_filter_data', $data);

        // keep the search data in the session
        TSession::setValue('BlogLocation_filters_data', $filters);

        $param = array();
        $param['offset'] = 0;
        $param['first_page'] = 1;
        $this->onReload($param);
    }

    /**
     * Load the datagrid with data
     */
    public function onReload($param = null)
    {
        try
        {
            // open a transaction with database 'database'
            TTransaction::open('database');

            // creates a repository for BlogArticulo
            $repository = new TRepository('BlogLocation');
            $limit = 10;
            // creates a criteria
            $criteria = new TCriteria;

            // default order
            if (empty($param['order']))
            {
                $param['order'] = 'id';
                $param['direction'] = 'asc';
            }
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);


            if (TSession::getValue('BlogLocation_filters_data'))
            {
                foreach (TSession::getValue('BlogLocation_filters_data') as $filter)
                {
                    if ($filter instanceof TFilter)
                    {
                        // add the filter stored in the session to the criteria
                        $criteria->add($filter);
                    }
                }
            }


            // load the objects according to criteria
            $objects = $repository->load($criteria, false);

            if (is_callable($this->transformCallback))
            {
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
            $count = $repository->count($criteria);

            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit

            // close the transaction
            TTransaction::close();
            $this->loaded = true;
        }
        catch (exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage());
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
        new TQuestion(AdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);
    }

    /**
     * Delete a record
     */
    public function Delete($param)
    {
        try
        {
            $key = $param['key']; // get the parameter $key
            TTransaction::open('database'); // open a transaction with database
            $object = new BlogLocation($key, false); // instantiates the Active Record
            $object->delete(); // deletes the object from the database
            TTransaction::close(); // close the transaction
            $this->onReload($param); // reload the listing
            new TMessage('info', AdiantiCoreTranslator::translate('Record deleted')); // success message
        }
        catch (exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    ##LIST_DELETE_COLLECTION##

    ##LIST_FORMAT_CHECK##

    /**
     * method show()
     * Shows the page
     */
    public function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded and (!isset($_GET['method']) or !(in_array($_GET['method'], array('onReload', 'onSearch')))))
        {
            if (func_num_args() > 0)
            {
                $this->onReload(func_get_arg(0));
            } else
            {
                $this->onReload();
            }
        }
        parent::show();
    }
}
