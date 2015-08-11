<?php


namespace App\Scrapers;


use App\Exceptions\WebScraperException;

/**
 * Class AbstractScraper
 *
 * @package App\Scrapers
 */
abstract class AbstractScraper
{
    /**
     * Get an URL's HTML
     *
     * @param $url
     *
     * @return string HTML output
     * @throws WebScraperException
     */
    protected function getUrlHTML($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new WebScraperException('The URL provided is not valid.');
        }

        $HTML = @file_get_contents($url);

        if ($HTML === false) {
            throw new WebScraperException('The page you were looking for couldn\'t be loaded');
        }

        return $HTML;
    }


}