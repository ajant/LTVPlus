<?php

declare(strict_types=1);

namespace LTVPlus\Test\Integration;

use LTVPlus\Model\Location;
use LTVPlus\Transformer\Location as Transforemr;
use ReflectionClass;
use Silex\Application;
use Silex\WebTestCase;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

abstract class IntegrationTestCase extends WebTestCase
{
    /**
     * @var Application
     */
    protected static $staticApp;

    /**
     * @var ClientAdapter
     */
    protected $client;

    /**
     * @var array
     */
    protected $data = [];

    protected function setUp()
    {
        parent::setUp();

        $reflectionClass = new ReflectionClass(Location::class);

        $reflectionProperty = $reflectionClass->getProperty('data');
        $reflectionProperty->setAccessible(true);
        $data = $reflectionProperty->getValue(new Location());
        $transformer = new Transforemr();
        foreach ($data as $key => $locationDto) {
            $this->data[$key] = $transformer->transform($locationDto);
        }

        $this->client = new ClientAdapter($this->createClient());
    }

    public function createApplication(): Application
    {
        if (empty(self::$staticApp)) {
            self::$staticApp = include realpath(__DIR__ . '/bootstrap.php');
        }
        self::$staticApp['debug'] = true;
        unset(self::$staticApp['exception_handler']);

        return self::$staticApp;
    }

    protected function checkDefaultResponseHeaders(ResponseHeaderBag $headers): void
    {
        $this->assertEquals(ACCESS_CONTROL_ALLOW_ORIGIN, $headers->get('access-control-allow-origin'));
        $this->assertEquals(CONTENT_TYPE_JSON, $headers->get('content-type'));
        $this->assertEquals(ACCESS_CONTROL_ALLOW_METHODS, $headers->get('access-control-allow-methods'));
    }

    public function request(string $method, string $url, array $inputData = [], $server = null)
    {
        return $this->client->request(
            $method,
            $url,
            [],
            [],
            $server ?? ['CONTENT_TYPE' => CONTENT_TYPE_JSON],
            json_encode($inputData)
        );
    }
}
