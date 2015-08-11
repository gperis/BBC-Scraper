<?php


namespace App\Core;


use App\Exceptions\FileNotFoundException;

class View
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
     * Make a view
     *
     * @param string $path
     * @param array $vars
     *
     * @return string
     * @throws FileNotFoundException
     */
    public function make($path, $vars = [])
    {
        // Append the views folder and replace dot notation with slashes
        $path = BASE_DIR . config('app.views_folder') . '/' .  str_replace('.', '/', $path) . '.php';

        if ( ! file_exists($path)) {
            throw new FileNotFoundException('The view file couldn\'t be found on: ' . $path);
        }

        return $this->renderView($path, $vars);
    }

    /**
     * Renders a view
     *
     * @param $path
     * @param $vars
     *
     * @return mixed
     */
    protected function renderView($path, $vars)
    {
        ob_start();
        extract($vars, EXTR_OVERWRITE);

        require($path);

        ob_end_flush();

        return ob_get_contents();
    }
}