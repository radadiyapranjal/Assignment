<?php


function searchBus($userIp, $dateOfJourney, $originId, $destinationId) {
    $url = "https://staging.mmrtrip.in/api/busservice/rest/search";
    $data = [
        "UserIp" => $userIp,
        "DateOfJourney" => $dateOfJourney,
        "OriginId" => $originId,
        "DestinationId" => $destinationId
    ];
    return callAPI($url, $data);
}


?>