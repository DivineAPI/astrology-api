<?php
// DivineAPI example: Vedic basic astro details (moon sign, nakshatra, tithi) for a birth date, time and place.
// Docs: https://developers.divineapi.com/indian-api/kundli-api/basic-astrological-details
// Run (PHP 8.1+ with the curl extension):
//   export DIVINEAPI_API_KEY=... DIVINEAPI_AUTH_TOKEN=...   then   php quickstart.php

$url = "https://astroapi-3.divineapi.com/indian-api/v3/basic-astro-details";
$apiKey = getenv("DIVINEAPI_API_KEY");
$authToken = getenv("DIVINEAPI_AUTH_TOKEN");
if (!$apiKey || !$authToken) {
    fwrite(STDERR, "Set DIVINEAPI_API_KEY and DIVINEAPI_AUTH_TOKEN (see .env.example)\n");
    exit(1);
}

$fields = [
    "api_key" => $apiKey,
    "full_name" => "Rahul Kumar",
    "gender" => "male",
    "day" => "24",
    "month" => "05",
    "year" => "1990",
    "hour" => "14",
    "min" => "40",
    "sec" => "0",
    "place" => "new delhi",
    "lat" => "28.6139",
    "lon" => "77.2090",
    "tzone" => "5.5",
    "lan" => "en",
];

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $fields, // an array makes cURL send multipart/form-data
    CURLOPT_HTTPHEADER     => ["Authorization: Bearer " . $authToken],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 60,
]);
$body = json_decode(curl_exec($ch), true);
curl_close($ch);

if (($body["success"] ?? 0) !== 1) { // legacy hosts return HTTP 200 even on errors
    fwrite(STDERR, "API error: " . json_encode($body["msg"] ?? $body) . "\n");
    exit(1);
}

$d = $body["data"];
echo "Moon sign: {$d['moonsign']}\n";
echo "Nakshatra: {$d['nakshatra']}\n";
echo "Tithi: {$d['paksha']} {$d['tithi']}\n";
