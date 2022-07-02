<?php

require('../src/Client.php');

use HeadlessWms\Api\Client;

$client = new Client();
$response = $client->generateApiToken();

var_dump(json_decode($response->getBody()->getContents(), true));