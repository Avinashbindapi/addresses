<?php

function my_autoloader($class)
{
    $classPath = APP_PATH . '/classes/' . $class . '.php';
    $controllerPath = APP_PATH . '/classes/controller/' . $class . '.php';
    $modelPath = APP_PATH . '/classes/model/' . $class . '.php';

    if (file_exists($classPath)) {
        include $classPath;
    } elseif (file_exists($controllerPath)) {
        include $controllerPath;
    } elseif (file_exists($modelPath)) {
        include $modelPath;
    }
}
spl_autoload_register('my_autoloader');

function is_ajax_request()
{
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function include_template($template, $variables = [])
{
    extract($variables);
    ob_start();
    include $template;
    return ob_get_clean();
}

function include_template_with_headers($template, $variables = [])
{
    $html = include_template(APP_PATH . '/theme/header.php');
    $html .= include_template($template, $variables);
    $html .= include_template (APP_PATH . '/theme/footer.php');
    return $html;
}