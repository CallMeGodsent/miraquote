# Quotes API Client

A PHP client for the Quotes API.

## Installation

You can install the package via composer:

```bash
composer require your-vendor/quotes-api
```

## Usage

```php
use Mira-Gek\MiraQuote\QuotesApiClient;

$client = new QuotesApiClient('your-api-key');

// Get a random quote
$quote = $client->getRandomQuote();

// Get a random quote from a specific category
$loveQuote = $client->getRandomQuote('love');

// Get a random quote from a specific author
$authorQuote = $client->getRandomQuote(null, 'John Doe');
```


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.