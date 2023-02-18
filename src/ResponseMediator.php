<?php

declare(strict_types=1);

namespace NikoPeikrishvili\OpenAIAPIClient;

use NikoPeikrishvili\OpenAIAPIClient\Endpoints\Exceptions\InvalidAPIKeyException;
use Psr\Http\Message\ResponseInterface;

class ResponseMediator
{
    public static function getContent(ResponseInterface $response): array
    {
        if(401 === $response->getStatusCode()){
            throw new InvalidAPIKeyException();
        }
        return json_decode($response->getBody()->getContents(), true);
    }
}