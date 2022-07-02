<?php

namespace HeadlessWms\Api;

use GuzzleHttp\Exception\GuzzleException;

class Client
{
    protected $httpClient;
    protected $apiVersion = 'v1';
    protected $apiKey;
    protected $email;
    protected $password;

    public function __construct($apiKey, $email, $password)
    {
        $this->apiKey = $apiKey;
        $this->email = $email;
        $this->password = $password;

        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'https://headless-wms.com/api/' . $this->apiVersion . '/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey . ', Basic ' . base64_encode($this->email . ':' . $this->password),
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
    public function generateApiToken()
    {
        return $this->post('tokens');
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getApiKey()
    {
        return $this->apiKey;
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
        return $this->get('products', $parameters);
    }
}