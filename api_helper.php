<?php
require_once 'config.php';

function callApi($endpoint, $data) {
    $url = API_BASE_URL . $endpoint;
    
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
    ]);
    
    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);
    
    if (!$response || !isset($response['Result'])) {
        die(json_encode(['error' => 'Invalid response from API']));
    }
    
    
    return json_decode($response, true);
}
?>
