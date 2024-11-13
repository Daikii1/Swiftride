<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>s'inscrire</title>
    <link rel="stylesheet" href="css/loginForms.css">
    <script src="https://kit.fontawesome.com/b7ab2c703a.js" crossorigin="anonymous"></script>
</head>




<body>

    <div class="container">
        <div class="form-box">
            <h1 id="title">S'inscrire</h1>

            <?php
            if (isset($_POST['adduser'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (!empty($username) && !empty($password) && !empty($email)) {
                    require_once './DataBase/database.php';
                    $sqlstate = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $sqlstate->execute([$username, $email, $hashed_password]);
                    echo "User registration successful! Click Log in to log";
                    //rederction
                    header('location:login.php');
                } else {
                    echo "All fields are required!";
                }
            }
            ?>

            <form method="post" action="">
                <div class="input-group">

                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" placeholder="username">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope-open"></i>
                        <input type="text" name="email" placeholder="email">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" placeholder="password">
                    </div>
                    <p>Se connecter<a href="login.php"> Cliquez ici</a></p>

                    <div class="btn-field">
                        <button type="submit" id="signupBtn" name="adduser">S'inscrire</button>
                    </div>
                </div>




            </form>
        </div>


    </div>




</body>

</html>