<?php

require_once 'init.php';


$theme = $ini['general']['theme'];
$class = isset($_REQUEST['class']) ? $_REQUEST['class'] : '';
$public = in_array($class, $ini['permission']['public_classes']);
new TSession;
$site_url = '';


$url = "http://" . $_SERVER['HTTP_HOST'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];

//echo $url;

if (stripos($url, 'index.php?') === false)
{
    require_once 'CodeIgniter/index.php';
    exit;
}

//echo "hello";

$clientes = array('FormContacto');
if (in_array($class, $clientes))
{
    $theme = 'front2';
    $site_url = 'http://localhost/adianti/gaus/index.php';

    // $content  = ApplicationTranslator::translateTemplate($content);
    $content = file_get_contents("app/templates/{$theme}/layout.html");
    $content = str_replace('{LIBRARIES}', file_get_contents("app/templates/{$theme}/libraries.html"), $content);
    $content = str_replace('{SITE_URL}', $site_url, $content);
    $content = str_replace('{class}', $class, $content);
    $content = str_replace('{template}', $theme, $content);
    $content = str_replace('{username}', TSession::getValue('username'), $content);
    $content = str_replace('{frontpage}', TSession::getValue('frontpage'), $content);
    $content = str_replace('{query_string}', $_SERVER["QUERY_STRING"], $content);
    $css = TPage::getLoadedCSS();
    $js  = TPage::getLoadedJS();
    $content = str_replace('{HEAD}', $css . $js, $content);

    echo $content;
    
    if ($class)
    {
        $method = isset($_REQUEST['method']) ? $_REQUEST['method'] : null;
        AdiantiCoreApplication::loadPage($class, $method, $_REQUEST);
    }
    exit;
}








if (TSession::getValue('logged'))
{
    $content = file_get_contents("app/templates/{$theme}/layout.html");
    $menu_string = AdiantiMenuBuilder::parse('menu.xml', $theme);
    $content = str_replace('{MENU}', $menu_string, $content);
} else
{
    $content = file_get_contents("app/templates/{$theme}/login.html");
}

// $content  = ApplicationTranslator::translateTemplate($content);
$content = str_replace('{LIBRARIES}', file_get_contents("app/templates/{$theme}/libraries.html"), $content);
$content = str_replace('{SITE_URL}', $site_url, $content);
$content = str_replace('{class}', $class, $content);
$content = str_replace('{template}', $theme, $content);
$content = str_replace('{username}', TSession::getValue('username'), $content);
$content = str_replace('{frontpage}', TSession::getValue('frontpage'), $content);
$content = str_replace('{query_string}', $_SERVER["QUERY_STRING"], $content);
$css = TPage::getLoadedCSS();
$js = TPage::getLoadedJS();
$content = str_replace('{HEAD}', $css . $js, $content);

echo $content;

if (TSession::getValue('logged') or $public)
{
    if ($class)
    {
        $method = isset($_REQUEST['method']) ? $_REQUEST['method'] : null;
        AdiantiCoreApplication::loadPage($class, $method, $_REQUEST);
    }
} else
{
    AdiantiCoreApplication::loadPage('LoginForm', '', $_REQUEST);
}
