<?php
require 'db_connect.php';

// Mengambil data notifikasi dari database
$notifications = mysqli_query($conn, "SELECT * FROM tb_notification ORDER BY notification_id DESC");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lapak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: #F5F5F5;">
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand me-5" href="index.php">
            <img src="img/Logo_RJ2.png" alt="Logo" style="width: 150px; height:auto"> 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <form class="d-flex flex-grow-1" action="search.php" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn" type="submit" style="background-color: #044A42; color: white;">Search</button>
            </form>
            <ul class="navbar-nav d-flex justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="notification.php">
                        <img src="img/notification.png" alt="notif logo" style="width:24px;"> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="img/heart.png" alt="favorit logo" style="width:24px;"> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="img/Pesan.png" alt="messege logo" style="width:24px;"> 
                    </a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" style="color: #044A42;" href="dashboardSeller.php">Dashboard Penjual</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" style="color: #044A42;" href="#">Keluar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboardseller.php">
                        <img src="img/profil.jpeg" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Content of the notification page -->
<div class="container">
    <h1>Notification Page</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Notification ID</th>
                <th>Notification Content</th>
                <th>Notification Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($notifications) > 0) {
                while ($notification = mysqli_fetch_assoc($notifications)) {
            ?>
                    <tr>
                        <td><?php echo $notification['notification_id']; ?></td>
                        <td><?php echo $notification['notification_content']; ?></td>
                        <td><?php echo $notification['notification_date']; ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='3'>No notifications found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<footer class="text-center text-white" style="background-color: #06283D;">
    <!-- Footer content -->
</footer>
</html>
