<?php
session_start();
$name = $_POST['name'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$price = $_POST['price_per_day'];
$username = $_SESSION['user']['username'];

if (!empty($enddate) && !empty($startdate) && !empty($name)) {
    require_once './DataBase/database.php';
    $sqlstate = $pdo->prepare("INSERT INTO reservations (car_name, username, rental_start, rental_end)
     VALUES (?, ?, ?, ?)");
    $sqlstate->execute([$name, $username, $startdate, $enddate]);

    // Store reservation information in session variables
    $_SESSION['reservation'] = [
        'name' => $name,
        'startdate' => $startdate,
        'enddate' => $enddate,
        'price' => $price
    ];

    // Redirect to the second page
    header('Location: downloadRecu.php');
    exit;
} else {
    header('Location: reservationuser.php');
    exit;
}
