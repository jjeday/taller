<?php

trait traitBlogProduct
{
    public function onBeforeStore($object)
    {

        if (!isset($object->id) || $object->id == '') {
            $object->creating_user = TSession::getValue('login');
            $object->creating_date = date('Y-m-d H:i:s');
            $object->updating_user = TSession::getValue('login');
            $object->updating_date = date('Y-m-d H:i:s');
        } else {
            $object->updating_user = TSession::getValue('login');
            $object->updating_date = date('Y-m-d H:i:s');
        }
    }
}

?>

