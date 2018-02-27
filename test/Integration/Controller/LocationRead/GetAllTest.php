<?php

declare(strict_types=1);

namespace LTVPlus\Test\Integration\Controller\LocationRead;

use Symfony\Component\HttpFoundation\Response;
use LTVPlus\Test\Integration\IntegrationTestCase;

class GetAllTest extends IntegrationTestCase
{
    public function testNoLimitNoPage()
    {
        // arrange
        $expected = json_encode(['data' => array_values($this->data)]);

        // act
        $this->client->get('/locations');
        $response = $this->client->getResponse();

        // assert
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals($expected, $response->getContent());
        $this->checkDefaultResponseHeaders($response->headers);
    }

    public function testLimitPage()
    {
        // arrange
        $expected = json_encode(['data' => [
            $this->data[3],
            $this->data[4],
        ]]);

        // act
        $this->client->get('/locations?limit=2&page=2');
        $response = $this->client->getResponse();

        // assert
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals($expected, $response->getContent());
        $this->checkDefaultResponseHeaders($response->headers);
    }

    public function testOutOgRange()
    {
        // arrange
        $expected = json_encode(['data' => []]);

        // act
        $this->client->get('/locations?limit=10&page=10');
        $response = $this->client->getResponse();

        // assert
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals($expected, $response->getContent());
        $this->checkDefaultResponseHeaders($response->headers);
    }
}
