<?php
session_start();
require('admin/inc/db_config.php');
require('admin/essentials.php');

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
    header('Location: index.php');
    exit;
}

if(!isset($_GET['room_id'])){
    header('Location: rooms.php');
    exit;
}

$room_id = intval($_GET['room_id']);

// Fetch room details
$room = null;
$q = "SELECT * FROM rooms WHERE id = ?";
$stmt = $con->prepare($q);
$stmt->bind_param('i', $room_id);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows == 1){
    $room = $result->fetch_assoc();
} else {
    header('Location: rooms.php');
    exit;
}

// Form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $user_id = $_SESSION['user_id'];
    $payment_method = $_POST['payment_method'];
    $trx_id = $_POST['trx_id'];
    $total_amount = $_POST['amount'] ?? null;

    if ($total_amount === null || $total_amount === '') {
        $error_msg = "Please select valid check-in and check-out dates to calculate amount.";
    } else {
        $stmt = $con->prepare("INSERT INTO bookings (user_id, room_id, checkin, checkout, payment_method, trx_id, amount) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('iisssss', $user_id, $room_id, $checkin, $checkout, $payment_method, $trx_id, $total_amount);

        if ($stmt->execute()) {
            $success_msg = "Your booking has been confirmed successfully!";
        } else {
            $error_msg = "Sorry, your booking could not be completed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Book Room</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: #f8f9fa;
    }
    .full-height-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
    }
    .form-box {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        max-width: 600px;
        width: 100%;
        padding: 30px 20px;
    }
    @media (max-width: 576px) {
        .form-box {
            border-radius: 0;
            box-shadow: none;
            height: 100vh;
            padding: 20px 15px;
            overflow-y: auto;
        }
    }
</style>
</head>
<body>

<div class="container-fluid full-height-container">
    <div class="form-box">
        <h2 class="text-center room-title mb-4">Book Room: <?= htmlspecialchars($room['name']); ?></h2>

        <?php if(isset($success_msg)): ?>
            <div class="alert alert-success text-center"><?= $success_msg; ?></div>
        <?php elseif(isset($error_msg)): ?>
            <div class="alert alert-danger text-center"><?= $error_msg; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-semibold">Check-in Date</label>
                <input type="date" name="checkin" required class="form-control shadow-sm" />
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Check-out Date</label>
                <input type="date" name="checkout" required class="form-control shadow-sm" />
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total Amount (BDT)</label>
                <input type="text" id="total_amount" name="amount" class="form-control shadow-sm bg-light" readonly />
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Payment Method</label>
                <select name="payment_method" required class="form-select shadow-sm">
                    <option value="" disabled selected>Select a method</option>
                    <option value="bkash">bKash</option>
                    <option value="nagad">Nagad</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Transaction ID</label>
                <input type="text" name="trx_id" required class="form-control shadow-sm" placeholder="e.g. TX123456" />
                <div class="form-text">Send payment to: <strong class="text-bold">01962613283</strong> and input Transaction ID above</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Pay with</label>
                <div class="d-flex gap-3">
                    <button type="button" class="btn btn-outline-danger" onclick="startBkashPayment()">bKash</button>
                    <button type="button" class="btn btn-outline-warning" onclick="alert('Nagad integration coming soon')">Nagad</button>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark rounded-pill py-2">Confirm Booking</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="rooms.php" class="btn btn-outline-secondary rounded-pill">← Back to Rooms</a>
        </div>
    </div>
</div>


</body>
</html>

<script>
    const pricePerNight = <?= $room['price']; ?>;

    const checkinInput = document.querySelector('input[name="checkin"]');
    const checkoutInput = document.querySelector('input[name="checkout"]');
    const totalAmountField = document.getElementById('total_amount');

    function calculateAmount() {
        const checkin = new Date(checkinInput.value);
        const checkout = new Date(checkoutInput.value);

        if (!isNaN(checkin.getTime()) && !isNaN(checkout.getTime()) && checkout > checkin) {
            const timeDiff = checkout - checkin;
            const days = timeDiff / (1000 * 60 * 60 * 24);
            const total = days * pricePerNight;

            totalAmountField.value = total.toFixed(2);
        } else {
            totalAmountField.value = '';
        }
    }

    checkinInput.addEventListener('change', calculateAmount);
    checkoutInput.addEventListener('change', calculateAmount);

    function startBkashPayment() {
    const amount = document.getElementById('total_amount').value;

    if (!amount || isNaN(amount)) {
        alert("Please select valid check-in & check-out dates first.");
        return;
    }

    // fetch('payment/bkash/init.php')
    // .then(res => res.json())
    // .then(init => {
    //     if (init.success) {
            
    //         fetch('payment/bkash/create_payment.php', {
    //             method: 'POST',
    //             headers: {'Content-Type': 'application/json'},
    //             body: JSON.stringify({amount: 500}) 
    //         })
    //         .then(res => res.json())
    //         .then(data => {
    //             if (data.bkashURL) {
    //                 window.location.href = data.bkashURL;
    //             } else {
    //                 alert('Payment Error: ' + JSON.stringify(data.error));
    //             }
    //         });
    //     } else {
    //         alert('Failed to get bKash token');
    //         console.error(init.error);
    //     }
    // });
    }
</script>
