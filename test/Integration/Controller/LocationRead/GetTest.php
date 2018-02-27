<?php

declare(strict_types=1);

namespace LTVPlus\Test\Integration\Controller\LocationRead;

use Symfony\Component\HttpFoundation\Response;
use LTVPlus\Test\Integration\IntegrationTestCase;

class GetTest extends IntegrationTestCase
{
    public function testFunction()
    {
        // arrange
        $id = 1;
        $expected = json_encode(['data' => $this->data[$id]]);

        // act
        $this->client->get('/locations/' . $id);
        $response = $this->client->getResponse();

        // assert
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals($expected, $response->getContent());
        $this->checkDefaultResponseHeaders($response->headers);
    }
}
