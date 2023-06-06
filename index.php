<?php
require 'db_connect.php'


?>

<!DOCTYPE html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Lapak</title>
</head>
<body style="background-color: #F5F5F5;">
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand me-5" href="#">
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
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #062925;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item me-4">
                    
                <?php 
					$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
					<a href="produkJasa.php?kat=<?php echo $k['category_id'] ?>">
						<div style="float: left; " class="nav-link">
							<p><?php echo $k['category_name'] ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
                </li>
            </ul>   
        </div>
    </div>
</nav>
                </br>
<div class="container">
    <div class="row">
        <?php 
        $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC");
        if(mysqli_num_rows($produk) > 0){
            while($p = mysqli_fetch_array($produk)){
        ?>  
        <div class="col-md-3">
            <div class="card mb-4 box-shadow">
            <a href="lapak.php?id=<?php echo $p['product_id'] ?>" >
                <img class="card-img-top" src="produk/<?php echo $p['product_image'] ?>" alt="<?php echo $p['product_name'] ?>">
                <div class="card-body">
                <p class="card-text nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                <p class="card-text harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                </div>
            </a>
            </div>
        </div>
        <?php }}else{ ?>
        <p>Produk tidak ada</p>
        <?php } ?>
    </div>
</div>



<br>
</body>
<footer class="text-center text-white" style="background-color: #062925;">
    <div class="container p-4">
    <p>Ikuti Kami di:</p>
    <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-floating m-1" href="#!" role="button" style="background-color: #062925;">
            <i class="fab fa-facebook-f"></i>
            <img src="img/Facebook.png">
        </a>
        <!-- Twitter -->
        <a class="btn btn-floating m-1" href="#!" role="button" style="background-color: #062925;">
            <i class="fab fa-twitter"></i>
            <img src="img/Twitter.png">
        </a>
        <!-- Instagram -->
        <a class="btn btn-floating m-1" href="#!" role="button" style="background-color: #062925;">
            <i class="fab fa-instagram"></i>
            <img src="img/Instagram.png">
        </a>
        </section>
<hr>
    <section class="">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Kategori</h5>
            <ul class="list-unstyled mb-0">
                <li>
                <a href="#!" class="text-white">Desain Grafis</a>
                </li>
                <li>
                <a href="#!" class="text-white">Digital Marketing</a>
                </li>
                <li>
                <a href="#!" class="text-white">Programming</a>
                </li>
                <li>
                <a href="#!" class="text-white">Fotografi</a>
                </li>
            </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Tentang</h5>
            <ul class="list-unstyled mb-0">
                <li>
                <a href="#!" class="text-white">Kebijakan Pribadi</a>
                </li>
                <li>
                <a href="#!" class="text-white">Jangka Waktu & Layanan</a>
                </li>
                <li>
                <a href="#!" class="text-white">Kemitraan</a>
                </li>
                <li>
                <a href="#!" class="text-white">Karir</a>
                </li>
            </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Dukungan</h5>
            <ul class="list-unstyled mb-0">
                <li>
                <a href="#!" class="text-white">Bantuan & Dukungan</a>
                </li>
                <li>
                <a href="#!" class="text-white">Kepercayaan & Keamanan</a>
                </li>
            </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Komunitas</h5>
            <ul class="list-unstyled mb-0">
                <li>
                <a href="#!" class="text-white">Forum</a>
                </li>
                <li>
                <a href="#!" class="text-white">Pusat Komunitas</a>
                </li>
                <li>
                <a href="#!" class="text-white">Blog</a>
                </li>
                <li>
                <a href="#!" class="text-white">Event</a>
                </li>
            </ul>
            </div>
        </div>
        </section>
    </div>
    <div class="text-center p-3" style="background-color: #062925;">
        © 2023 Copyright:
        <a class="text-white" href="#">RumahJasa.id</a>
    </div>
    </footer>
</html>
