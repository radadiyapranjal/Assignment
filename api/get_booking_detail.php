<?php
include '../includes/call_api.php';

function getBookingDetails($bookingId) {
    $url = "https://staging.mmrtrip.in/api/busservice/rest/getbookingdetail";
    $data = [
        "bookingId" => $bookingId
    ];
    return callAPI($url, $data);
}
?>