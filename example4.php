<?php

require_once 'MiraQuotePHP/QuotesApiClient.php';

use MiraQuotePHP\QuotesApiClient;

$client = new QuotesApiClient('test'); // Your API key here

// Fetch multiple random quotes
try {
    // Fetch wisdom quotes and number
    $loveQuotes = $client->getRandomQuote('wisdom', null, 1); // Change number as desired

    // Fetch quotes by author and number
    $johnQuotes = $client->getRandomQuote(null, 'john', 2); // Change number as desired

} catch (Exception $e) {
    $errorMessage = "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Quotes</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f8ff;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        text-align: center;
        border: 2px solid #4a90e2;
        border-radius: 10px;
        padding: 20px;
        background-color: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 90%;
        max-width: 600px;
        overflow: hidden; /* Ensures no overflow on smaller screens */
    }

    .title {
        font-size: 2rem;
        color: #4a90e2;
    }

    .quote-text {
        font-size: 1.5rem;
        font-style: italic;
        color: #333;
    }

    .author-text {
        font-size: 1.2rem;
        margin-top: 10px;
        color: #666;
    }

    .btn {
        padding: 10px 20px;
        font-size: 1rem;
        color: white;
        background-color: #4a90e2;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 20px;
        display: inline-block;
    }

    .btn:hover {
        background-color: #357ABD;
    }

    /* Media Queries for Responsiveness */
    @media (max-width: 768px) {
        .title {
            font-size: 1.5rem; /* Adjust title size for smaller screens */
        }

        .quote-text {
            font-size: 1.2rem; /* Adjust quote size */
        }

        .author-text {
            font-size: 1rem; /* Adjust author size */
        }

        .btn {
            font-size: 0.9rem; /* Adjust button size */
        }
    }

        /* Remove default bullets from lists */
        ul {
        list-style-type: none; /* Remove bullets */
        padding: 0; /* Remove padding */
        margin: 0; /* Remove margin */
    }

    @media (max-width: 480px) {
        .container {
            padding: 10px; /* Reduce padding on very small screens */
        }

        .title {
            font-size: 1.2rem; /* Further adjust title size */
        }

        .quote-text {
            font-size: 1rem; /* Further adjust quote size */
        }

        .author-text {
            font-size: 0.9rem; /* Further adjust author size */
        }

        .btn {
            padding: 8px 16px; /* Adjust button padding */
            font-size: 0.8rem; /* Further adjust button size */
        }
        
    }
</style>

</head>
<body>
    <div class="container">
        <h1 class="title">Random Quotes</h1>
        
        <h2>Love Quotes:</h2>
        <div class="quote-box">
            <?php if (!empty($loveQuotes)): ?>
                <ul>
                <?php foreach ($loveQuotes as $quote): ?>
                    <li class="quote-text">
                        "<?php echo htmlspecialchars($quote['quote'] ?? 'No quote'); ?>"
                        <br>
                        <span class="author-text"><?php echo htmlspecialchars($quote['author'] ?? 'Unknown author'); ?></span>
                    </li>
                <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No love quotes found.</p>
            <?php endif; ?>
        </div>
        
        <h2>Quotes by John:</h2>
        <div class="quote-box">
            <?php if (!empty($johnQuotes)): ?>
                <ul>
                <?php foreach ($johnQuotes as $quote): ?>
                    <li class="quote-text">
                        "<?php echo htmlspecialchars($quote['quote'] ?? 'No quote'); ?>"
                        <br>
                        <span class="author-text"><?php echo htmlspecialchars($quote['author'] ?? 'Unknown author'); ?></span>
                    </li>
                <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No quotes by John found.</p>
            <?php endif; ?>
        </div>
        
        <form method="post" action="">
            <button type="submit" class="btn">Get New Quotes</button>
        </form>
    </div>
</body>
</html>
