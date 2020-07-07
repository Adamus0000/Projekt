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
            $query = "SELECT opis,name,nazwisko FROM users where name = '$art'";
            $opis_query = mysqli_query($connection,$query);
            $zw = [];
            if (!$opis_query)
            {
                die('Query fail' . mysqli_error());
            }
            else {
                while ($row = mysqli_fetch_assoc($opis_query)) {
                    foreach($row as $n => $w) $zw[$n]=$w;
                }
            }

           // print_r($zw);

?>



<font color="white">


    <div class="login-box" id="asd"> <div class=odl >

       <p align="center">Oto twój profil !!!</p>
            <p align="center">Twoje imie: <?php echo $zw['name'] ?></p>
            <p align="center">Twoje nazwisko: <?php echo $zw['nazwisko'] ?></p>
            <?php if(empty($zw['opis']))  { ?><p align="center">Napisz coś o sobie xD !!!</p>
            <p align="center"> Jeżeli chcesz siebie opisać kliknij <a href="profil.php?edit=<?php echo $zw['name'] ?>">TUTAJ</a></p><?php

                if (isset($_GET['edit'])) {
                    profiledit($zw['opis']);

                }
            }


            else {

                if (isset($_GET['edit'])) {
                    profiledit($zw['opis']);

                }
                else {
                print_r($zw['opis']);?><br/><br/><br/><br/><br/><br/>
                <p align="right"><a href="profil.php?edit=<?php echo $_SESSION['username'] ?>">Edytuj opis</a></p>




<?php }


            }



            ?>






        </div></font>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>




<!--<li class="list-group-item list-group-item-warning">
    <ul class=\"row\" >"-->