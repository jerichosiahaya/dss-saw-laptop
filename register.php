<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Laptopp</title>
</head>

<body>
    <div class="container mt-5">
        <div class="">
            <div class="header-logo text-center">
                <img src="https://i.ibb.co/mRgTp8V/laptopp.png" class="img-fluid img-header-register" alt="">
                <p style="color: green;">Aplikasi perbandingan laptop</p>
            </div>
            <form action="register_process.php" id="register-form" name="register" class="form-register" method="post">
                <div class="text-center" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
                    <b>R E G I S T E R</b>
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="text-center mb-3">
                    <input type="submit" class="btn btn-success btn-sx btn-register" name="register" value="Register" id="register">
                </div>
                <div class="text-center">
                    <p class="caption-register">Already have an account? <a href="index.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>