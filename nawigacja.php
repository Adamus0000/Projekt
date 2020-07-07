<?php
include 'db.php';
include 'funkcje.php';


?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<header>

    <nav class="navbar bg-secondary navbar-dark navbar-expand-md">
        <a class="navbar-brand" href="dane_i_formularz.php">Menu</a>
<button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#namemenu" aria-controls="namemenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
    <span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse" id="namemenu">
       <ul class="navbar-nav">
           <li class="nav-item">
               <a class="nav-link" href="#"> HELO </a>
           </li>


           <li class="nav-item-dropdown">
               <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" id="submenu" aria-haspopup="tree"> Lista </a>

               <div class="dropdown-menu bg-primary" aria-labelledby="submenu">
                   <a class="dropdown-item nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="#">hahaha</a>
                   <div class="dropdown-menu bg-primary" aria-labelledby="submenu">  <a class="dropdown-item nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="#">hahaha</a>

                       <div class="dropdown-menu bg-primary" aria-labelledby="submenu">
                           <a class="dropdown-item nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="#">haxdddddddd</a>
                       </div>


                   </div>
               </div>
           </li>



           <li class="nav-item">
               <a class="nav-link" href="opis.php"> xD </a>
           </li>
         </ul>
        <div class="navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
        <?php listabar($tab) ?>

        </ul>
                </div>
            </div>
        </div>
    </div>

    </nav>


</header>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
