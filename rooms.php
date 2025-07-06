<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinaHotel-Rooms</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
            #room-list-container::-webkit-scrollbar {
        width: 8px;
        }

        #room-list-container::-webkit-scrollbar-thumb {
        background-color: #bbb;
        border-radius: 10px;
        }
    </style>
    
</head>
<body class="bg-light">

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Rooms</h2>  
        <div class="h-line bg-dark"></div>
    </div>
  
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-4 col-md-12">
                <div class="bg-white p-4 shadow rounded-4 border border-light-subtle filter-box" style="transition: 0.3s;">
                    <h4 class="mb-4 fw-bold text-dark d-flex align-items-center">
                    <i class="bi bi-funnel-fill me-2 text-primary fs-4"></i> Filter Your Stay
                    </h4>

                    <!-- Availability -->
                    <div class="mb-4">
                    <h6 class="text-muted fw-semibold mb-3 d-flex align-items-center">
                        <i class="bi bi-calendar2-week-fill me-2 text-success"></i> Date Selection
                    </h6>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control shadow-sm rounded-3" id="checkin">
                        <label for="checkin">Check-in</label>
                    </div>
                    <div class="form-floating">
                        <input type="date" class="form-control shadow-sm rounded-3" id="checkout">
                        <label for="checkout">Check-out</label>
                    </div>
                    </div>

                    <!-- Facilities -->
                    <div class="mb-4">
                    <h6 class="text-muted fw-semibold mb-3 d-flex align-items-center">
                        <i class="bi bi-stars me-2 text-warning"></i> Hotel Facilities
                    </h6>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="wifi">
                        <label class="form-check-label" for="wifi">Free Wi-Fi</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="pool">
                        <label class="form-check-label" for="pool">Swimming Pool</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="spa">
                        <label class="form-check-label" for="spa">Spa & Wellness</label>
                    </div>
                    </div>

                    <!-- Guests -->
                    <div class="mb-4">
                    <h6 class="text-muted fw-semibold mb-3 d-flex align-items-center">
                        <i class="bi bi-people-fill me-2 text-info"></i> Guests
                    </h6>
                    <div class="row g-2">
                        <div class="col-6">
                        <label for="adults" class="form-label">Adults</label>
                        <input type="number" class="form-control shadow-sm rounded-3" id="adults" min="1" value="2">
                        </div>
                        <div class="col-6">
                        <label for="children" class="form-label">Children</label>
                        <input type="number" class="form-control shadow-sm rounded-3" id="children" min="0" value="0">
                        </div>
                    </div>
                    </div>

                    <!-- Filter Button -->
                    <div class="d-grid">
                    <button class="btn btn-primary shadow-sm fw-semibold rounded-pill py-2">
                        <i class="bi bi-search me-1"></i> Apply Filters
                    </button>
                    </div>
                </div>
            </div>






            
                <!--Rooms-->
                <!-- Include this inside your main layout's container -->
                <div class="col-lg-9 col-md-12 mb-4 px-4">

                    <!-- Card wrapper -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                        <!-- Scrollable Room List Container -->
                        <div id="room-list-container" style="max-height: 750px; overflow-y: auto;">

                            <?php
                                require('admin/inc/db_config.php');
                                require('admin/essentials.php');

                                $rooms_r = selectAll('rooms');
                                $path = ROOMS_IMG_PATH;

                                while ($row = mysqli_fetch_assoc($rooms_r)) {
                                    $id = $row['id'];
                                    $name = htmlspecialchars($row['name']);
                                    $features = explode(',', $row['features']);
                                    $facilities = explode(',', $row['facilities']);
                                    $price = htmlspecialchars($row['price']);
                                    $img = $path . $row['picture'];

                                    echo '
                                    <div class="row g-0 mb-3 border-bottom pb-3">
                                        <!-- Room Image -->
                                        <div class="col-md-5">
                                            <img src="' . $img . '" class="img-fluid h-100 w-100 object-fit-cover" alt="' . $name . '">
                                        </div>

                                        <!-- Room Info -->
                                        <div class="col-md-5 px-4 py-3">
                                            <h5 class="fw-bold">' . $name . '</h5>

                                            <!-- Features -->
                                            <div class="mb-3">
                                                <h6 class="mb-1 text-muted">Features</h6>
                                                <div>';
                                                foreach ($features as $f) {
                                                    $f = htmlspecialchars(trim($f));
                                                    echo '<span class="badge bg-secondary-subtle text-dark fw-normal me-1">' . $f . '</span>';
                                                }
                                    echo    '</div>
                                            </div>

                                            <!-- Facilities -->
                                            <div>
                                                <h6 class="mb-1 text-muted">Facilities</h6>
                                                <div>';
                                                foreach ($facilities as $fc) {
                                                    $fc = htmlspecialchars(trim($fc));
                                                    echo '<span class="badge bg-light border text-dark fw-normal me-1">' . $fc . '</span>';
                                                }
                                    echo       '</div>
                                            </div>
                                        </div>

                                        <!-- Price & Actions -->
                                        <div class="col-md-2 d-flex flex-column justify-content-center align-items-center px-3">
                                            <h6 class="text-success mb-3 fw-semibold">BDT ' . $price . ' /night</h6>';

                                            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                                                echo '<button class="btn btn-sm w-100 text-white bg-dark rounded-pill mb-2" onclick="bookRoom(' . $id . ')">Book Now</button>';
                                            } else {
                                                echo '<button class="btn btn-sm w-100 text-white bg-dark rounded-pill mb-2" onclick="alert(\'Please login to book a room.\')">Book Now</button>';
                                            }

                                    echo   '<a href="#" class="btn btn-sm w-100 btn-outline-dark rounded-pill">More Details</a>
                                        </div>
                                    </div>';
                                }

                            ?>
                        </div>
                    </div>
                </div>




        </div>
    </div>

 <br><br><br><br>
    
</body>
</html>

<script>
function bookRoom(room_id){
    window.location.href = "book_room.php?room_id=" + room_id;
}

  document.querySelector(".btn.btn-primary").addEventListener("click", function () {
    let checkin = document.getElementById('checkin').value;
    let checkout = document.getElementById('checkout').value;
    let wifi = document.getElementById('wifi').checked ? 1 : 0;
    let pool = document.getElementById('pool').checked ? 1 : 0;
    let spa = document.getElementById('spa').checked ? 1 : 0;
    let adults = document.getElementById('adults').value;
    let children = document.getElementById('children').value;

    let data = new FormData();
    data.append('checkin', checkin);
    data.append('checkout', checkout);
    data.append('wifi', wifi);
    data.append('pool', pool);
    data.append('spa', spa);
    data.append('adults', adults);
    data.append('children', children);
    data.append('filter_rooms', '');

    fetch('admin/ajax/filter_rooms.php', {
      method: 'POST',
      body: data
    })
    .then(res => res.text())
    .then(data => {
      document.getElementById('room-list-container').innerHTML = data;
    });
  });
</script>


                       