<?php
require_once '../DataBase/database.php';

try {
    $sql = "SELECT * FROM contacts ORDER BY created_at DESC";
    $stmt = $pdo->query($sql);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Reservation</title>
    <link rel="stylesheet" href="../css/dahsbord.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Contact Messages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    </nav>
    <div class="container mt-5">
        <h1 class="text-center">Messages</h1>
        <?php if (!empty($contacts)) : ?>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>E-mail</th>
                        <th>Numéro de téléphone</th>
                        <th>Message</th>
                        <th>Date de création</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($contact['id']); ?></td>
                            <td><?php echo htmlspecialchars($contact['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($contact['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($contact['email']); ?></td>
                            <td><?php echo htmlspecialchars($contact['phone']); ?></td>
                            <td><?php echo nl2br(htmlspecialchars($contact['message'])); ?></td>
                            <td><?php echo htmlspecialchars($contact['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="text-center">No messages found.</p>
        <?php endif; ?>
    </div>
</body>

</html>