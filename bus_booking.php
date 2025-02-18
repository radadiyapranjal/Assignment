<?php

// Function to make API calls
function makeApiCall($url, $method = 'POST', $data = []) {
    $ch = curl_init($url);

    // Set the HTTP request method
    if ($method == 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }

    // Set options for cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded',
    ]);

    // Execute cURL and get response
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        echo "cURL Error: " . curl_error($ch);
    }

    // Close cURL resource
    curl_close($ch);

    return json_decode($response, true);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from form
    $dateOfJourney = $_POST['date'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];

    // Send data to API
    $searchBusUrl = 'https://staging.mmrtrip.in/api/busservice/rest/search';
    $searchBusData = [
        'UserIp' => '192.168.1.5',  // Example IP Address
        'DateOfJourney' => $dateOfJourney,
        'OriginId' => $origin,
        'DestinationId' => $destination
    ];

    $searchBusResult = makeApiCall($searchBusUrl, 'POST', $searchBusData);

    // Check if the result is valid
    if (isset($searchBusResult['data']) && !empty($searchBusResult['data'])) {
        echo "<h3>Bus Search Results:</h3>";
        echo "<ul>";
        foreach ($searchBusResult['data'] as $bus) {
            echo "<li>";
            echo "Bus Name: " . $bus['busName'] . "<br>";
            echo "Departure: " . $bus['departureTime'] . "<br>";
            echo "Price: ₹" . $bus['fare'] . "<br>";
            echo "<hr>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No buses found for the given details.</p>";
    }
}

?>
