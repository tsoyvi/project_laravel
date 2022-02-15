<?php

namespace App\Services;

use App\Contracts\Parser;
use Laravie\Parser\Document;


class ParserService implements Parser
{

    private Document $document;
    private string $link;

    /**
     * @param string $link
     * @return \App\Contracts\Parser 
     */
    public function setLink(string $link): Parser
    {
        $this->document = \XmlParser::load($link);
        $this->link = $link;
        return $this;
    }

    /**
     * @return array
     */
    public function parse(): void
    {
        $data = $this->document->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);

        $encode = json_encode($data);
        $explode = explode('/', $this->link);

        $parseLink = end($explode);
        \Storage::append('parsing/' . $parseLink , $encode);
    }
}
