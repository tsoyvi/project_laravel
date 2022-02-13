<?php

namespace App\Services;

use App\Contracts\Parser;
use Laravie\Parser\Document;


class ParserService implements Parser
{

    private Document $document;

    /**
     * @param string $link
     * @return \App\Contracts\Parser 
     */
    public function setLink(string $link): Parser
    {
        $this->document = \XmlParser::load($link);

        return $this;
    }

    /**
     * @return array
     */
    public function parse(): array
    {
        return $this->document->parse([
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
    }
}
