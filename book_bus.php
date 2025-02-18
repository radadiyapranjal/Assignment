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
$resultIndex = '1';  // Example result index
$hotelCode = '1234';  // Example hotel code

// Make API call for booking bus
$bookBusUrl = 'https://www.stagingapi.bdsd.technology/api/busservice/rest/book';
$bookBusData = [
    'ResultIndex' => $resultIndex,
    'HotelCode' => $hotelCode,
    'HotelName' => 'Sample Hotel',
    'GuestNationality' => 'IN',
    'NoOfRooms' => 1,
    'ClientReferenceNo' => '123456'
];

$bookBusResult = makeApiCall($bookBusUrl, 'POST', $bookBusData);

// Display booking response
echo "<h3>Booking Response:</h3>";
echo "<pre>";
print_r($bookBusResult);  // Display booking response in readable format
echo "</pre>";

?>
