<?php

declare(strict_types=1);

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints;

use NikoPeikrishvili\OpenAIAPIClient\ResponseMediator;

final class Models extends Endpoint
{
    public function all(): array
    {
        return ResponseMediator::getContent($this->chatGPT->getHttpClient()->get('/models'));
    }

    public function get($model): array
    {
        return ResponseMediator::getContent($this->chatGPT->getHttpClient()->get('/models/'.urlencode($model)));
    }
}