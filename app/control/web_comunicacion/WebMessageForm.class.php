<?php
/**
 * WebMessageForm Registration
 * @author  <your name here>
 */
class WebMessageForm extends TWindow
{
    protected $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        parent::setSize(0.8, 430);
        parent::setTitle( _t('Send message') );
        
        // creates the form
        $this->form = new BootstrapFormWrapper(new TQuickForm('form_SystemMessage'));
        $this->form->style = 'display: table;width:100%'; // change style
        
        // create the form fields
        $correo = new TEntry('email');
        $subject = new TEntry('subject');
        $message = new TText('message');

        // add the fields
        $this->form->addQuickField('Correo', $correo,  '70%', new TEmailValidator);
        $this->form->addQuickField(_t('Subject'), $subject,  '70%', new TRequiredValidator );
        $this->form->addQuickField(_t('Message'), $message,  '70%', new TRequiredValidator );
        $message->setSize('70%', '100');
        
        // create the form actions
        $this->form->addQuickAction(_t('Send'), new TAction(array($this, 'onSend')), 'fa:envelope-o');
        $this->form->addQuickAction(_t('Clear form'),  new TAction(array($this, 'onClear')), 'fa:eraser red');
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(TPanelGroup::pack(_t('Message'), $this->form));
        
        parent::add($container);
    }
    
    public function onClear($param)
    {
    
    }
    
    public function onSend($param)
    {
        try
        {
            // open a transaction with database
            TTransaction::open('database');
            
            // get the form data
            $data = $this->form->getData();
            // validate data
            $this->form->validate();
            
            $object = new WebMessage;
            
            $object->enviado_por = TSession::getValue('login');
            $object->mensaje_tipo = 'Enviado';
            $object->subject = $data->subject;
            $object->message = $data->message;
            $object->email = $data->email;
            $object->name = $data->email;
            
            $object->dt_message = date('Y-m-d H:i:s');
            $object->checked = 'N';
            
            // stores the object
            $object->store();
            
            // fill the form with the active record data
            $this->form->setData($data);
            
            TTransaction::open('permission');

            $preferences = SystemPreference::getAllPreferences();
            if ($preferences)
            {
                //https://myaccount.google.com/lesssecureapps
                $mail = new TMail;
                $mail->setFrom('NO-RESPONDER@academiagauss.net','GAUSS');
                $mail->setSubject($data->subject);
                $mail->setHtmlBody($data->message);
                $mail->addAddress($data->email);
                $mail->SetUseSmtp();
                $mail->SetSmtpHost($preferences['smtp_host'], $preferences['smtp_port']);
                $mail->SetSmtpUser($preferences['smtp_user'], $preferences['smtp_pass']);
                $mail->setReplyTo('NO-RESPONDER@academiagauss.net');
                $mail->send();
            }

            TTransaction::close();
            
            // close the transaction
            TTransaction::close();
            
            // shows the success message
            new TMessage('info', _t('Message sent successfully'));
            
            
            parent::closeWindow();
            return $object;
            
            
        }
        catch (Exception $e) // in case of exception
        {
            // get the form data
            $object = $this->form->getData();
            
            // fill the form with the active record data
            $this->form->setData($object);
            
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
}
