<?php
function getSeatLayout($userIp, $searchTokenId, $resultIndex) {
    $url = "https://staging.mmrtrip.in/api/busservice/rest/seatlayout";
    $data = [
        "UserIp" => $userIp,
        "SearchTokenId" => $searchTokenId,
        "ResultIndex" => $resultIndex
    ];
    return callAPI($url, $data);
}

?>
