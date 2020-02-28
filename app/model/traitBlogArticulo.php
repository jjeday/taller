<?php

trait traitBlogArticulo
{
    public function onBeforeStore($object)
    {

        if (!isset($object->idarticulo) || $object->idarticulo == '') {
            $object->user_creacion = TSession::getValue('login');
            $object->fecha_creacion = date('Y-m-d H:i:s');
            $object->user_modificacion = TSession::getValue('login');
            $object->fecha_modificacion = date('Y-m-d H:i:s');
        } else {
            $object->user_modificacion = TSession::getValue('login');
            $object->fecha_modificacion = date('Y-m-d H:i:s');
        }
    }
}

?>

