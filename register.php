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
                <p style="color: green;">Register now</p>
            </div>
            <form action="register_process.php" id="register-form" name="register" class="form-register" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary btn-sx btn-register" name="register" value="Register" id="register">
                </div>
            </form>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
    <script>
        $(document).ready(function() {
            $('#register').on('click', function() {
                $('#loader').fadeIn(300).show().delay(300).fadeOut();
            });
        });
    </script>
</body>

</html>