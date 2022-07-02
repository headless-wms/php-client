<?php

require('../src/Client.php');

use HeadlessWms\Api\Client;

$client = new Client('Your API Key', 'Your Email', 'Your Password');
$response = $client->createProduct([
    'product' => [
        'product_code' => 'P12345',
        'stock' => 10
    ]
]);

var_dump(json_decode($response->getBody()->getContents(), true));