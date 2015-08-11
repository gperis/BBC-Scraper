<?php
use App\Scrapers\DOMWebScraper;

/**
 * Class DOMWebScrapperTest
 *
 * @test
 */
class DOMWebScraperTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests if there is a body tag on Google's website.
     */
    public function testCountGoogleBody()
    {
        $scrapper = new DOMWebScraper('http://google.com');

        $this->assertEquals(1, $scrapper->countTag('body'));
    }

    /**
     * Tests if there is a title tag on BBC's website.
     */
    public function testCountBBCTitle()
    {
        $scrapper = new DOMWebScraper('http://www.bbc.com');

        $this->assertEquals(1, $scrapper->countTag('title'));
    }

    /**
     * Tests if we receive an exception when an URL is invalid.
     *
     * @expectedException App\Exceptions\WebScraperException
     * @expectedExceptionMessage The URL provided is not valid.
     */
    public function testHandleInvalidUrl()
    {
        $scrapper = new DOMWebScraper('invalid.url');
    }

    /**
     * Tests if we receive an exception if the URL is not found.
     *
     * @expectedException App\Exceptions\WebScraperException
     * @expectedExceptionMessage The page you were looking for couldn't be loaded
     */
    public function testNonExistantUrl()
    {
        $scrapper = new DOMWebScraper('http://non-existant-url.com');

    }
}
