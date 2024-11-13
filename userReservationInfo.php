<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./css/submenu.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/tableReservationProfile.css">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:login.php");
    }
    ?>



    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Swift Ride</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars" style="color: white;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link bg-light fw-bold rounded w-100 p-25 " aria-current="page" href="./profile.php">Accueil</a>
                    </li>
                </ul>

                <img class="profile-img" src="./images/User-Profile-PNG-Image.png" onclick="toggleMenu()">
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <h4 class="text-black text-center fit-content"><?php echo $_SESSION['user']['username']; ?></h4>
                        </div>
                        <button class="btn btn-success mt-2"><a href="./userReservationInfo.php"> My Reservation</a></button>
                        <form method="post" action="">
                            <button class="btn btn-danger mt-2" type="submit" name="logout">Deconnecte</button>
                        </form>
                    </div>
                </div>

                <?php
                // Check if the logout button has been pressed
                if (isset($_POST['logout'])) {
                    // Start the session
                    session_start();

                    // Unset all session variables
                    $_SESSION = array();

                    // Destroy the session
                    session_destroy();

                    // Redirect to the login page
                    header("location: login.php");
                    exit();
                }
                ?>

            </div>
        </div>
    </nav>



    <div class="container p-2">
        <h1 class="text-center">Ma réservation</h1>
        <?php
        require_once './DataBase/database.php';
        $username = $_SESSION['user']['username'];

        // Prepare the SQL query
        $sql = "SELECT id, car_name, username, rental_start, rental_end FROM reservations WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->execute();
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if there are any rows returned
        if ($reservations) {
            // Display the table header
            echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nom de la voiture</th>
                <th>Nom d'utilisateur</th>
                <th>début de location</th>
                <th>fin de location</th>
            </tr>";

            // Iterate over the rows using foreach
            foreach ($reservations as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['car_name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['rental_start'] . "</td>";
                echo "<td>" . $row['rental_end'] . "</td>";
                echo "</tr>";
            }

            // Close the table
            echo "</table>";
        } else {
            echo "No reservations found for username: $username";
        }
        ?>

    </div>










</body>

</html>