<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "db_squadhelper";

$conn = mysqli_connect($hostname, $username, $password, $db_name);


function regristasi($data) {
    global $conn;

    $seller_name = ($data["nama"]);
    $username = strtolower(stripslashes($data["username"]));
    // $seller_email = ($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    $result = mysqli_query($conn, "SELECT username FROM tb_seller WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "
        <script>
        alert('username sudah terdaftar!!!')
        </script>";
        return false;
    }


    if( $password !== $password2 ){
        echo "<script>
        alert('konfirmasi password tidak sesuai');
        </script>";

        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO tb_seller(`seller_id`, `seller_name`, `username`, `password`) VALUES ('', '$seller_name', '$username', '$password')");

    return mysqli_affected_rows($conn);
}