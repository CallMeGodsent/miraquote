<?php

namespace YourVendor\Quotes;

use GuzzleHttp\Client;
use Exception;

class Quotes
{
    protected $apiKey;
    protected $client;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client(['base_uri' => 'https://quotes.miragek.com/api']);
    }

    public function getRandomQuote($category = null, $author = null)
    {
        try {
            $query = [
                'rand' => 1,
                'api_key' => $this->apiKey
            ];

            if ($category) {
                $query['category'] = $category;
            }

            if ($author) {
                $query['author'] = $author;
            }

            $response = $this->client->request('GET', '', ['query' => $query]);
            $data = json_decode($response->getBody()->getContents(), true);

            if ($data['success']) {
                return $data['data'];
            }

            throw new Exception('Failed to fetch quotes.');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
