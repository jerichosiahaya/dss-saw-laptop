<?php
include_once("config.php");
$username = $_POST['username'];
$password = $_POST['password'];
if (empty($username) || empty($password)) {
    header('Location: register.php');
} else {

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "insert into pengguna (username, password) values ('$username', '$password_hash')";
    //$id_pengguna = mysqli_insert_id();

    if (mysqli_query($conn, $query)) {
        $id_pengguna = $conn->insert_id;
        if (!empty($id_pengguna)) {
            //echo $id_pengguna;
            $query3 = "insert into kriteria(id_kriteria, nama, sifat, weight, id_pengguna) VALUES (1, 'Harga', 'cost', 0.2, $id_pengguna), (2, 'Processor', 'benefit', 0.15, $id_pengguna), (3, 'RAM', 'benefit', 0.15, $id_pengguna), (4, 'Storage', 'benefit', 0.15, $id_pengguna), (5, 'Battery Life', 'benefit', 0.1, $id_pengguna),
            (6, 'VGA Card', 'benefit', 0.15, $id_pengguna), (7, 'Layar', 'benefit', 0.1, $id_pengguna);";
            if (mysqli_query($conn, $query3)) {
                header('Location: login.php');
            }
        }
    } else {
        header('Location: register.php');
    }
}
