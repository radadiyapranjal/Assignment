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
$bookingId = '123456';  // Example booking ID

// Make API call for generating voucher
$voucherUrl = 'https://test.bdsdtechnology.com/ttsproduct/api/busservice/rest/getbookingdetail';
$voucherData = [
    'bookingId' => $bookingId
];

$voucherResult = makeApiCall($voucherUrl, 'POST', $voucherData);

// Display voucher response
echo "<h3>Voucher Response:</h3>";
echo "<pre>";
print_r($voucherResult);  // Display voucher details in readable format
echo "</pre>";

?>
