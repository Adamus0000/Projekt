<?php
session_start();
include 'db.php';
include 'funkcje.php';
typusera();




//print_r($_SESSION);




//print_r($zw);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap-theme.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap-theme.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



<style>
    a:link {
        COLOR: #222222;
        TEXT-DECORATION: none;
    }
    a:visited {
        COLOR: #222222;
        TEXT-DECORATION: none;
    }
    a:hover {
        COLOR: #222222;
        TEXT-DECORATION: none;
    }


    #tlo  {
        text-align: justify;

        border: 25px solid #333333;
        padding: 20px;
        margin: 70px;
        background: rgba(180, 180, 180, 0.7);
    }
    #nw {text-align: center;}
</style>


    <title>Document</title>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body><?php
include 'nawigacja_p.php';

if (isset($_GET['art'])){
$art = $_GET['art'];
$query = "SELECT * FROM posty where id = '$art'";
$posts_query = mysqli_query($connection,$query);
$zw = [];
if (!$posts_query)
{
    die('Query fail' . mysqli_error());
}
else {
    while ($row = mysqli_fetch_assoc($posts_query)) {
        foreach($row as $n => $w) $zw[$n]=$w;
    }
}}
else
   die( "<div id=\"tlo\"> <span style='color: black'> Strona nie istnieje </span></div>");



?>





            <div id="tlo" class=" center-block" > <span style='color: black'>
            <?php if(empty($zw)){
                if($_SESSION['wybor']==1)
                {

                    if(isset($_GET['add'])){
                        dodajnote();
                        die;
                    }
                    else {
                    die("<b>Post nie posiada opisu. Jeżeli chcesz możesz go dodać <a href='opis.php?art=$art&add=$art'>TUTAJ</a></b>");}
                }
                else{


                die("<b>Post nie posiada opisu.</b>");}}
            if(isset($_GET['edit'])){

                editnote();

                die;
            }
            if(isset($_GET['delete'])){

                deletepost();

                die;
            }
            ?>
                <h1  id="nw"  "><?php echo $zw['nazwa'] ?></h1>
                    <!--<img style="padding: 10px" class="float-left" src="img/<?php /*echo $zw['img'] */?>" alt="" width="400">-->
                <br/>
               <?php
              //$zw['tresc']= htmlspecialchars_decode($zw['tresc']);
               //$zw['tresc'] = get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES, 'UTF-8');
              // $zw['tersc']= html_entity_decode($zw['tersc']);
               echo $zw['tresc'];


                    ?><br /><br /><br />
                    <div class="float-right">Data ostatniej modyfikacji: <?php echo $zw['date'] ?></div><br>

                    <?php if ($_SESSION['wybor']==1){ ?>
                    <h4><a class="page-item" href="opis.php?art=<?php echo $art ?>&edit=<?php echo $art ?>">Edytuj</a></h4>
                    <?php  }

                    if ($_SESSION['wybor']==1){ ?>
                    <h4><a class="page-item" href="opis.php?art=<?php echo $art ?>&delete=<?php echo $art ?>">Usuń</a></h4>
                    <?php  }

                    ?>
            </span>
            </div>

<?php

//if(isset($_GET['add']))




?>
<!--<form method="post">
    <p>
        Mój Edytor<br />
        <textarea name="editor" class="ckeditor"></textarea>

        <?php /*/*echo "Witam!!!"; */?>

    </p>
    <p>
        <input type="submit" />
    </p>
</form>-->


</body>
</html>


