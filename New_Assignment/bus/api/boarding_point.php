<?php
function getBoardingPoints($userIp, $searchTokenId, $resultIndex) {
    $url = "https://staging.mmrtrip.in/api/busservice/rest/boardingpoint";
    $data = [
        "UserIp" => $userIp,
        "SearchTokenId" => $searchTokenId,
        "ResultIndex" => $resultIndex
    ];
    return callAPI($url, $data);
}

?>