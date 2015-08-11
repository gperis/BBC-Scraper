<?php

class RoutingTest extends PHPUnit_Framework_TestCase
{
    public function testItShowsThe404Page()
    {
        $page = file_get_contents(config('app.base_url') . '/404');

        $this->assertEquals(view('error.404'), $page);
    }
}
