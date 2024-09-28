<?php

require_once 'MiraQuotePHP/QuotesApiClient.php';

use MiraQuotePHP\QuotesApiClient;

$client = new QuotesApiClient('test');

try {
    // Requesting multiple random quotes
    $numberOfQuotes = 3; // Set this to the desired number of quotes
    $loveQuotes = $client->getRandomQuote('love', null, $numberOfQuotes);
    echo "Love Quotes:\n";
    foreach ($loveQuotes as $quote) {
        echo "Quote: " . $quote['quote'] . " - " . $quote['author'] . "<br><br>";
    }
    
    // Requesting quotes by author
    $johnQuotes = $client->getRandomQuote(null, 'john', 3);
    echo "Quotes by John:\n";
    foreach ($johnQuotes as $quote) {
        echo "Quote: " . $quote['quote'] . " - " . $quote['author'] . "<br><br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
