<?php

function url_title($str, $separator = 'dash', $lowercase = false)
{
    $str = strtr($str, $array = array(
        "�" => "A",
        "�" => "A",
        "�" => "A",
        "�" => "A",
        "�" => "A",
        "�" => "A",
        "�" => "a",
        "�" => "a",
        "�" => "a",
        "�" => "a",
        "�" => "a",
        "�" => "a",
        "�" => "O",
        "�" => "O",
        "�" => "O",
        "�" => "O",
        "�" => "O",
        "�" => "O",
        "�" => "o",
        "�" => "o",
        "�" => "o",
        "�" => "o",
        "�" => "o",
        "�" => "o",
        "�" => "E",
        "�" => "E",
        "�" => "E",
        "�" => "E",
        "�" => "e",
        "�" => "e",
        "�" => "e",
        "�" => "e",
        "�" => "C",
        "�" => "c",
        "�" => "I",
        "�" => "I",
        "�" => "I",
        "�" => "I",
        "�" => "i",
        "�" => "i",
        "�" => "i",
        "�" => "i",
        "�" => "U",
        "�" => "U",
        "�" => "U",
        "�" => "U",
        "�" => "u",
        "�" => "u",
        "�" => "u",
        "�" => "u",
        "�" => "y",
        "�" => "N",
        "�" => "n"));
    if ($separator == 'dash')
    {
        $search = '_';
        $replace = '-';
    } else
    {
        $search = '-';
        $replace = '_';
    }

    $trans = array(
        '&\#\d+?;' => '',
        '&\S+?;' => '',
        '\s+' => $replace,
        '[^a-z0-9\-\._]' => '',
        $replace . '+' => $replace,
        $replace . '$' => $replace,
        '^' . $replace => $replace,
        '\.+$' => '');

    $str = strip_tags($str);

    foreach ($trans as $key => $val)
    {
        $str = preg_replace("#" . $key . "#i", $val, $str);
    }

    if ($lowercase === true)
    {
        $str = strtolower($str);
    }
    return trim(stripslashes($str));
}
