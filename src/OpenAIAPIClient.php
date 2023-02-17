<?php

declare(strict_types=1);

namespace NikoPeikrishvili\OpenAIAPIClient;

use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Message\UriFactory;
use NikoPeikrishvili\OpenAIAPIClient\ClientBuilder;
use NikoPeikrishvili\OpenAIAPIClient\Endpoints\Completion;
use NikoPeikrishvili\OpenAIAPIClient\Endpoints\Edits;
use NikoPeikrishvili\OpenAIAPIClient\Endpoints\Models;

final class OpenAIAPIClient
{
    private ClientBuilder $clientBuilder;
    private string $apiUrl = 'https://api.openai.com/v1/';
    private string $userAgent = 'NikoPeikrishvili\OpenAIAPIClient SDK';

    public function __construct(
        private readonly string $apiKey,
        ClientBuilder $clientBuilder = null,
        UriFactory $uriFactory = null
    ) {
        $this->clientBuilder = $clientBuilder ?: new ClientBuilder();
        $uriFactory = $uriFactory ?: Psr17FactoryDiscovery::findUriFactory();
        $this->clientBuilder->addPlugin(
            new BaseUriPlugin($uriFactory->createUri($this->apiUrl))
        );
        $this->clientBuilder->addPlugin(
            new HeaderDefaultsPlugin(
                [
                    'User-Agent' => $this->userAgent,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->apiKey
                ]
            )
        );
    }

    public function models(): Models
    {
        return new Models($this);
    }

    public function completion(): Completion
    {
        return new Completion($this);
    }

    public function edits(): Edits
    {
        return new Edits($this);
    }
    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->clientBuilder->getHttpClient();
    }
}