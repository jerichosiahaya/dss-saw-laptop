<?php
require_once 'session.php';
include_once 'header.php';
$result = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_pengguna = $id");
if (isset($_SESSION['welcome'])) {
    $welcomeText = $_SESSION['welcome'];
}
// if ($_SESSION['welcome']) {
//     echo $_SESSION['welcome'];
//     unset($_SESSION['welcome']);
// }
// $queryCheckSUM = "select sum(weight) as total from kriteria where id_pengguna = $id";
// $result1 = mysqli_query($conn, $queryCheckSUM);
// $tes = mysqli_fetch_assoc($result1);
?>

<!DOCTYPE html>
<html>
<!-- 
    Jericho C Siahaya
    Saturday, 10 April 2021
 -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Laptopp</title>
</head>

<body>

    <!-- navbar -->
    <?php require 'navbar.php'; ?>
    <!-- navbar -->

    <div class="container mt-4">

        <!-- welcome message -->
        <h5 class="mb-3"><em style="color: grey; font-style:normal"> <?php
                                                                        if (!empty($welcomeText)) {
                                                                            echo $welcomeText;
                                                                            echo ",";
                                                                            echo " ";
                                                                            echo "</em>";
                                                                            echo $username;
                                                                            unset($_SESSION['welcome']);
                                                                        }
                                                                        ?>
        </h5>
        <!-- welcome message -->

        <!-- tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Alternatif</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kriteria.php">Kriteria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="insert_nilai_alternatif.php">Nilai Alternatif</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="hasil.php">Hasil</a>
            </li>
        </ul>
        <!-- tabs -->


        <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
            Masukkan merk laptop yang diinginkan<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Merk Laptop</th>
                    <th scope="col"></th>
                </tr>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $data['nama'] ?></td>
                        <td><button class="btn btn-secondary" data-bs-toggle="modal" type="button" data-bs-target="#update_modal<?php echo $data['id_alternatif'] ?>"><span class="glyphicon glyphicon-edit"></span> <i class="fas fa-edit"></i> Edit</button> | <a href='delete_alternatif.php?id_alternatif=<?php echo $data['id_alternatif']; ?>'><button type='button' class='btn btn-danger' name='delete'><span class="glyphicon glyphicon-edit"></span> <i class="fas fa-trash"></i> Hapus</button></a></td>
                    </tr>
                <?php
                    include 'update_nama_alternatif_modal.php';
                }
                ?>
        </table>
        <button class='btn btn-secondary' id="tambah">Add</button>
        <div class="toggle-forms">
            <form action="" id="save" method="post">
                <label>Masukkan nama laptop:</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Laptop" required>
                <button type="submit" class='btn btn-success' id="simpan" name="submit">Submit</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#tambah').on('click', function() {
                $('.toggle-forms').toggle('fast');
                // $(this).toggleClass('button-warning'); // to change button color, just in case
                $(this).text(function(i, v) {
                    return v === 'Add' ? 'Cancel' : 'Add'
                })
            });

            $('#simpan').on('click', function() {
                laptop = $('#nama').val();
                // alert(laptop);
                if (laptop != "") {
                    $.ajax({
                        type: "POST",
                        url: "insert_alternatif_process.php",
                        data: {
                            'nama': laptop,
                        },
                        cache: false,
                        success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                // alert("Success!");
                                location.reload();
                            } else {
                                alert("Error occured !");
                            }
                        }
                    });
                } else {
                    alert('Harap isi semua data!');
                }
            });
        });
    </script>
</body>

</html>