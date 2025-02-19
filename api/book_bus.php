<?php
include '../includes/call_api.php';

function bookBus($userIp, $searchTokenId, $resultIndex, $passengerDetails) {
    $url = "https://staging.mmrtrip.in/api/busservice/rest/book";
    $data = [
        "UserIp" => $userIp,
        "SearchTokenId" => $searchTokenId,
        "ResultIndex" => $resultIndex,
        "Passenger" => $passengerDetails
    ];
    return callAPI($url, $data);
}
?>