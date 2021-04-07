<?php
include_once("config.php");
$username = $_POST['username'];
$password = $_POST['password'];
$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'");
while ($user_data = mysqli_fetch_array($query)) {
    $username_db = $user_data['username'];
    $password_db = $user_data['password'];
    $id = $user_data['id_pengguna'];
}
if ($username_db == $username && password_verify($password, $password_db)) {
    $_SESSION['username'] = $username_db;
    $_SESSION['id'] = $id;
    header('Location: index.php');
} else {
    header('Location: login.php');
}
