<?php

function getBookingDetail($bookingId) {
    $url = "https://staging.mmrtrip.in/api/busservice/rest/getbookingdetail";
    $data = [
        "bookingId" => $bookingId
    ];
    return callAPI($url, $data);
}


?>