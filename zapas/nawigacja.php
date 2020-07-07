<?php
include 'db.php';
include 'funkcje.php';

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"  href="style.css">



    <title>Document</title>
</head>
<body>
<header>
    <!--  Remove dark nav  -->
    <nav class="nav dark-nav">
        <div class="container-fluid">
            <div class="nav-heading" id="open-navbar1">
                <ul class="list">
                    <li><a href="#">Home</a></li>

                    <li><a href="http://dev.gilan-co.com/">About us</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">other</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">other<span class="caret"></span></a>

                    <?php lista($tab);
                    ?>

                    </li>
                </ul>
            </div>
            <div class="menu" >
                <ul class="list">
                <li> <a href="#">mirazimi</a></li>
                </ul>
            </div>

        </div>
    </nav>
</header>
</body>
</html>


