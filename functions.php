<?php

use duncan3dc\Laravel\BladeInstance;
use Illuminate\Config\Repository;
use Symfony\Component\VarDumper\Cloner\Data;

if (PHP_SAPI == 'cli') {
    define('CACHE', __DIR__ . '/json/');
    define('CONFIG', __DIR__ . '/config/');
    define('DOCUMENT_ROOT', __DIR__);
} else {
    define('CACHE', $_SERVER['DOCUMENT_ROOT'] . 'json/');
    define('CONFIG', $_SERVER['DOCUMENT_ROOT'] . 'config/');
    define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
}

function getCurrent($type = 'domain')
{
    switch ($type) {
        case 'domain':
            return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            break;
        case 'url':
            return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            break;

        default:
            return 'Type : domain|url';
            break;

    }
}

function config($configFiles)
{
    $dir = DOCUMENT_ROOT;

    if (php_sapi_name() === 'cli') {
        $dir = getcwd();
    }
    if (strpos($configFiles, '.') !== false) {
        $getData = explode('.', $configFiles);
        $configFile = $getData[0];
        $params = implode('.', array_slice($getData, 1));
    } else {
        $configFile = $configFiles;
    }

    if (!file_exists($dir . '/config/' . $configFile . '.php')) {
        return;
    }

    $config = new Repository(require $dir . '/config/' . $configFile . '.php');

    if (strpos($configFiles, '.') !== false) {
        return $config->get($params);
    }

    return $config->all();
}

function render($template, $data = [])
{
    $blade = new BladeInstance(DOCUMENT_ROOT . '/views', DOCUMENT_ROOT . '/cache');

    $html = $blade->render($template, $data);
    return $html;

}
function view(string $template, $data = [], $echo = true)
{
    $blade = new BladeInstance(DOCUMENT_ROOT . '/views', DOCUMENT_ROOT . '/cache');

    if (!$echo) {
        return $blade->render($template, $data);
    }

    echo $html = $blade->render($template, $data);

    // echo sanitize_output($html);
    // echo sanitize_output($html);
}

function response($type = 'html', $data = '')
{

    switch ($type) {
        case 'html':
            return React\Http\Message\Response::html($data);

            break;

        default:
            # code...
            break;
    }
}
