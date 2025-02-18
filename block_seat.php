<?php
require_once 'api_helper.php';

$data = [
    'UserIp' => USER_IP,
    'SearchTokenId' => 'TOKEN_HERE',
    'ResultIndex' => 1,
    'BoardingPointId' => 101,
    'DroppingPointId' => 202,
    'Passenger' => [
        'LeadPassenger' => true,
        'Title' => 'Mr',
        'FirstName' => 'John',
        'LastName' => 'Doe',
        'Email' => 'mailto:john.doe@example.com',
        'Phoneno' => '1234567890',
        'Gender' => 1, // 1 for male, 2 for female
        'Age' => 30,
        'SeatName' => 'A1'
    ]
];

$response = callApi('blockseat', $data);

echo json_encode($response, JSON_PRETTY_PRINT);
?>
