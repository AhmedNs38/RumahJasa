<?php 
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Jasa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
                    <a class="nav-link" style="color: #1363DF;" href="#">Jual Jasa Anda</a>
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
	<!-- content -->
	<div class="container">
		<h3 class="my-4">Upload Jasa</h3>
		<div class="card border-primary">
			<div class="card-body">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="nama" class="form-label">Judul</label>
						<input type="text" name="nama" class="form-control" placeholder="Judul" required>
					</div>
					<div class="mb-3">
						<label for="kategori" class="form-label">Kategori</label>
						<select class="form-select" name="kategori" required>
							<option value="">--Pilih--</option>
							<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							while($r = mysqli_fetch_array($kategori)){
								?>
								<option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="mb-3">
							<label for="harga" class="form-label">Harga</label>
							<input type="text" name="harga" class="form-control" placeholder="Harga" required>
						</div>
						<div class="mb-3">
							<div>
							<label for="gambar" class="form-label">Gambar</label>
							<label for="gambar" class="form-label" style="font-size: 12px; color: red;">*gunakan rasio 16:9</label>
							</div>
							<input type="file" name="gambar" class="form-control" required>
						</div>
						<div class="mb-3">
							<label for="deskripsi" class="form-label">Deskripsi</label>
							<textarea class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
						</div>
						<div class="mb-3">
							<label for="status" class="form-label">Status</label>
							<select class="form-select" name="status">
								<option value="">--Pilih--</option>
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
							</select>
						</div>
						<input type="submit" name="submit" value="Submit" class="btn btn-primary">
					</form>
				<?php 
					if(isset($_POST['submit'])){

						// print_r($_FILES['gambar']);
						// menampung inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga 		= $_POST['harga'];
						$deskripsi 	= $_POST['deskripsi'];
						$status 	= $_POST['status'];

						// menampung data file yang diupload
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'produk'.time().'.'.$type2;

						// menampung data format file yang diizinkan
						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						// validasi format file
						if(!in_array($type2, $tipe_diizinkan)){
							// jika format file tidak ada di dalam tipe diizinkan
							echo '<script>alert("Format file tidak diizinkan")</scrtip>';

						}else{
							// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
							// proses upload file sekaligus insert ke database
							move_uploaded_file($tmp_name, './produk/'.$newname);

							$insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
										null,
										'".$kategori."',
										'".$nama."',
										'".$harga."',
										'".$deskripsi."',
										'".$newname."',
										'".$status."',
										null
											) ");

							if($insert){
								echo '<script>alert("Tambah data berhasil")</script>';
								echo '<script>window.location="dashboardSeller.php"</script>';
							}else{
								echo 'gagal '.mysqli_error($conn);
							}

						}

						
						
					}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>