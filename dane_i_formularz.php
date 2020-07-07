<?php
session_start();

include 'db.php';
include 'funkcje.php';
typusera();





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





/*echo "<pre> ";
print_r($tab);
echo "</pre> ";*/
// var_dump($tab);
//exit();
//print_r($tab);
$dl = count($tab);
//include 'nawigacja.php';
//print_r($tab);


include 'nawigacja_p.php'?>



   <font color="white">
       <div style=" position: relative;
    padding: 0px;
    max-width: 700px ;
    float: none;
    margin: 50px auto;}">
       <?php if(isset($_SESSION['username']))
           echo "<h1 align=center>Witaj ".$_SESSION['username']."</h1>";

       ?></div>

       <div class="login-box" id="asd"> <div class=odl ></div>



    <?php

/*echo "<div><h3>Jeżeli chcesz odświerzyć strone kliknij  <a href='dane_i_formularz.php'>TUTAJ</a></h3></div>";*/
  /*  if($_SESSION['wybor']==1){
echo "<div class='float-right'><h1>Jeżeli chcesz się zalogować kliknij <a href=\"login.php\">TUTAJ</a></h1></div>";}*/
lista($tab);


    if($_SESSION['wybor']==1){
echo "<h4>Jeżeli chcesz dodać dane do bazy kliknij <a href='dane_i_formularz.php?add'>TUTAJ</a></h4>";}
if($_SESSION['wybor']==1) {
    dodaj();}
    if($_SESSION['wybor']==1) {
    delete();
    edit();
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