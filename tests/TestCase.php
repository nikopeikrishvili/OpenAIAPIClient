<?php

declare(strict_types=1);

namespace NikoPeikrishvili\OpenAIAPIClient\Tests;


use Http\Mock\Client;
use NikoPeikrishvili\OpenAIAPIClient\ClientBuilder;
use NikoPeikrishvili\OpenAIAPIClient\OpenAIAPIClient;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Client $mockClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockClient = new Client();
    }

    protected function givenAPIClient(): OpenAIAPIClient
    {
        return new OpenAIAPIClient('test', new ClientBuilder($this->mockClient));
    }
}