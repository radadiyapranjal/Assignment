<?php
include '../includes/call_api.php';

function blockSeat($userIp, $searchTokenId, $resultIndex, $boardingPointId, $droppingPointId, $passengerDetails) {
    $url = "https://staging.mmrtrip.in/api/busservice/rest/blockseat";
    $data = [
        "UserIp" => $userIp,
        "SearchTokenId" => $searchTokenId,
        "ResultIndex" => $resultIndex,
        "BoardingPointId" => $boardingPointId,
        "DroppingPointId" => $droppingPointId,
        "Passenger" => $passengerDetails
    ];
    return callAPI($url, $data);
}
?>