<?php


namespace App\Core;


use App\Exceptions\ConfigNotFoundException;
use App\Exceptions\FileNotFoundException;

class Config
{
    /**
     * Config array
     *
     * @var array
     */
    protected $config = [];

    /**
     * Loaded files array
     *
     * @var array
     */
    protected $loadedFiles = [];

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
     * Get a configuration variable.
     *
     * @param string $name
     *
     * @return mixed
     * @throws ConfigNotFoundException
     */
    public function get($name)
    {
        $file = $name;

        if (strpos($name, '.') !== false) {
            list($file, $key) = explode('.', $name);
        }

        $this->load($file);

        if ( ! empty($key)) {
            if (isset($this->config[$file][$key])) {
                return $this->config[$file][$key];
            }

            throw new ConfigNotFoundException('Config key ' . $key . ' is not set on config file ' . $file);
        }

        return $this->config[$file];
    }

    /**
     * Load a configuration file.
     *
     * @param string $file
     *
     * @return bool
     * @throws FileNotFoundException
     */
    protected function load($file)
    {
        if (in_array($file, $this->loadedFiles)) {
            return true;
        }

        $filePath = realpath(BASE_DIR . '/config/' . $file . '.php');

        if ( ! file_exists($filePath)) {
            throw new FileNotFoundException('The file ' . $file . ' couldn\'t be found in the config directory');
        }

        $this->loadedFiles[] = $file;
        $this->config[$file] = require($filePath);

        return true;
    }
}