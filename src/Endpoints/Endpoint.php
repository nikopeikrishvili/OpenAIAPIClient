<?php

declare(strict_types=1);

namespace NikoPeikrishvili\ChatGPTClient\Endpoints;

use NikoPeikrishvili\ChatGPTClient\OpenAIAPIClient;

abstract class Endpoint
{
    public function __construct(protected readonly OpenAIAPIClient $chatGPT)
    {
    }
}