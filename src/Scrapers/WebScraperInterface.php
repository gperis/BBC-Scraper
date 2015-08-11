<?php


namespace App\Scrapers;

/**
 * Interface WebScraperInterface
 *
 * @package App\Scrapers
 */
interface WebScraperInterface
{
    /**
     * Parse a given URL
     *
     * @param string $url
     */
    public function __construct($url);

    /**
     * Get the number of elements with the given tag
     *
     * @param string $tag
     *
     * @return int
     */
    public function countTag($tag);
}