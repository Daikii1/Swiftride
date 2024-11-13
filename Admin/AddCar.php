<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Add Car</title>
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

        <!-- addcar -->
        <?php
        require_once '../DataBase/database.php';

        ?>

        <?php
        if (isset($_POST['addcar'])) {
            $carname = $_POST['carname'];
            $marke = $_POST['marke'];
            $price = $_POST['price'];
            $city = $_POST['city'];


            $filename = "";

            if (isset($_FILES['image'])) {
                $image = $_FILES['image']['name'];
                $filename = uniqid() . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], '../upload/' . $filename);
            }


            if (!empty($carname) && !empty($marke) && !empty($price)) {
                $sqlState = $pdo->prepare('INSERT INTO cars VALUES (null,?,?,?,?,?)');
                $sqlState->execute([$marke, $carname, $price, $city, $filename]);
                echo "Car added successfully!";
            }
        }

        ?>

        <div class="content d-flex justify-content-center mt-4">
            <form method="post" enctype="multipart/form-data">
                <div class="mt-5">
                    <label for="make">Nom de la voiture:</label><br>
                    <input type="text" id="name" name="carname">
                </div>

                <div>
                    <label for="model">Marque:</label><br>
                    <input type="text" id="marke" name="marke">
                </div>

                <div>
                    <label for="model">Prix ​​par jour :</label><br>
                    <input type="number" id="price" min="0" name="price">
                </div>

                <div>
                    <label for="model">ville</label><br>
                    <input type="text" id="city" name="city">
                </div>

                <div class="file-input-container">
                    <input type="file" id="fileInput" name="image">
                    <div class="file-input-button" id="fileInputButton">Choisir une image</div>
                </div>
                <div id="selectedFileName"></div>

                <input class="btn btn-success mt-4" type="submit" name="addcar" value="Add Car">
            </form>





        </div>
    </div>




    <script src="./admin.js"></script>

</body>

</html>