<?php
require 'header.php';
require 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Laptopp</title>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://i.ibb.co/mRgTp8V/laptopp.png" alt="" width="100" height="29">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="index.php">Home</a>
                    <a class="nav-link active" aria-current="page" href="#">About</a>
                    <a class="nav-link" href="https://github.com/jerichosiahaya/dss-saw-laptop">Github</a>
                </div>
            </div>
            <span class="navbar-text">
                <a href="logout.php"><button type="button" class="btn btn-outline-danger btn-sm">LOGOUT </button></a>
            </span>
        </div>
    </nav>
    <!-- navbar -->

    <div class="container mt-4">
        <h3>About</h3>
        <hr>
        <p><b>Laptopp</b> is a decision support system website</p>
        <p>Developed by <a href="">Jericho Siahaya</a> & <a href="">Ricky Ng</a></p>
    </div>
</body>

</html>