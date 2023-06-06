<?php
require 'db_connect.php';


$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Lapak</title>
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
            <form class="d-flex flex-grow-1">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn" type="submit" style="background-color: #1363DF; color: white;">Search</button>
            </form>
            <ul class="navbar-nav d-flex justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="#">
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
                    <a class="nav-link" style="color: #1363DF;" href="jualjasa.php">Jual Jasa Anda</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" style="color: #1363DF;" href="#">Keluar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="img/profil.jpeg" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #06283D;">
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
					<a href="index.php?kat=<?php echo $k['category_id'] ?>">
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
<div class="container" style="padding-top: 20px;">
    <div class="card" style="width: 100%; max-width: 1780px; margin: top 10px;">
        <div class="row" style="display: flex; flex-direction: column; align-items: center;">
            <ul class="nav-item">
                <a class="navbar-brand" href="#">
                    <img src="img/profil.jpeg" alt="Avatar Logo" style="width:40px; margin: 10px;" class="rounded-pill">
                    <span style="margin-left: 3px;">Cak Jo</span>
                </a>
            </ul>
            <div class="row shadow-5" style="display: flex;">
                <div class="col-md-6" style="margin: 5px; padding: 1em 1em 1em 1em;">
                    <div class="lightbox">
                        <img src="produk/<?php echo $p->product_image ?>" alt="Gallery image 1" class="pilm w-100"/>
                    </div>
                    <div class="row" style="display: flex; justify-content: center;">
                        <div class="col-3 mt-1">
                            <img src="img/pilm1.png" alt="Gallery image 1" class="active w-100"/>
                        </div>
                        <div class="col-3 mt-1">
                            <img src="img/pilm2.png" alt="Gallery image 2" class="w-100"/>
                        </div>
                        <div class="col-3 mt-1">
                            <img src="img/pilm3.png" alt="Gallery image 3" class="w-100"/>
                        </div>
                        <div class="col-3 mt-1">
                            <img src="img/pilm4.png" alt="Gallery image 4" class="w-100"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-5" style="margin-top: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 38px;"><?php echo $p->product_name ?></h5>
                        <p class="card-text" style="font-size: 32px;">Rp. <?php echo number_format($p->product_price)  ?></p><br>
                        <p class="card-text" style="font-size: 18px;">kosong sek</p><br>
                        <a href="#" class="btn btn-primary" style="font-size: 24px;">Beli Jasa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card" style="width: 100%; max-width: 1780px;">
        <div class="card-body">
            <h5 class="card-title">Tentang Lapak</h5>
            <p class="card-text"><?php echo $p->product_description ?></p>
        </div>
    </div>
</div>
</div>
<br>
</body>
<footer class="text-center text-white" style="background-color: #06283D;">
    <div class="container p-4">
    <p>Ikuti Kami di:</p>
    <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-floating m-1" href="#!" role="button">
            <i class="fab fa-facebook-f"></i>
            <img src="img/Facebook.png">
        </a>
        <!-- Twitter -->
        <a class="btn btn-floating m-1" href="#!" role="button">
            <i class="fab fa-twitter"></i>
            <img src="img/Twitter.png">
        </a>
        <!-- Instagram -->
        <a class="btn btn-floating m-1" href="#!" role="button">
            <i class="fab fa-instagram"></i>
            <img src="img/Instagram.png">
        </a>
        </section>
<hr>
    <section class="">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>
            <ul class="list-unstyled mb-0">
                <li>
                <a href="#!" class="text-white">Link 1</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 2</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 3</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 4</a>
                </li>
            </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>
            <ul class="list-unstyled mb-0">
                <li>
                <a href="#!" class="text-white">Link 1</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 2</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 3</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 4</a>
                </li>
            </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>
            <ul class="list-unstyled mb-0">
                <li>
                <a href="#!" class="text-white">Link 1</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 2</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 3</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 4</a>
                </li>
            </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>
            <ul class="list-unstyled mb-0">
                <li>
                <a href="#!" class="text-white">Link 1</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 2</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 3</a>
                </li>
                <li>
                <a href="#!" class="text-white">Link 4</a>
                </li>
            </ul>
            </div>
        </div>
        </section>
    </div>
    <div class="text-center p-3" style="background-color: #06283D;">
        © 2023 Copyright:
        <a class="text-white" href="#">Squadhelper.id</a>
    </div>
    </footer>
</html>
