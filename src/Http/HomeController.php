<?php


namespace App\Http;


use App\Scrapers\DOMWebScraper as WebScrapper;

class HomeController
{
    public function index()
    {
        $urlToScrape = 'http://www.bbc.com';
        $tag         = 'div';
        $tagCount    = (new WebScrapper($urlToScrape))->countTag($tag);

        return view('home.index', compact('tagCount', 'urlToScrape', 'tag'));
    }
}