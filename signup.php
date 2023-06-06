<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Daftar</title>
</head>

<body>
    <section class="bg-image" style="background-color:#06283D;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Buat Akun</h2>

                                <form action="" method="POST">

                                    <div class="form-floating mb-4">
                                        <input type="text" id="nama" class="form-control" name="nama" required>
                                        <label for="nama">Nama</label>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="text" id="username" class="form-control" name="username" required>
                                        <label for="username">Username</label>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="email" id="email" class="form-control" name="email" required>
                                        <label for="email">Email</label>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                        <label for="password">Sandi</label>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="password" id="confirm-password" class="form-control" name="password2" required>
                                        <label for="confirm-password">Ulangi Sandi</label>
                                    </div>

                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="agree-terms" required>
                                        <label class="form-check-label" for="agree-terms">
                                            Saya setuju dengan semua pernyataan pada <a href="#!" class="text-body"><u>Syarat dan Ketentuan</u></a>
                                        </label>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Daftar</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Sudah punya akun? <a href="login.php" class="fw-bold text-body"><u>Masuk</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
require 'db_connect.php';
if(isset($_POST['submit'])){

    if( regristasi($_POST) > 0) {
        echo "<script>
        alert('resgristasi berhasil');
        </script>";

    }else{
        echo mysqli_error($conn);
    }
}
?>
        </div>
    </section>
</body>
</html>