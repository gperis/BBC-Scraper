<?php


namespace App\Core;


use App\Exceptions\RoutingException;

class Routing
{
    /**
     * Instance variable.
     */
    private static $instance;

    /**
     * Required for the singleton pattern.
     *
     * @return mixed
     */
    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Request handler
     *
     * @throws RoutingException
     */
    public function handleRequest()
    {
        // Remove the first slash except for the root
        $requestURI = substr($_SERVER['REQUEST_URI'], 1) ?: '/';
        $routes     = config('routing');

        if (isset($routes[$requestURI])) {
            $URIRoute = $routes[$requestURI];

            list($controller, $method) = explode('@', $URIRoute);

            return $this->callControllerMethod($controller, $method, []);
        }

        return $this->callControllerMethod('ErrorController', 'show404');
    }

    /**
     * Call the respective method of a controller to handle the request.
     *
     * @param string $controller
     * @param string $method
     * @param array $params
     *
     * @throws RoutingException
     */
    protected function callControllerMethod($controller, $method, $params = [])
    {
        $namespace = config('app.namespace') . '\Http\\';
        $className = $namespace . $controller;

        if ( ! class_exists($className)) {
            throw new RoutingException('Invalid call to a non-existent controller: ' . $className);
        }

        if ( ! method_exists($className, $method)) {
            throw new RoutingException('Invalid call to a non-existent method: ' . $method);
        }

        $instance = new $className();
        call_user_func_array([$instance, $method], $params);
    }
}