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

// Make API call for seat layout
$seatLayoutUrl = 'https://www.stagingapi.bdsd.technology/api/busservice/rest/seatlayout';
$seatLayoutData = [
    'UserIp' => '192.168.1.1',  // Example IP address
    'SearchTokenId' => $searchTokenId,
    'ResultIndex' => $resultIndex
];

$seatLayoutResult = makeApiCall($seatLayoutUrl, 'POST', $seatLayoutData);

// Display seat layout response
echo "<h3>Seat Layout Response:</h3>";
echo "<pre>";
print_r($seatLayoutResult);  // Display seat layout response in readable format
echo "</pre>";

?>
