<?php

declare(strict_types=1);

namespace LTVPlus\Test\Integration\Controller\Vehicles;

use Symfony\Component\HttpFoundation\Response;
use LTVPlus\Test\Integration\IntegrationTestCase;

class GetAllInvalidTest extends IntegrationTestCase
{
    public function testInvalidLimit()
    {
        // arrange
        $expected = json_encode(['error' => ['message' => 'Limit must be integer greater then 0']]);

        // act
        $this->client->get('/locations?limit=1.1&page=1');
        $response = $this->client->getResponse();

        // assert
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $response->getStatusCode());
        $this->assertEquals($expected, $response->getContent());
        $this->checkDefaultResponseHeaders($response->headers);
    }

    public function testInvalidPage()
    {
        // arrange
        $expected = json_encode(['error' => ['message' => 'Page must be integer greater then 0']]);

        // act
        $this->client->get('/locations?limit=1&page=s');
        $response = $this->client->getResponse();

        // assert
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $response->getStatusCode());
        $this->assertEquals($expected, $response->getContent());
        $this->checkDefaultResponseHeaders($response->headers);
    }
}
