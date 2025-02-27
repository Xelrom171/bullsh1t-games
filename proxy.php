<?php
// Check if 'url' parameter is passed
if (isset($_GET['url'])) {
    // Get the URL of the site to proxy
    $proxied_url = $_GET['url'];

    // Validate the URL to prevent malicious usage
    if (!filter_var($proxied_url, FILTER_VALIDATE_URL)) {
        echo "Invalid URL.";
        exit;
    }

    // Fetch the content of the proxied site
    $content = file_get_contents($proxied_url);

    if ($content === FALSE) {
        echo "Could not fetch the content from the requested URL.";
        exit;
    }

    // Output the content of the proxied site
    echo $content;
} else {
    echo "No URL provided. Please use the 'url' query parameter.";
}
?>
