<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Trip24" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Volvo Bus Ticket - Trip24</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/select2.min.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .search-box {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .bus-list {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        button {
            background: #d84e55;
            color: white;
            border: none;
            padding: 13px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        button:hover {
            background: #c23d43;
        }

        .no-results {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
        }

        .bus-card {
            display: flex;
            gap: 25px;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .bus-card:last-child {
            border-bottom: none;
        }

        .price {
            font-size: 24px;
            color: #d84e55;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php include("../header.php"); ?>

    <style>
        .bread-bg {
            background-image: url(../img/banner_banner.jpg);
        }
    </style>

    <section class="blog-area padding-top-60px padding-bottom-90px">
        <div class="container">
            <div class="col-lg-12">
                <div class="sidebar">
                    <div class="card">
                        <form method="GET" action="">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Volvo Bus Ticket Booking</h4>
                                <div class="d-flex gap-2">
                                    <div class="form-group col-lg-3">
                                        <select name="OriginId" class="form-control select" required>
                                            <option selected disabled>Select Pickup Location</option>
                                            <option value="8463">Delhi</option>
                                            <option value="8475">Chandigarh</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <select name="DestinationId" class="form-control select" required>
                                            <option selected disabled>Select Drop Location</option>
                                            <option value="9573">Shimla</option>
                                            <option value="9585">Manali</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <input class="form-control date-picker" type="date" name="DateOfJourney" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="theme-btn w-100">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="results">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['DateOfJourney'], $_GET['OriginId'], $_GET['DestinationId'])) {

                            // ✅ Sanitize input data
                            $date = htmlspecialchars($_GET["DateOfJourney"]);
                            $origin = htmlspecialchars($_GET["OriginId"]);
                            $destination = htmlspecialchars($_GET["DestinationId"]);

                            // ✅ API request
                            $url = "https://staging.mmrtrip.in/api/busservice/rest/search";
                            $data = [
                                "UserIp" => "103.209.223.52",
                                "DateOfJourney" => $date,
                                "OriginId" => $origin,
                                "DestinationId" => $destination
                            ];
                            $jsonData = json_encode($data);

                            // ✅ Initialize cURL request
                            $ch = curl_init($url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                                "Content-Type: application/json",
                                "Username: AAKFE2643K",  // Replace with actual username
                                "Password: 3593564"     // Replace with actual password
                            ]);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

                            $response = curl_exec($ch);
                            curl_close($ch);

                            // ✅ Decode JSON response
                            $result = json_decode($response, true);

                            // ✅ Display results
                            if (!empty($result['Result'])) {
                                echo "<div class='bus-list'>";
                                foreach ($result['Result'] as $bus) {
                                    echo "<div class='bus-card'>";
                                    echo "<div class='bus-info'>";
                                    echo "<div class='bus-name'>{$bus['TravelName']}</div>";
                                    echo "<div class='bus-type'>{$bus['BusType']}</div>";
                                    echo "<div class='timing'>";
                                    echo "<div class='time-group'>";
                                    echo "<div class='time'>" . date("d M Y, h:i A", strtotime($bus['DepartureTime'])) . "</div>";
                                    echo "<div class='city'>{$bus['BoardingPointsDetails'][0]['CityPointName']}</div>";
                                    echo "</div>";
                                    echo "<div class='duration'>N/A</div>";
                                    echo "<div class='time-group'>";
                                    echo "<div class='time'>" . date("d M Y, h:i A", strtotime($bus['ArrivalTime'])) . "</div>";
                                    echo "<div class='city'>{$bus['DroppingPointsDetails'][0]['CityPointName']}</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class='price-section'>";
                                    echo "<div class='price'>₹" . number_format($bus['BusPrice']['PublishedPrice'], 2) . "</div>";
                                    echo "<div class='seats'>{$bus['AvailableSeats']} Seats Available</div>";
                                    echo "<a class='btn-book' href='seat_selection.php?bus=" . urlencode(json_encode($bus)) . "'>View Seats</a>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                echo "</div>";
                            } else {
                                echo "<p style='text-align: center; color: red;'>No buses available for the selected route.</p>";
                            }
                        } else {
                            echo "<p style='text-align: center; color: #666;'>Select your journey details to find available buses</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("../footer.php"); ?>

    <!-- JavaScript -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.lazy.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
