<!-- reservation page -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/reservationCar.css">
</head>

<body>






    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:login.php");
        exit(); // Add exit() to prevent further execution
    }

    // Check if form data is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the required POST variables are set
        if (isset($_POST['image']) && isset($_POST['name']) && isset($_POST['price_per_day']) && isset($_POST['city'])) {
            // Assign the POST data to session variables
            $_SESSION['image'] = htmlspecialchars($_POST['image']);
            $_SESSION['name'] = htmlspecialchars($_POST['name']);
            $_SESSION['price_per_day'] = htmlspecialchars($_POST['price_per_day']);
            $_SESSION['city'] = htmlspecialchars($_POST['city']);
        }
    }
    ?>

    <div class="container d-flex justify-content-center align-items-center flex-column pt-4">
        <h1 class="text-center">Complete Votre Reservation</h1>

        <div class="reservation-card d-flex justify-content-center align-items-center flex-column  container">
            <img src="./upload/<?php echo isset($_SESSION['image']) ? $_SESSION['image'] : ''; ?>" alt="" class="my-image">
            <h3><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></h3>
            <h4><?php echo isset($_SESSION['price_per_day']) ? $_SESSION['price_per_day'] : ''; ?></h3>
                <h5><?php echo isset($_SESSION['city']) ? $_SESSION['city'] : ''; ?></h3>
        </div>

        <div class="card-layout">
            <form method="post" action="complete.php">
                <input type="hidden" name="image" value="<?php echo isset($_SESSION['image']) ? $_SESSION['image'] : ''; ?>">
                <input type="hidden" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
                <input type="hidden" name="price_per_day" value="<?php echo isset($_SESSION['price_per_day']) ? $_SESSION['price_per_day'] : ''; ?>">
                <input type="hidden" name="city" value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : ''; ?>">
                <label class="lbl" for="startdate">Entrez la date de début</label>
                <input class="date" type="date" name="startdate">
                <label class="lbl" for="enddate">Entrez la date de fin</label>
                <input class="date" type="date" name="enddate">
                <button type="submit" name="reservation" class="reservation-btn">Ajouter à votre réservation</button>
            </form>
        </div>
    </div>
</body>

</html>