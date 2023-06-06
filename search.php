<?php
require 'db_connect.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Query pencarian produk berdasarkan nama
    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_name LIKE '%$query%' AND product_status = 1 ORDER BY product_id DESC");

    // Tampilkan hasil pencarian
    if (mysqli_num_rows($produk) > 0) {
        ?>
        <!DOCTYPE html> 
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="style2.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <title>Hasil Pencarian</title>
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
                                    <img src="img/profil.jpeg" alt="Avatar" class="rounded-circle" style="width:24px; height:auto;"> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-4">
                <div class="row">
                    <?php
                    while ($p = mysqli_fetch_array($produk)) {
                        ?>
                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow">
                                <a href="lapak.php?id=<?php echo $p['product_id'] ?>" >
                                    <img class="card-img-top img-fluid" src="produk/<?php echo $p['product_image'] ?>" alt="<?php echo $p['product_name'] ?>">
                                    <div class="card-body">
                                        <p class="card-text nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                                        <p class="card-text harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "<p>Produk tidak ditemukan</p>";
    }
}
?>
