<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>

    <section class="vh-100" style="background-color: #06283D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Masuk</h3>

                            <?php if( isset($error)) : ?>
                            <p style="color: red">username / password salah</p>
                            <?php endif; ?>

                            <form action="" method="POST">
                            <div class="form-outline mb-4">
                                <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="username"/>
                                <label class="form-label" for="typeEmailX-2">Username</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password"/>
                                <label class="form-label" for="typePasswordX-2">Password</label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block my-2" type="submit" name="submit">Masuk</button>
                            </form>
                            <button class="btn btn-lg btn-block my-2" style="background-color: grey; color: white;" type="submit">
                            <i class="fab fa-google me-2"></i>Masuk dengan google</button>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            if(isset($_POST['submit'])){
                require 'db_connect.php';
                $username = $_POST['username'];
                $password = $_POST['password'];

                $result = mysqli_query($conn, "SELECT * FROM tb_seller WHERE username = '$username'");
                if(mysqli_num_rows($result)===1) {
                    // cek password
                    $row = mysqli_fetch_assoc($result);
                    if ( password_verify($password, $row["password"])) {
                        header("Location: index.php");
                        exit;
                    }
                }

                $error = true;
            }
            ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>