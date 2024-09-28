<?php

// index.php

// Adjust the path according to where QuotesApiClient.php is located
require_once 'MiraQuotePHP/QuotesApiClient.php';

use MiraQuotePHP\QuotesApiClient;

$client = new QuotesApiClient('test');

try {
    $randomQuote = $client->getRandomQuote();
    print_r($randomQuote);

    $loveQuote = $client->getRandomQuote('love');
    print_r($loveQuote);

    $johnQuote = $client->getRandomQuote(null, 'john');
    print_r($johnQuote);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}