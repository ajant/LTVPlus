<?php

declare(strict_types=1);

namespace LTVPlus\Test\Integration\Controller\Vehicles;

use Symfony\Component\HttpFoundation\Response;
use LTVPlus\Test\Integration\IntegrationTestCase;

class GetInvalidTest extends IntegrationTestCase
{
    public function testFunction()
    {
        // arrange
        $expected = json_encode(['error' => ['message' => 'Location was not found']]);

        // act
        $this->client->get('/locations/0');
        $response = $this->client->getResponse();

        // assert
        $this->assertEquals(Response::HTTP_NOT_FOUND, $response->getStatusCode());
        $this->assertEquals($expected, $response->getContent());
        $this->checkDefaultResponseHeaders($response->headers);
    }
}
