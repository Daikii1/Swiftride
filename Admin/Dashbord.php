<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Dashbord</title>
    <link rel="stylesheet" href="../css/dahsbord.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>


    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:AdminSingIn.php");
    }



    ?>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid mx-4">
            <a class="navbar-brand" href="#">Swift Ride</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars" style="color: white;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="active d-flex align-items-center  rounded text-dark p-3" href="Dashbord.php">Dashbord</a>
                    </li>
                    <li class="nav-item">
                        <a class=" d-flex align-items-center rounded text-dark p-3" href="reservation.php">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class=" d-flex align-items-center  rounded text-dark p-3" href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class=" d-flex align-items-center  rounded text-dark p-3" href="carManagment.php">Car Managment</a>
                    </li>
                    <li class="nav-item">
                        <a class=" d-flex align-items-center rounded text-dark p-3" href="AddCar.php">Ajoute Voiture</a>
                    </li>
                    <li class="nav-item">
                        <a class=" d-flex align-items-center rounded text-dark p-3" href="contact.php">Messages</a>
                    </li>

                    <li class="nav-item">
                        <form id="logoutForm" method="post">
                            <a class="d-flex align-items-center rounded text-dark p-3" href="#">
                                <button class="btn-2" type="submit" name="logout">Deconnecte</button>
                            </a>
                        </form>
                    </li>
                </ul>
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
                    header("location: AdminSingIn.php");
                    exit();
                }
                ?>

            </div>
        </div>
    </nav>




    <div class="page d-flex">
        <div class="content p-5">
            <h1 class="text-center text-primary p-3">Welcome to Dashbord</h1>
            <h3 class="text-center text-black p-3"><?php echo $_SESSION['user']['username']; ?>
            </h3>
            <div class="container">

                <!-- reservation -->
                <div class="reservation-total">
                    <?php
                    require_once '../DataBase/database.php';

                    // Prepare the SQL query to count the number of users
                    $sql = "SELECT COUNT(*) FROM reservations";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    // Fetch the count result
                    $reservationCount = $stmt->fetchColumn();
                    ?>

                    <h2>Total de Reservations</h2>
                    <p><?php echo $reservationCount; ?></p>
                </div>

                <!-- Total-users -->

                <?php
                require_once '../DataBase/database.php';
                $sql = "SELECT COUNT(*) FROM users";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $userCount = $stmt->fetchColumn();
                ?>
                <div class="users-total">
                    <h2>Total de Users</h2>
                    <p><?php echo $userCount; ?></p>
                </div>


                <!-- cars-users -->


                <?php
                require_once '../DataBase/database.php';
                $sql = "SELECT COUNT(*) FROM cars";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $carsCount = $stmt->fetchColumn();
                ?>
                <div class="cars-total">
                    <h2>Total de cars</h2>
                    <p><?php echo $carsCount; ?></p>
                </div>

            </div>
        </div>

    </div>

</body>

</body>

</html>