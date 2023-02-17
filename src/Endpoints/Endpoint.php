<?php

declare(strict_types=1);

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints;

use NikoPeikrishvili\OpenAIAPIClient\OpenAIAPIClient;

abstract class Endpoint
{
    public function __construct(protected readonly OpenAIAPIClient $chatGPT)
    {
    }
}