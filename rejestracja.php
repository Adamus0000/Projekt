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

            <div class="col-md-12 login-left">
            <span style='color: white'>
            <h2>Rejestracja</h2>
            <form action="registration.php" method="post">
                <div class="form-group ">
                    <label>Podaj Login</label>
                    <p class="text-primary"><input id="formularz" type="email" name="email" class="form-control" required></p>
                </div>
                <div class="form-group">
                    <label>Podaj Hasło</label>
                    <p class="text-primary"> <input id="formularz" type="password" name="password" class="form-control" required></p>
                </div>
                <div class="form-group">
                    <label>Powtórz Hasło</label>
                    <p class="text-primary"> <input id="formularz" type="password" name="password2" class="form-control" required></p>
                </div>
                <div class="form-group ">
                    <label>Podaj Imie</label>
                    <p class="text-primary"><input id="formularz" type="text" name="user" class="form-control" required></p>
                </div>
                <div class="form-group">
                    <label>Podaj Nazwisko</label>
                    <p class="text-primary"> <input id="formularz" type="text" name="nazwisko" class="form-control" required></p>
                </div>
                <button type="submit" class="btn btn-primary">Zarejestruj się</button>


            </form>
</span>
            </div>



        </div>
    </div>

</div>



</body>
</html>