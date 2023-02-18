<?php
namespace NikoPeikrishvili\OpenAIAPIClient\Tests;

use Laminas\Diactoros\Response;
use NikoPeikrishvili\OpenAIAPIClient\Endpoints\Exceptions\InvalidAPIKeyException;

class HTTPClientTest extends TestCase
{
    public function testCanRequest200Response(): void
    {
        $httpClient = $this->givenAPIClient()->getHttpClient();
        $response = $httpClient->get('/models');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test401ThrowsException()
    {
        $this->expectException(InvalidAPIKeyException::class);
        $this->mockClient->addResponse((new Response())->withStatus(401));
        $this->givenAPIClient()->models()->all();
    }
}