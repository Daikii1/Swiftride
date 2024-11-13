<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dahsbord.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<title>Car Management</title>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location: AdminSingIn.php");
    }

    require_once '../DataBase/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_car_id'])) {
        $carId = $_POST['delete_car_id'];
        $deleteStmt = $pdo->prepare('DELETE FROM cars WHERE id = ?');
        $deleteStmt->execute([$carId]);
    }

    $cars = $pdo->query('SELECT * FROM cars')->fetchAll(PDO::FETCH_ASSOC);
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
            <div class="table-reservation">
                <table>
                    <thead>
                        <tr>
                            <th>Car ID</th>
                            <th>Car Name</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>City</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cars as $car) : ?>
                            <tr>
                                <td><?php echo $car['id']; ?></td>
                                <td><?php echo $car['name']; ?></td>
                                <td><?php echo $car['brand']; ?></td>
                                <td><?php echo $car['price_per_day']; ?></td>
                                <td><?php echo $car['city']; ?></td>
                                <td>
                                    <form method="post" onsubmit="return confirm('Are you sure you want to delete this car?');">
                                        <input type="hidden" name="delete_car_id" value="<?php echo $car['id']; ?>">
                                        <button class="btn btn-danger" type="submit">Suprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>