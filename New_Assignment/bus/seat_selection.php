<?php
if (isset($_GET['searchTokenId']) && isset($_GET['resultIndex'])) {
    $searchTokenId = htmlspecialchars($_GET['searchTokenId']);
    $resultIndex = htmlspecialchars($_GET['resultIndex']);

    echo "SearchTokenId: $searchTokenId<br>";
    echo "ResultIndex: $resultIndex<br>";

    $url = "https://staging.mmrtrip.in/api/busservice/rest/seatlayout";
    $data = [
        "UserIp" => "103.209.223.52",
        "SearchTokenId" => $searchTokenId,
        "ResultIndex" => (int)$resultIndex
    ];
    $jsonData = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Username: AAKFE2643K",
        "Password: 3593564"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    $response = curl_exec($ch);
    if ($response === false) {
        echo "cURL Error: " . curl_error($ch);
    } else {
        echo "<pre>Response: " . htmlspecialchars($response) . "</pre>";
    }
    curl_close($ch);

    $seatLayout = json_decode($response, true);

    if (!empty($seatLayout['Seats'])) {
        echo '<div class="seat-layout">';
        foreach ($seatLayout['Seats'] as $seat) {
            $seatClass = $seat['IsAvailable'] ? 'seat available' : 'seat booked';
            echo '<div class="' . $seatClass . '">' . $seat['SeatNumber'] . '</div>';
        }
        echo '</div>';
    } else {
        echo "<p style='color: red;'>Failed to load seat layout. Please try again.</p>";
    }
} else {
    echo "<p style='color: red;'>Invalid bus data.</p>";
}
