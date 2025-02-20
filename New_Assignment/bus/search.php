<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Trip24" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Volvo Bus Ticket -Trip24</title>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700&amp;display=swap"
        rel="stylesheet" />
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

        .search-form {
            display: grid;
            grid-template-columns: repeat(3, 1fr) auto;
            gap: 15px;
            align-items: end;
        }

        .form-group {
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #666;
            font-size: 14px;
            font-weight: 500;
        }

        select,
        input[type="date"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background: white;
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

        .bus-list {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
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

        .bus-info {
            flex: 1;
        }

        .bus-name {
            font-size: 20px;
            color: #333;
            margin-bottom: 5px;
        }

        .bus-type {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .timing {
            display: flex;
            gap: 30px;
            margin-bottom: 15px;
        }

        .time-group {
            flex: 1;
        }

        .time {
            font-size: 24px;
            color: #333;
            font-weight: 500;
        }

        .city {
            color: #666;
            font-size: 14px;
        }

        .duration {
            color: #666;
            text-align: center;
            padding-top: 25px;
        }

        .amenities {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .amenity {
            background: #f5f5f5;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            color: #444;
        }

        .price-section {
            width: 200px;
            text-align: right;
            border-left: 1px solid #eee;
            padding-left: 25px;
        }

        .price {
            font-size: 24px;
            color: #d84e55;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .seats {
            color: #4CAF50;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .btn-book {
            background: #4CAF50;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 4px;
        }

        .no-results {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <!-- start per-loader -->
    <div class="loader-container">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- end per-loader -->
    <?php
    include("../header.php");
    ?>
    <style>
        .bread-bg {
            background-image: url(../img/banner_banner.jpg);
        }
    </style>

    <section class="blog-area padding-top-60px padding-bottom-90px">
        <div class="container">
            <!-- end col-lg-8 -->
            <div class="col-lg-12">
                <div class="sidebar">
                    <!-- <div
                        class="author-verified bg-success p-3 rounded text-white text-center mb-4"
                        data-bs-toggle="tooltip"
                        data-placement="top"
                        title="Listing has been verified and belongs the business owner or manager">
                        <i class="far fa-check me-2"></i>
                        Available Bus
                    </div> -->
                    <div class="card">
                        <form method="GET">
                        <div class="card-body ">
                            <h4 class="card-title mb-3">Volvo Bus Ticket Booking</h4>
                            <div class="d-flex gap-2" >
                            
                            <div class="form-group col-lg-3">
                                <span class="fas fa-location form-icon"></span>
                                <select name="OriginId" class="form-control form--control select">
                                    <option selected disabled>Select Pickup Location</option>
                                    <option value="8463" >Delhi</option>
                                    <option value="8475">Chandigarh</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-lg-3">
                                <span class="fas fa-location form-icon"></span>
                                <select name="DestinationId" class="form-control form--control select">
                                    <option selected disabled>Select Drop Location</option>
                                    <option value="9573" >Shimla</option>
                                    <option value="9585">Manali</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-lg-3">
                                <span class="fas fa-calendar form-icon"></span>
                                <input type="date" name="DateOfJourney" class="form-control form--control">
                            </div>

                           <div class="col-lg-3" >
                            <button type="submit" class="theme-btn w-100">Search</button>
                           </div>
                            </div>
                          
                        </div>
                        </form>
                        <!-- end card-body -->
                    </div>
                     <div class="results">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $date = isset($_GET["DateOfJourney"]) ? htmlspecialchars($_GET["DateOfJourney"]) : null;
                $origin = isset($_GET["OriginId"]) ? htmlspecialchars($_GET["OriginId"]) : null;
                $destination = isset($_GET["DestinationId"]) ? htmlspecialchars($_GET["DestinationId"]) : null;
                
              
                if ($date && $origin && $destination) {
                    $url = "https://staging.mmrtrip.in/api/busservice/rest/search";
                    $data = [
                        "UserIp" => "103.209.223.52",
                        "DateOfJourney" => $date,
                        "OriginId" => $origin,
                        "DestinationId" => $destination
                    ];
                    $jsonData = json_encode($data);
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        "Content-Type: application/json",
                        "Username: AAKFE2643K",
                        "Password: 3593564"
                    ]);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    $result = json_decode($response, true);
                
                    if (!empty($result['Result'])) {
                        echo '<div class="bus-list">';
                        foreach ($result['Result'] as $bus) {
                            echo '
                                <div class="bus-card">
                                    <div class="bus-info">
                                        <div class="bus-name">' . $bus['TravelName'] . '</div>
                                        <div class="bus-type">' . $bus['BusType'] . '</div>
                                        <div class="timing">
                                            <div class="time-group">
                                                <div class="time">' . date("d M Y, h:i A", strtotime($bus['DepartureTime'])) . '</div>
                                                <div class="city">' . $bus['BoardingPointsDetails'][0]['CityPointName'] . '</div>
                                            </div>
                                            <div class="duration">N/A</div>
                                            <div class="time-group">
                                                <div class="time">' . date("d M Y, h:i A", strtotime($bus['ArrivalTime'])) . '</div>
                                                <div class="city">' . $bus['DroppingPointsDetails'][0]['CityPointName'] . '</div>
                                            </div>
                                        </div>
                                        <div class="amenities"></div>
                                    </div>
                                    <div class="price-section">
                                        <div class="price">' . number_format($bus['BusPrice']['PublishedPrice'], 2) . '</div>
                                        <div class="seats">' . $bus['AvailableSeats'] . ' Seats Available</div>
                                        <a class="btn-book" href="seat_selection.php?searchTokenId=' . urlencode($bus['SearchTokenId'] ?? '') . '&resultIndex=' . urlencode($bus['ResultIndex'] ?? '') . '">View Seats</a>

                                    </div>
                                </div>';
                        }
                        echo '</div>';
                    } else {
                        echo "<p style='text-align: center; color: red;'>No buses available for the selected route.</p>";
                    }
                } else {
                    echo "<p style='text-align: center; color: #666;'>Select your journey details to find available buses</p>";
                }
            }                
            ?>
        </div>
                    <!-- end card -->
                </div>
                <!-- end sidebar -->
            </div>
            
        </div>
        <!-- end container -->
    </section>
    <!-- end blog-area -->
    <!-- ================================
       START BLOG AREA
================================= -->
    <?php
    include("../footer.php");
    ?>
    <!-- start back-to-top -->
    <div id="back-to-top">
        <i class="fal fa-angle-up" title="Go top"></i>
    </div>
    <!-- end back-to-top -->
    <!-- Template JS Files -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.lazy.min.js"></script>
    <script src="../js/rating-script.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>