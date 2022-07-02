<?php

namespace HeadlessWms\Api;

use Dotenv\Dotenv;
use GuzzleHttp\Exception\GuzzleException;

require_once __DIR__ . '/../vendor/autoload.php';

class Client
{
    protected $baseUrl;
    protected $httpClient;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $this->baseUrl = 'https://headless-wms.com/api/' . $_ENV['API_VERSION'];

        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'https://headless-wms.com/api/' . $_ENV['API_VERSION'] . '/',
            'headers' => [
                'Authorization' => 'Bearer ' . $_ENV['API_KEY'],
                'Accept' => 'application/json'
            ],
        ]);
    }

    /**
     * @throws GuzzleException
     */
    protected function post($endpoint, $parameters = [])
    {
        return $this->httpClient->post($endpoint, [
            'json' => $parameters
        ]);
    }

    /**
     * @throws GuzzleException
     */
    protected function get($endpoint, $parameters = [])
    {
        return $this->httpClient->get($endpoint, [
            'query' => $parameters
        ]);
    }

    /**
     * @throws GuzzleException
     */
    protected function put($endpoint, $parameters = [])
    {
        return $this->httpClient->get($endpoint, [
            'json' => $parameters
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function createProduct($parameters = [])
    {
        return $this->post('products', $parameters);
    }

    /**
     * @throws GuzzleException
     */
    public function getAllProducts($parameters = [])
    {
        return $this->httpClient->get('products', $parameters);
    }
}