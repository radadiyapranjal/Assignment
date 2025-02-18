<?php

// Function to make API calls
function makeApiCall($url, $method = 'POST', $data = []) {
    $ch = curl_init($url);

    // Set the HTTP request method
    if ($method == 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded',
    ]);

    // Execute cURL and get the response
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        echo "cURL Error: " . curl_error($ch);
    }

    // Close cURL resource
    curl_close($ch);

    return json_decode($response, true);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input
    $dateOfJourney = $_POST['date'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];

    // Search Bus API
    $searchBusUrl = 'https://staging.mmrtrip.in/api/busservice/rest/search';
    $searchBusData = [
        'UserIp' => '192.168.1.1',  // Example IP address
        'DateOfJourney' => $dateOfJourney,
        'OriginId' => $origin,
        'DestinationId' => $destination
    ];

    // Make the API call
    $searchBusResult = makeApiCall($searchBusUrl, 'POST', $searchBusData);

    // Display the search results (if any)
    if (isset($searchBusResult['data']) && !empty($searchBusResult['data'])) {
        echo "<h3>Bus Search Results:</h3>";
        echo "<pre>";
        print_r($searchBusResult);  // This will display the JSON response in a readable format
        echo "</pre>";
    } else {
        echo "<p>No buses found for the given details.</p>";
    }
}

?>
