<?php

function bookBus($userIp, $searchTokenId, $resultIndex, $clientReferenceNo, $passengerDetails) {
    $url = "https://staging.mmrtrip.in/api/busservice/rest/book";
    $data = [
        "UserIp" => $userIp,
        "SearchTokenId" => $searchTokenId,
        "ResultIndex" => $resultIndex,
        "ClientReferenceNo" => $clientReferenceNo,
        "Passengers" => $passengerDetails
    ];
    return callAPI($url, $data);
}


?>