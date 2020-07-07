<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet"
          type="text/css"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"  href="css/style2.css">

</head>
<body>
<?php
include "db.php";
include "funkcje.php";

include "nawigacja_p.php";
?>

<div class="container">
    <div class="login-box">

        <div class="row">

        <div class="col-md-12 login-right">

            <h2>Logowanie</h2>
            <form action="validation.php" method="post">
                <div class="form-group ">
                    <label>Login</label>
                    <p class="text-primary"><input  type="email" name="email" class="form-control" required></p>
                </div>
                <div class="form-group">
                    <label>Hasło</label>
                    <p class="text-primary"> <input  type="password" name="password" class="form-control" required></p>
                </div>
                <button type="submit" class="btn btn-primary">Zaloguj się</button>
<br /><br />
                Jeżeli nie masz konta <a href="rejestracja.php">Zarejestruj sie</a>


            </form>

        </div>

    </div>
    </div>

</div>



</body>
</html>