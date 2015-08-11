<?php

class ViewTest extends PHPUnit_Framework_TestCase
{
    public function testItLoadsThe404Page()
    {
        $view = view('error.404');

        $this->assertEquals(file_get_contents(BASE_DIR . '/' . config('app.views_folder') . '/error/404.php'), $view);
    }
}
