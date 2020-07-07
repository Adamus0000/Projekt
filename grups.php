<?php
session_start();


if(!isset($_SESSION['wybor']))
{
    $_SESSION['wybor']=3;
}


include 'db.php';
include 'funkcje.php';


?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap-theme.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body text="color:red">



<?php

include 'nawigacja_p.php';

$art = $_SESSION['username'];



?>






    <div class="login-box" id="asd">

            <p align="center" style="color: #FFFFFF">Panel administratora!!!</p>

            <?php $query="select id,id_g,name,nazwisko,email from users";
            $ask=mysqli_query($connection,$query);
            $t=[];
            echo "<div id='formularz'> <table class='table table-bordered table-hover' style='color: white;' ><thead>";
            ?><tr>
            <td >Id</td>
            <td>Grupa</td>
            <td>Imie</td>
            <td>Nazwisko</td>
            <td>Email</td>


        </tr>


        <?php
            while ($row = mysqli_fetch_assoc($ask)) {
                echo "<tr >";
                foreach($row as $n => $w) {$t[$n]=$w;

               }

                echo "<td>". $t['id']."</td>";
                echo "<td><b>". $t['id_g']." </b><a href='grups.php?edit={$t['id']}'>Zmień grupę</a></td>";
                echo "<td>". $t['name']."</td>";
                echo "<td>". $t['nazwisko']."</td>";
                echo "<td>". $t['email']."</td>";


               echo "</tr>";
            }
        echo "</thead></table> </div>";?>
            <p align="center" style="color: #FFFFFF">Opis Grup</p>
        <p align="center" style="color: #FFFFFF">Grupa 1 : ADMINISTRATOR</p>
        <p align="center" style="color: #FFFFFF">Grupa 2 : współzałożyciel(nie może usuwać admina)</p>
        <p align="center" style="color: #FFFFFF">Grupa 3 : user specjalny (tylko dodawanie)</p>
        <p align="center" style="color: #FFFFFF">Grupa 4 : user (odczyt)</p>





        </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>




<!--<li class="list-group-item list-group-item-warning">
    <ul class=\"row\" >"-->