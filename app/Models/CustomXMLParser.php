<?php
namespace App\Models;
use PHRETS\Http\Response;
use Psr\Http\Message\ResponseInterface;
class CustomXMLParser
{
    public function parse($string)
    {
        if ($string instanceof ResponseInterface or $string instanceof Response) {
            $string = $string->getBody()->__toString();
        }
        
        $string = iconv('ASCII', 'UTF-8//IGNORE', (string) $string);

        return new \SimpleXMLElement((string) $string);
    }
}