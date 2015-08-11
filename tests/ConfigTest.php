<?php

class ConfigTest extends PHPUnit_Framework_TestCase
{
    public function testReturnsStringWhenKeyIsPassed()
    {
        $this->assertInternalType('string', config('app.namespace'));
    }

    public function testReturnsArrayWhenKeyIsNotPassed()
    {
        $this->assertInternalType('array', config('app'));
    }

    /**
     * @expectedException App\Exceptions\FileNotFoundException
     */
    public function testThrowExceptionIfFileDoesntExist()
    {
        config('not-existent');
    }

    /**
     * @expectedException App\Exceptions\ConfigNotFoundException
     */
    public function testThrowExceptionIfKeyDoesntExist()
    {
        config('app.not-existent');
    }

}
