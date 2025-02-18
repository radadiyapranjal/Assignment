<?php

// Function to make API calls (same as above)
function makeApiCall($url, $method = 'POST', $data = []) {
    $ch = curl_init($url);

    if ($method == 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded',
    ]);

    $response = curl_exec($ch);

    if ($response === false) {
        echo "cURL Error: " . curl_error($ch);
    }

    curl_close($ch);

    return json_decode($response, true);
}

// Sample data (you can pass dynamically from user input)
$searchTokenId = '1234';  // Example search token ID
$resultIndex = '1';  // Example result index

// Make API call for boarding point info
$boardingPointUrl = 'https://www.stagingapi.bdsd.technology/api/busservice/rest/boardingpoint';
$boardingPointData = [
    'UserIp' => '192.168.1.1',  // Example IP address
    'SearchTokenId' => $searchTokenId,
    'ResultIndex' => $resultIndex
];

$boardingPointResult = makeApiCall($boardingPointUrl, 'POST', $boardingPointData);

// Display boarding point response
echo "<h3>Boarding Point Response:</h3>";
echo "<pre>";
print_r($boardingPointResult);  // Display boarding point info in readable format
echo "</pre>";

?>
