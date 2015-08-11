<?php


namespace App\Exceptions;

/**
 * Class SimpleHandler
 *
 * @package App\Exceptions
 */
class SimpleHandler implements HandlerInterface
{
    /**
     * Render the exception
     *
     * @param \Exception $e
     */
    public static function render(\Exception $e)
    {
        exit($e->getMessage());
    }
}