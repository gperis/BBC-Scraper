<?php

/**
 * Config class' helper
 *
 * @param null $name
 *
 * @return mixed
 */
function config($name = null)
{
    $config = App\Core\Config::getInstance();

    // If no arguments are passed then return the config instance
    if (func_num_args() == 0) {
        return $config;
    }

    return $config->get($name);
}

/**
 * View class' helper
 *
 * @param null $path
 * @param array $params
 *
 * @return mixed
 */
function view($path = null, $params = [])
{
    $view = App\Core\View::getInstance();

    // If no arguments are passed then return the view instance
    if (func_num_args() == 0) {
        return $view;
    }

    return $view->make($path, $params);
}
