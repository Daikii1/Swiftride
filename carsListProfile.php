<!-- carList page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <title>Available cars</title>
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:login.php");
    }



    ?>

    <div class="container pt-4">
        <h1 class="text-center">Nos Voitures Disponibles</h1>
        <p class="text-center">Découvrez notre large gamme de voitures disponibles à la location. Que vous ayez besoin d'une voiture compacte pour des déplacements urbains, d'un SUV spacieux pour des voyages en famille, ou d'un véhicule de luxe pour des occasions spéciales, nous avons le véhicule parfait pour vous. Chaque voiture est soigneusement entretenue et équipée des dernières technologies pour assurer
            votre confort et votre sécurité sur la route. Parcourez notre sélection et trouvez
            la voiture qui répond à tous vos besoins.</p>

        <div class="card-layout">

            <?php
            if (isset($_GET['city'])) {
                $city = $_GET['city'];
                require_once './DataBase/database.php';

                $sql = "SELECT * FROM cars WHERE city = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$city]);
                $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($cars) {
                    foreach ($cars as $car) {
                        echo '<div class="maincard">';
                        echo '<img src="upload/' . htmlspecialchars($car["image"]) . '" alt="Car Image">';
                        echo '<h3>' . htmlspecialchars($car["name"]) . '</h3>';
                        echo '<span class="price">Prix par jour: ' . htmlspecialchars($car["price_per_day"]) . ' dh</span><br>';
                        echo '<span class="disponible">Disponible</span><br>';
                        echo '<span class="ville">Ville : ' . htmlspecialchars($car["city"]) . '</span><br>';
                        echo '<form action="reservationuser.php" method="POST">';
                        echo '<input type="hidden" name="image" value="' . htmlspecialchars($car["image"]) . '">';
                        echo '<input type="hidden" name="name" value="' . htmlspecialchars($car["name"]) . '">';
                        echo '<input type="hidden" name="price_per_day" value="' . htmlspecialchars($car["price_per_day"]) . '">';
                        echo '<input type="hidden" name="city" value="' . htmlspecialchars($car["city"]) . '">';
                        echo '<button type="submit" class="reservation-btn">Réserver</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center">Aucune voiture disponible trouvée dans ' . htmlspecialchars($city) . '.</p>';
                }
            } else {
                echo '<p class="text-center">Veuillez entrer une ville.</p>';
            }
            ?>

        </div>
    </div>

</body>

</html>