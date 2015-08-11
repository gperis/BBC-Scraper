<?php

class RoutingTest extends PHPUnit_Framework_TestCase
{
    public function testShow404IfRouteDoesntExist()
    {
        @file_get_contents(config('app.base_url') . '/404');

        $this->assertEquals('HTTP/1.1 404 Not Found', $http_response_header[0]);
    }
}
