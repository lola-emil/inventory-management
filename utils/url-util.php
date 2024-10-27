<?php

function updateQueryParams($uri, $params) {
    // Parse the URL
    $urlComponents = parse_url($uri);

    // Parse the query parameters into an associative array
    parse_str($urlComponents['query'] ?? '', $queryParams);

    // Add or update the provided parameters
    foreach ($params as $key => $value) {
        $queryParams[$key] = $value;
    }

    // Rebuild the query string
    $newQueryString = http_build_query($queryParams);

    // Rebuild the full URL (keeping the same path)
    $newUrl = $urlComponents['path'] . '?' . $newQueryString;

    return $newUrl;
}