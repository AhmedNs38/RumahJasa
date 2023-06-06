<?php 
	error_reporting(0);
	include 'db_connect.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
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
        <a class="navbar-brand me-5" href="index.php">
            <img src="img/logo.png" alt="Logo" style="width: 150px; height:auto"> 
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
                    <a class="nav-link" style="color: #1363DF;" href="dashboardSeller.php">Dashboard Penjual</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" style="color: #1363DF;" href="#">Keluar</a>
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

	<!-- new product -->
        <!-- <div class="section">
            <div class="container">
                <h3>Produk</h3>
                <div class="box">
                    <?php 
                        if($_GET['search'] != '' || $_GET['kat'] != ''){
                            $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                        }

                        $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
                        if(mysqli_num_rows($produk) > 0){
                            while($p = mysqli_fetch_array($produk)){
                    ?>	
                        <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                            <div class="col-4">
                                <img src="produk/<?php echo $p['product_image'] ?>">
                                <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                                <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                            </div>
                        </a>
                    <?php }}else{ ?>
                        <p>Produk tidak ada</p>
                    <?php } ?>
                </div>
            </div>
        </div> -->

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p><?php echo $a->admin_address ?></p>

			<h4>Email</h4>
			<p><?php echo $a->admin_email ?></p>

			<h4>No. Hp</h4>
			<p><?php echo $a->admin_telp ?></p>
			<small>Copyright &copy; 2020 - Bukawarung.</small>
		</div>
	</div>
</body>
</html>