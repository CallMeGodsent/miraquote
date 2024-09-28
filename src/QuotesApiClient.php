<?php

namespace MiraQuotePHP;

use Exception;

class QuotesApiClient
{
    private string $apiKey;
    private string $baseUrl = 'https://quotes.miragek.com/api';

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    // Method to accept an optional count parameter
    public function getRandomQuote(?string $category = null, ?string $author = null, int $rand = 1): array
    {
        $params = [
            'rand' => $rand,
            'api_key' => $this->apiKey,
        ];

        if ($category) {
            $params['category'] = $category;
        }

        if ($author) {
            $params['author'] = $author;
        }

        return $this->makeRequest($params);
    }

    private function makeRequest(array $params): array
    {
        $url = $this->baseUrl . '?' . http_build_query($params);
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);
    
        if (curl_errno($ch)) {
            throw new Exception('Curl error: ' . curl_error($ch));
        }
    
        curl_close($ch);
    
        $decodedResponse = json_decode($response, true);
    
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Error decoding JSON response');
        }
    
        // Check if the request was successful
        if (isset($decodedResponse['success']) && $decodedResponse['success'] === true) {
            // Return the quotes from the data array
            return $decodedResponse['data'];
        } else {
            // Handle the error case, maybe log the response or throw an exception
            throw new Exception('Unexpected API response: ' . json_encode($decodedResponse));
        }
    }
    
}
