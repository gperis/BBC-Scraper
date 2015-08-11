<?php require __DIR__ . '/../bootstrap/start.php';

/**
 * Initialize some system's components
 */
$routing = App\Core\Routing::getInstance();
$config  = App\Core\Config::getInstance();

/**
 * Assign our custom exception handler
 */
set_exception_handler([config('app.namespace') . '\Exceptions\\' . config('app.error_handler'), 'render']);

/**
 * Handle the request
 */
$routing->handleRequest();