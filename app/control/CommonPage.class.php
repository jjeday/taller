<?php
class CommonPage extends TPage
{
    public function __construct()
    {
        parent::__construct();
        parent::add(new TLabel('Common page'));
        
        mail('dario@outlook.com.pe','silvio401@hotmail.com','Hola mundo');
    }
}
?>