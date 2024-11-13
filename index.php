<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swift Ride</title>
    <link rel="stylesheet" href="css/mainApk.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">


</head>

<body>

    <!-- navbar -->
    <div class="nav-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid mx-4">
                <a class="navbar-brand" href="#">
                    <img src="./images/logo-prime.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars" style="color: white;"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ser">Nos services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contactez-nous</a>
                        </li>
                    </ul>

                    <a href="login.php"><button type="button" class="btn-2">Se connecte</button></a>

                </div>
            </div>
        </nav>


        <!-- section -->

        <div class="container p-2 main">
            <div class="hero-section row p-4 ">
                <h2 class="p-2 fw-bold text-white">Trouvez La Voiture Parfaite Pour Votre Voyage En Un Rien De Temps</h2>
                <div class="col-md-6 p-4 form">
                    <h3>Réservez tout de suite </h3>
                    <!-- conect to dataBase -->
                    <form action="carsCards.php" method="GET">
                        <div class="input-city">
                            <label class="fw-bold" for="city">Entrée La ville :</label><br>
                            <input type="text" name="city" id="city-input" placeholder="Entre la ville">
                        </div>
                        <input type="submit" id="Recherche" value="Recherche">
                        <p class="fw-bold pt-2">Environ 5 agences &#x2714;</p>
                        <p class="fw-bold">Kilométrage illimité sur la plupart des véhicules &#x2714;</p>
                    </form>
                </div>
            </div>
        </div>


    </div>









    <!-- services -->
    <!-- services -->
    <div class="container service-1" id="ser">
        <h2 class="text-center fw-bold">Des Voitures de Qualité pour Tous Vos Besoins</h2>
        <p class="text-center">Notre flotte de voitures de location est composée de véhicules de haute qualité pour répondre à toutes vos exigences de voyage. Que vous ayez besoin <br>
            d'une voiture compacte pour naviguer en ville, d'un SUV spacieux pour des aventures en famille, ou d'un véhicule de luxe pour des occasions spéciales,<br> nous avons le modèle parfait pour vous. Tous nos véhicules sont modernes, bien entretenus et équipés des dernières technologies pour garantir
            <br> votre confort et votre sécurité. Nous nous engageons à offrir une expérience de conduite exceptionnelle, peu importe la destination.
        </p>
        <div class="marque row justify-content-center p-2">
            <div class="col-md-2 d-flex justify-content-center bg-white rounded-pill p-2">
                <img class="img-logo" src="./images/a.png" alt="">
            </div>

            <div class="col-md-2 d-flex justify-content-center bg-white rounded-pill p-2">
                <img class=" img-logo" src="./images/b.png" alt="">
            </div>

            <div class="col-md-2 d-flex justify-content-center bg-white rounded-pill p-2">
                <img class=" img-logo" src="./images/c.png" alt="">
            </div>

            <div class="col-md-2 d-flex justify-content-center bg-white rounded-pill p-2">
                <img class=" img-logo" src="./images/d.png" alt="">
            </div>

            <div class="col-md-2 d-flex justify-content-center bg-white rounded-pill p-2">
                <img class=" img-logo" src="./images/e.png" alt="">
            </div>

            <div class="col-md-2 d-flex justify-content-center bg-white rounded-pill p-2">
                <img class=" img-logo" src="./images/f.png" alt="">
            </div>
        </div>
    </div>

    <div class="title-cards container">
        <h5 class="text-center p-4 text-wrap fw-bold">Nous proposons de nombreuses options de location de voitures pour tous vos besoins. Que ce soit une voiture compacte, un SUV spacieux ou une voiture de luxe, nous avons la solution idéale pour vous.</h5>
        <p class="text-center text-wrap">Profitez de réductions incroyables sur nos locations de voitures en Maroc</p>

    </div>
    <div class="cards-main container">
        <div class="row">
            <div class="col-md-2 card-car">
                <h6>Clio 5</h6>
                <img src="./images/cards/clio5.webp" alt="">
                <h5 class="fw-bold">340 DH / Jour</h5>
            </div>

            <div class="col-md-2 card-car">
                <h6>Dacia Logan</h6>
                <img src="./images/cards/dacia logan.png" alt="">
                <h5 class="fw-bold">320 DH / Jour</h5>
            </div>

            <div class="col-md-2 card-car">
                <h6>Dacia Sandro</h6>
                <img src="./images/cards/dacia sandro.png" alt="">
                <h5 class="fw-bold">300 DH / Jour</h5>
            </div>

            <div class="col-md-2 card-car">
                <h6>Fiat 500</h6>
                <img src="./images/cards/fiat 500.png" alt="">
                <h5 class="fw-bold">320 DH / Jour</h5>
            </div>


            <div class="col-md-2 card-car">
                <h6>Golf 7</h6>
                <img src="./images/cards/golf 7.png" alt="">
                <h5 class="fw-bold">380 DH / Jour</h5>
            </div>


            <div class="col-md-2 card-car">
                <h6>Hyundai i10</h6>
                <img src="./images/cards/hyundai i10.png" alt="">
                <h5 class="fw-bold">399 DH / Jour</h5>
            </div>



        </div>

    </div>






    <!-- end-section -->

    <!-- contact-nos -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['FirstName'];
        $last_name = $_POST['LastName'];
        $email = $_POST['emailInfo'];
        $phone = $_POST['phoneInfo'];
        $message = $_POST['message'];

        if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($message)) {
            require_once './DataBase/database.php';

            try {
                $sql = "INSERT INTO contacts (first_name, last_name, email, phone, message) VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$first_name, $last_name, $email, $phone, $message]);
                echo "New record created successfully";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "All fields are required!";
        }
    }
    ?>

    <div class="contact" id="contact">
        <h1 class="text-center">CONTACTEZ-NOUS</h1>
        <p class="text-center text-wrap">N'hésitez pas à nous contacter pour toute question que vous pourriez avoir,<br>
            pour
            obtenir de plus amples informations sur nos services ou pour découvrir comment nous pouvons vous assister
        </p>
    </div>
    <div class="container contact-form">
        <form class="row g-3" method="post" action="">
            <div class="col-md-6">
                <label for="FirstName" class="form-label">Nom</label>
                <input type="text" class="form-control" id="FirstName" name="FirstName" required>
            </div>
            <div class="col-md-6">
                <label for="LastName" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="LastName" name="LastName" required>
            </div>
            <div class="col-md-8">
                <label for="emailInfo" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="emailInfo" name="emailInfo" required>
            </div>
            <div class="col-md-4">
                <label for="phoneInfo" class="form-label">numéro de téléphone</label>
                <input type="text" id="phoneInfo" class="form-control" name="phoneInfo" placeholder="+(212)">
            </div>
            <div class="col-md-12">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Votre Message.."></textarea>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn-2 w-25 p-2">Envoyé</button>
            </div>
        </form>
    </div>





    <!-- footer -->
    <div class="footer rounded p-2 mt-2">
        <div class="container">
            <div class="row">

                <div class="col-md-4 mt-2">
                    <img class="footer-logo" src="./images/logo-prime.png" alt="">
                </div>

                <div class="col-md-4 d-flex justify-content-evenly flex-column">
                    <a class="fw-bold fs-6 text-white text-decoration-none mt-2 link" href=""> <i class="fa-brands fa-facebook fs-4 me-2 link" style="color: #ffffff;"></i>Facebook</a>
                    <a class="fw-bold fs-6 text-white text-decoration-none mt-2 link" href=""> <i class="fa-brands fa-instagram fs-4 me-2 link" style="color: #ffffff;"></i>Instagram</a>
                    <a class="fw-bold fs-6 text-white text-decoration-none mt-2 link" href=""> <i class="fa-brands fa-x-twitter fs-4 me-2 link" style="color: #ffffff;"></i>X</a>
                </div>

                <div class="col-md-4 d-flex justify-content-evenly flex-column mt-2">
                    <a class="fw-bold fs-6 text-white text-decoration-none mt-2 link" href=""> <i class="fa-solid fa-map-pin fs-4 me-2 link" style="color: #ffffff;"></i>Location Example Street A</a>
                    <a class="fw-bold fs-6 text-white text-decoration-none mt-2 link" href=""> <i class="fa-regular fa-copyright fs-4 me-2 link" style="color: #ffffff;"></i>2024 SwiftRide. Tous droits réservés.</a>
                </div>
            </div>
        </div>
    </div>





    <script src="profile.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>