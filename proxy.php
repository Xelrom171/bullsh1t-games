<?php
// Ensure the URL parameter is provided
if (!isset($_GET['url'])) {
    die('URL parameter is missing.');
}

// Sanitize the URL parameter
$url = filter_var($_GET['url'], FILTER_SANITIZE_URL);

// Validate the URL
if (!filter_var($url, FILTER_VALIDATE_URL)) {
    die('Invalid URL.');
}

// Fetch the content
$options = [
    "http" => [
        "header" => "User-Agent: PHP Proxy\r\n"
    ]
];
$context = stream_context_create($options);
$content = file_get_contents($url, false, $context);

// Return the content
if ($content === FALSE) {
    die('Error fetching content.');
}

echo $content;
?>
