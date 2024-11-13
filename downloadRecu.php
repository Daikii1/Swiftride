<?php
session_start();
$username = $_SESSION['user']['username'];
// Retrieve reservation information from session variables
if (isset($_SESSION['reservation'])) {
    $reservation = $_SESSION['reservation'];
    $name = $reservation['name'];
    $startdate = $reservation['startdate'];
    $enddate = $reservation['enddate'];
    $pricePerDay = $reservation['price'];

    // Calculate the number of days
    $startDate = new DateTime($startdate);
    $endDate = new DateTime($enddate);
    $interval = $startDate->diff($endDate);
    $numberOfDays = $interval->days;

    // Calculate the total price
    $totalPrice = $numberOfDays * $pricePerDay;
} else {
    // Handle case where session variables are not set
    header('Location: reservationuser.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/recu.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Receipt</title>
</head>

<body>
    <a class="nav-link text-center m-4 fw-bold fit-content" aria-current="page" href="./profile.php">Accueil</a>

    <div class="container main p-4" id="toDownload">
        <h1>Client receipt <span><img class="img-print" src="./images/printer.svg" alt=""></span></h1>
        <h6 class="text-success">Votre Reservation is confrmied </h6>
        <div class="recu p-4">
            <!-- Receipt content here -->
            <h2 class=""><span class="text-secondary">Name :</span> <?php echo $username; ?> </h2>

            <h4 class="pt-4"><span class="text-secondary">Voiture a louer</span> <?php echo $name; ?> </h4>
            <div class="info pt-4">
                <span><span class="text-secondary">Start Date : : </span><?php echo $startdate; ?> </span>
                <span><span class="text-secondary">End Date :</span> <?php echo $enddate; ?> </span>
            </div>
            <hr>
            <h4 class="pt-4 text-secondary">Le Prix par jour : <span class="text-success"><?php echo $pricePerDay; ?> DH</span> </h4>
            <h4 class="pt-2 text-secondary">Le Prix Total : <span class="text-success"><?php echo $totalPrice; ?> DH</span> </h4>

        </div>
        <img class="logo" src="./images/SwiftLogo.png" alt="">
    </div>
    <button id="downloadBtn" class="btn btn-success d-block mx-auto">Imprimer</button>

    <script src="./profile.js"></script>

</body>

</html>