# MiraQuotePHP

You're welcome! Here's a sample `README.md` for your **MiraQuotePHP** package:


**MiraQuotePHP** is a simple PHP package that provides access to a vast collection of random quotes from different categories, allowing easy integration into any PHP project.

## Features

- Fetch random quotes.
- Filter quotes by category or author.
- Retrieve multiple quotes at once.
- Lightweight and easy to integrate.

## Installation

1. **Clone the repository** or **download the package**:
   ```bash
   git clone https://github.com/
   ```

2. **Require the package in your PHP script**:
   ```php
   require_once 'path/to/MiraQuotePHP/QuotesApiClient.php';
   ```

## Usage

### 1. Initialize the Client

To start using the API, instantiate the `QuotesApiClient` with your API key:

```php
use MiraQuotePHP\QuotesApiClient;

$client = new QuotesApiClient('your_api_key_here');
```

### 2. Fetch Random Quotes

#### Fetch a Single Quote

```php
$randomQuote = $client->getRandomQuote();
```

#### Fetch Multiple Quotes

You can also fetch multiple quotes from a specific category:

```php
$numberOfQuotes = 5;
$loveQuotes = $client->getRandomQuote('love', null, $numberOfQuotes);
```

#### Fetch Quotes by Author

You can retrieve quotes by a specific author by passing their name as the second argument:

```php
$johnQuotes = $client->getRandomQuote(null, 'john', 2);
```

### 3. Example Code

Here is a full example of how to use the package:

```php
<?php

require_once 'MiraQuotePHP/QuotesApiClient.php';

use MiraQuotePHP\QuotesApiClient;

$client = new QuotesApiClient('your_api_key_here');

try {
    // Fetch multiple love quotes
    $numberOfQuotes = 5;
    $loveQuotes = $client->getRandomQuote('love', null, $numberOfQuotes);

    echo "Love Quotes:\n";
    if (!empty($loveQuotes)) {
        foreach ($loveQuotes as $quote) {
            echo "Quote: " . ($quote['quote'] ?? 'No quote') . "\n";
            echo "Author: " . ($quote['author'] ?? 'Unknown author') . "\n\n";
        }
    } else {
        echo "No love quotes found.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

### Error Handling

Ensure you wrap the API calls in `try-catch` blocks to handle any potential errors gracefully.

```php
try {
    $quote = $client->getRandomQuote();
} catch (Exception $e) {
    echo "Error fetching quote: " . $e->getMessage();
}
```

## API Reference

### `getRandomQuote($category = null, $author = null, $limit = 1)`

- **$category**: (Optional) The category of quotes (e.g., 'love', 'happiness').
- **$author**: (Optional) Filter quotes by author.
- **$limit**: (Optional) The number of quotes to retrieve (default is 1).

#### Example Usage

```php
// Fetch a single random quote
$randomQuote = $client->getRandomQuote();

// Fetch 3 quotes from the "love" category
$loveQuotes = $client->getRandomQuote('love', null, 3);

// Fetch 2 quotes by author "John"
$johnQuotes = $client->getRandomQuote(null, 'john', 2);
```

## Requirements

- PHP 7.4+ or later

## License

This project is licensed under the MIT License.

## Contributing

Feel free to submit issues or pull requests to improve the package.

## Credits

Created and maintained by Miragek.

# What is nex?

Please follow the documentation at https://quotes.miragek.com/doc for a more comprehensive lesson