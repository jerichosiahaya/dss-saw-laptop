<?php
include_once("config.php");
$username = $_POST['username'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$query = "insert into pengguna (username, password) values ('$username', '$password_hash')";
if (mysqli_query($conn, $query)) {
    header('Location: login.php');
} else {
    header('Location: register.php');
}
