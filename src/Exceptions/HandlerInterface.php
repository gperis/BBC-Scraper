<?php


namespace App\Exceptions;


interface HandlerInterface
{
    /**
     * Render the exception
     *
     * @param \Exception $e
     */
    public static function render(\Exception $e);
}