<?php


namespace App\Scrapers;

/**
 * Class DOMWebScrapper
 *
 * @package App\Scrappers
 * @implements WebScraperInterface
 */
class DOMWebScraper extends AbstractScraper implements WebScraperInterface
{
    /**
     * @var \DOMDocument
     */
    protected $DOM;

    /**
     * Parse a given URL
     *
     * @param string $url
     */
    public function __construct($url)
    {
        $urlHTML = $this->getUrlHTML($url);

        // Disable bad formatted HTML warnings
        libxml_use_internal_errors(true);

        $this->DOM = new \DOMDocument();
        $this->DOM->loadHTML($urlHTML);
    }

    /**
     * Get the number of elements with the given tag
     *
     * @param string $tag
     *
     * @return int
     */
    public function countTag($tag)
    {
        return $this->DOM->getElementsByTagName($tag)->length;
    }
}