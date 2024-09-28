<?php

require_once 'MiraQuotePHP/QuotesApiClient.php';

use MiraQuotePHP\QuotesApiClient;

$client = new QuotesApiClient('test');

try {
    // Requesting multiple random quotes
    $numberOfQuotes = 3; // Set this to the desired number of quotes
    $loveQuotes = $client->getRandomQuote('love', null, $numberOfQuotes);
    
    echo "Love Quotes:\n";
    if (!empty($loveQuotes)) {
        echo "[\n"; // Start of the array
        foreach ($loveQuotes as $quote) {
            // Ensure the quote has the necessary keys
            echo "  {\"quote\": \"" . ($quote['quote'] ?? 'No quote') . "\", \"author\": \"" . ($quote['author'] ?? 'Unknown author') . "\"},\n";
        }
        echo "]\n"; // End of the array
    } else {
        echo "No love quotes found.\n";
    }

    // Requesting quotes by author
    $johnQuotes = $client->getRandomQuote(null, 'john', 2);
    echo "Quotes by John:\n";
    if (!empty($johnQuotes)) {
        echo "[\n"; // Start of the array
        foreach ($johnQuotes as $quote) {
            // Ensure the quote has the necessary keys
            echo "  {\"quote\": \"" . ($quote['quote'] ?? 'No quote') . "\", \"author\": \"" . ($quote['author'] ?? 'Unknown author') . "\"},\n";
        }
        echo "]\n"; // End of the array
    } else {
        echo "No quotes by John found.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
