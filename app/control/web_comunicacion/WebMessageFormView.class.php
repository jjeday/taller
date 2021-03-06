<?php

/**
 * WebMessageFormView Form
 * @author  <your name here>
 */
class WebMessageFormView extends TPage
{
    /**
     * Show data
     */
    public function onView($param)
    {
        try
        {
            // convert parameter to object
            $data = (object)$param;

            // load the html template
            $html = new THtmlRenderer('app/resources/webmessageformview.html');
            $html->enableTranslation();

            // load CSS styles
            parent::include_css('app/resources/styles.css');

            TTransaction::open('database');
            if (isset($data->id))
            {
                // load customer identified in the form
                $object = WebMessage::find($data->id);
                if ($object)
                {
                    // create one array with the customer data
                    $array_object = $object->toArray();
                    $array_object['checked_string'] = ($array_object['checked'] == 'Y' ? _t('Yes') : _t('No'));

                    $array_object['user'] = '<b>'.$object->name.'</b> <br /> Telf: '.$object->name.'<br />Correo: '.$object->email;

                    // replace variables from the main section with the object data
                    $html->enableSection('main', $array_object);

                    if ($object->checked == 'N')
                    {
                        // user is the target of the message, is not checked yet
                        $html->enableSection('check', $array_object);
                    } else
                    {
                        // user is the target of the message, is already checked
                        $html->enableSection('recover', $array_object);
                    }
                } else
                {
                    throw new Exception(_t('Object ^1 not found in ^2', $data->id, 'SystemMessage'));
                }
            }

            TTransaction::close();

            $folders = new THtmlRenderer('app/resources/web_mail_folders.html');
            $folders->enableSection('main', []);
            $folders->enableTranslation();

            $hbox = new THBox;
            $hbox->style = 'width:100%';
            $hbox->add(TPanelGroup::pack('', $folders))->style = 'width: 20%;float:left;margin-right:10px';
            $hbox->add($html)->style = 'width: calc(80% - 15px);float:left';

            $bread = new TBreadCrumb;
            $bread->addHome();
            $bread->addItem('Mail');

            $vbox = new TVBox;
            $vbox->style = 'width: 100%';
            //$vbox->add($bread);
            $vbox->add($hbox);
            parent::add($vbox);
        }
        catch (exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }

    /**
     * Check message as read
     */
    public function onCheck($param)
    {
        try
        {
            TTransaction::open('database');
            $message = WebMessage::find($param['id']);
            if ($message)
            {
                $message->checked = 'Y';
                $message->store();
                TScript::create('update_messages_menu()');
            }
            TTransaction::close();
            AdiantiCoreApplication::loadPage('WebMessageList', 'filterInbox');
        }
        catch (exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }

    /**
     * Check message as unread
     */
    public function onUncheck($param)
    {
        try
        {
            TTransaction::open('database');
            $message = WebMessage::find($param['id']);
            if ($message)
            {
                $message->checked = 'N';
                $message->store();
                TScript::create('update_messages_menu()');
            }
            TTransaction::close();
            AdiantiCoreApplication::loadPage('WebMessageList', 'filterInbox');
        }
        catch (exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
