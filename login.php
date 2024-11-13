<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="css/loginForms.css">
    <script src="https://kit.fontawesome.com/b7ab2c703a.js" crossorigin="anonymous"></script>
</head>




<body>


    <div class="container">
        <div class="form-box">
            <h1 id="title">Se connecter</h1>


            <?php
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if (!empty($username) && !empty($password)) {
                    require_once './DataBase/database.php';
                    $sqlState = $pdo->prepare("SELECT * FROM users WHERE username = ?");
                    $sqlState->execute([$username]);
                    $user = $sqlState->fetch(PDO::FETCH_ASSOC);

                    if ($user && password_verify($password, $user['password'])) {
                        session_start();
                        $_SESSION['user'] = $user; // Store user information in the session
                        header("Location: profile.php");
                        exit();
                    } else {
                        echo "Invalid username or password!";
                    }
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
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" placeholder="password">
                    </div>
                    <p>tu n'as pas de compte <a href="registreUser.php"> Cliquez ici</a></p>
                    <div class="btn-field">
                        <button type="submit" id="signupBtn" name="login">Se connecter</button>
                    </div>
                </div>




            </form>
        </div>


    </div>






    <script src="js/main.js"></script>
</body>

</html>