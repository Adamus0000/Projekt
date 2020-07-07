<?php

function listabar($plik , $nad = 0)
{

    echo "<ul class=\"nav navbar-item\">";



    foreach ($plik as $plikk) {
        if (isset($plikk)){

            $q = $plikk['Nr_id'];
            $w = $plikk['Nad_id'];
            $e = $plikk['Treść'];


            if ($w == $nad){


                ?><li class="dropdown-submenu ">
                <?php ?>
                <a  class="nav-link <?php   if(pod($q)==true)echo "dropdown-toggle ";
                else echo "item ";if ($w==0) echo "disabled " ;
?>
" <?php if ($w==0) echo "style=\"color:white; \"" ; ?> href="opis.php?art=<?php echo $q ?>" role="button" id="submenu" ><?php echo $e."    "?>  </a>

                <?php

                // data-toggle="dropdown"
                /*pod($w);*/
                if(pod($q)==true) { echo "<div id =\"divek\" style=\"position: absolute; width: 20% \" class=\"dropdown-menu bg-secondary\" aria-labelledby=\"submenu\" >";
                }
                ?>

                <?php
                listabar($plik, $q);
                if(pod($q)==true){
                echo "</div>";}
                 }echo "</li>";
        }
    }
    echo "</ul>";
}

function lista($plik , $nad = 0)
{
    echo "<ul>";
    $i = 1;
    global $dl;

    foreach ($plik as $plikk) {
        if (isset($plikk)){
            $q = $plikk['Nr_id'];
            $w = $plikk['Nad_id'];
            $e = $plikk['Treść'];


            if ($w == $nad){

                ?><hn title="
                <?php
                $y=0;
                foreach ($plikk as $it)
                {
                    $y++;
                    if($y>3)
                    {
                        if(!empty($it)|| ($it==="0"))
                            echo $it . "\r\n";
                    }
                    //var_dump($item[$x]);
                }
                ?>
            "<li ><?php echo $e."</hn>"." ";
                    if(  $_SESSION['wybor']==1) {
                        echo " \n\r <a href='dane_i_formularz.php?delete={$q}'>Usuń</a> ";
                        echo "lub <a href='dane_i_formularz.php?edit={$q}'>Edytuj</a>";
                    }



                    ?></li>
                <?php
                lista($plik, $q);
            }
        }
    }  echo "</ul>";}

function delete()
{
    global $q;
    echo $q;
    global $connection;
    if(isset($_GET['delete']))
    {
        $the_id = $_GET['delete'];
        $the_id= htmlentities( $the_id, ENT_QUOTES, "UTF-8");
        $the_id=mysqli_real_escape_string($connection, $the_id);

        $query = "select Nad_id from baza ";
        $result = mysqli_query($connection, $query);
        $table = [];
        while ($row = mysqli_fetch_assoc($result)) {

            $uppid = $row['Nad_id'];
            $table [] = $uppid;


        }
        foreach ($table as $r => $w)
        {
            $uiop[$r] = $w;
            if ($w == $the_id)
            {
                die ("NIE MOŻESZ USUWAĆ OPCJI NADRZĘDNYCH !!  WYBIERZ COŚ INNEGO!");
            }


        }

        //$mial = mysqli_query();

        $query = "DELETE FROM baza WHERE Nr_id = {$the_id}";
        $delete_query = mysqli_query($connection, $query);

        $query = "DELETE FROM posty WHERE id = {$the_id}";
        $delete_query = mysqli_query($connection, $query);
        ?>
        <META HTTP-EQUIV="Refresh" Content="0; URL='dane_i_formularz.php'">

        <?php
    }



}

function edit()
{
    global $connection;

    if(isset($_GET['edit']))
    {

        $the_id= $_GET['edit'];
        $the_id= htmlentities( $the_id, ENT_QUOTES, "UTF-8");
        $the_id=mysqli_real_escape_string($connection, $the_id);


        $query = "SELECT * FROM baza WHERE Nr_id = $the_id"; // LIMIT 4 ogranicza nam ilość wierszy wziętych z bazy danych todo
        $edit_categories_id = mysqli_query($connection,$query);
        $yt=0;
        $poi=0;

        if(isset($_POST['Treść']) && (empty($_POST['Treść']))) {
            ?><META HTTP-EQUIV="Refresh" Content="3; URL='dane_i_formularz.php'"><?php
            die ("Treść nie może być pusta");
        }

        while($row = mysqli_fetch_assoc($edit_categories_id))
        {
            foreach($row as $v => $c ) {



                if($poi>=3) {

                    $table[$v] = $c;
                    echo "<h4>" . $v . "</h4>";
                    ?>
                    <form action="dane_i_formularz.php?edit=<?php echo $the_id ?>" method="post">
                    <div width="100" class="form-group"><input id="formularz" value="<?php if (isset($c)) {
                            echo $c;
                        } ?>" class="form-control" type="text" name="<?php echo $v ?>"></div>


                    <?php


                    if (isset($_POST['aktualizuj'])) {
                        $_POST['aktualizuj']= htmlentities( $_POST['aktualizuj'], ENT_QUOTES, "UTF-8");
                        $_POST['aktualizuj']=mysqli_real_escape_string($connection, $_POST['aktualizuj']);

                        //$ty = [];
                        //foreach($row as $f)


                        $p = $_POST[$v];
                        $_POST[$v]= htmlentities( $_POST[$v], ENT_QUOTES, "UTF-8");
                        $_POST[$v]=mysqli_real_escape_string($connection, $_POST[$v]);


                        $query = "UPDATE baza SET $v='$_POST[$v]' WHERE `Nr_id`= '$the_id;'  ";
                        if($v=='Treść'){
                        $update_query = mysqli_query($connection, $query);
                        $query = "UPDATE posty SET nazwa='$_POST[$v]' WHERE `id`= '$the_id;'  ";}

                        $update_query = mysqli_query($connection, $query);

                        if (!$update_query) {
                            die("Update failed " . mysqli_error($connection));
                        }
                        ?>
                        <META HTTP-EQUIV="Refresh" Content="0; URL='dane_i_formularz.php'">

                        <?php
                    }
                $poi+=1;}else $poi+=2;
            }

            ?>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="aktualizuj" value="Aktualizuj">

            </form>


            </div>
        <?php }}
//$qqq = $_GET['edit'];
}

function dodaj()
{
    global $pparent;

    if(isset($_GET['add']))
    {


        ?>
        <!--<form action="dane_i_formularz$add.php" metchod="post">
        <div class="form-group">

            <select id="parent_id" name="parent_id" >

                <?php
        /*
                        global $connection;
                        $query = "SELECT * FROM baza";

                        $result = mysqli_query($connection, $query);

                        $parent_id = 0;

                        echo "<option value='$parent_id'>NEW $parent_id</option>";

                        if (!$result) {
                            die('Query FAILED' . mysqli_error());
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                            $animal_name = $row['Treść'];
                            $parent_id = $row['Nad_id'];

                            echo "<option value='$parent_id'>$animal_name
                            $parent_id</option>";

                        }


                        */?>
            </select>

        </div>
        </form>
-->
        <?php

        if (isset($_POST))

            global $connection;
        $query = "SELECT * FROM baza "; // LIMIT 4 ogranicza nam ilość wierszy wziętych z bazy danych todo
        $add_categories_id = mysqli_query($connection,$query);
        $yt=0;
        $pip=0;

        /*$query = "INSERT INTO 'baza'";*/
        $add_firstid=mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($add_firstid);
        $ttable = [];

        foreach ($row as $j => $k)
        {
            $tabble[$j] = $k;

            $ttable[]=$j;
        }



        if (isset($_POST['dodaj']))
        {
           // print_r($_POST);
            $pparent = $_POST['parent_id'];

            if(empty($_POST['Treść'])) {
                ?><META HTTP-EQUIV="Refresh" Content="3; URL='dane_i_formularz.php'"><?php
                die ("Treść nie może być pusta");
            }
            $pparent= htmlentities( $pparent, ENT_QUOTES, "UTF-8");
            $pparent=mysqli_real_escape_string($connection, $pparent);

            $query = "INSERT INTO `baza` (Nr_id) VALUES (NULL); ";

            $add_query = mysqli_query($connection, $query);




            $naj = mysqli_query($connection, 'select Nr_id from baza');
            $max = mysqli_fetch_assoc($naj);



        }

        while($row)
        {
            /*$query = "UPDATE baza SET Nad_id='$parent_id' WHERE Nr_id= '$value' ";

            $update_query = mysqli_query($connection, $query);*/


            foreach($row as $v => $c ) {
                if($pip>=3){
                    $table[$v] = $c;
                    echo "<h4>" . $v . "</h4>";
                    ?>
                    <form action="dane_i_formularz.php?add" method="post">
                    <div width="100" class="form-group"><input id="formularz" value="" class="form-control" type="text" name="<?php echo $v ?>"></div>


                    <?php

                    if (isset($_POST['dodaj'])) {

                        while($max = mysqli_fetch_assoc($naj)){
                            $value = max($max);}

                        $pparent= htmlentities( $pparent, ENT_QUOTES, "UTF-8");
                        $pparent=mysqli_real_escape_string($connection, $pparent);

                        $p = $_POST[$v];
                        $_POST[$v]= htmlentities( $_POST[$v], ENT_QUOTES, "UTF-8");
                        $_POST[$v]=mysqli_real_escape_string($connection, $_POST[$v]);


                        //echo $p." ".$ipe;
                        $query = "update baza set Nad_id='$pparent' WHERE Nr_id= '$value' ";
                        $idupp = mysqli_query($connection, $query);

                        $query = "UPDATE baza SET $v='$_POST[$v]' WHERE Nr_id= '$value' ";

                        $update_query = mysqli_query($connection, $query);

                        /*if (!$update_query) {
                            die("Update failed " . mysqli_error($connection));
                        }*/
                        ?>
                        <META HTTP-EQUIV="Refresh" Content="0; URL='dane_i_formularz.php'">

                        <?php
                    }}else $pip+=2;
            }
            ?>

            <div class="form-group">

                <select id="parent_id" name="parent_id" >

                    <?php

                    global $connection;
                    $query = "SELECT * FROM baza";

                    $result = mysqli_query($connection, $query);

                    $parent_id = 0;

                    echo "<option value='$parent_id'>NEW </option>";

                    if (!$result) {
                        die('Query FAILED' . mysqli_error());
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        $animal_name = $row['Treść'];
                        $parent_id = $row['Nr_id'];

                        echo "<option value='$parent_id'>$animal_name
                    </option>";

                    }


                    ?>
                </select>

            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="dodaj" value="Dodaj">

            </form>




            </div>
            <?php break;}

    }

}

function pod($numer)
{
    //$the_id = $_GET['delete'];
    global $connection;
    $query = "select Nad_id from baza ";
    $result = mysqli_query($connection, $query);
    $table = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $uppid = $row['Nad_id'];
        $table [] = $uppid;


    }/*print_r($table);*/
    $t = false;
    foreach ($table as $r => $war)
    {
        $uiop[$r] = $war;
        if ($war == $numer)
        {
            $t = true;
        }


    }
    return $t;

}

function podo($numer)
{
    //$the_id = $_GET['delete'];
    global $connection;
    $query = "select Nad_id from baza ";
    $result = mysqli_query($connection, $query);
    $table = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $uppid = $row['Nad_id'];
        $table [] = $uppid;


    }/*print_r($table);*/
    $t = false;
    foreach ($table as $r => $war)
    {
        $uiop[$r] = $war;
        if ($war == $numer)
        {
            $t = true;
        }


    }
    return $t;

}

function deletepost()
{
    global $q;
    echo $q;
    global $connection;
    if(isset($_GET['delete']))
    {
        $the_id = $_GET['delete'];
        $the_id= htmlentities( $the_id, ENT_QUOTES, "UTF-8");
        $the_id=mysqli_real_escape_string($connection, $the_id);

        //$mial = mysqli_query();

        $query = "DELETE FROM posty WHERE id = {$the_id}";
        $delete_query = mysqli_query($connection, $query);

        ?>
        <META HTTP-EQUIV="Refresh" Content="0; URL='opis.php?art=<?php echo $the_id ?>'">

        <?php
    }



}


function editpost()
{
    global $connection;

    if(isset($_GET['edit']))
    {//$a=1;

        $the_id=$_GET['edit'];

        $the_id= htmlentities( $the_id, ENT_QUOTES, "UTF-8");
        $the_id=mysqli_real_escape_string($connection, $the_id);


        $query = "SELECT * FROM posty WHERE id = $the_id"; // LIMIT 4 ogranicza nam ilość wierszy wziętych z bazy danych todo
        $edit_categories_id = mysqli_query($connection,$query);
        $yt=0;
        $poi=0;
/*------

        $query = "SELECT Treść FROM baza where Nr_id=$asd";
        $ide = mysqli_query($connection, $query);
        $roww = mysqli_fetch_assoc($ide);
        $tat=[];
        foreach ($roww as $a)
        {
            $tat=$a;
        }
        //print_r($tat);


        $query = "UPDATE posty SET nazwa='$tat' where id = '$asd' ";
        mysqli_query($connection, $query);



        $naj = mysqli_query($connection, 'select id from posty');
        $max = mysqli_fetch_assoc($naj);
        */





        while($row = mysqli_fetch_assoc($edit_categories_id))
        {
            foreach($row as $v => $c ) {




                if(($poi>=3) && ($poi<=5)) {

                    if($v=='tresc'){
                        $a=+1;
                        $table[$v] = $c;

                        echo "<h4 style='color: white'>" . $v . "</h4>";
                        ?>
                        <form action="opis.php?art=<?php echo $the_id ?>&edit=<?php echo $the_id ?> " enctype="multipart/form-data"  method="post">
                        <div <?php if ($v == "tresc") { ?> style="width: 1500px;"  <?php } else { ?>style="width: 900px;"<?php } ?> >
                            <?php //if ()
                            ?>
                            <textarea  <?php if ($v == "tresc"){ ?> rows="25" cols="20" <?php } ?>id="formularz" class="form-control" type="text" name="<?php echo $v ?>"><?php echo $c ?> </textarea>  </div>
                    <?php }

                    if($v=='img'){
                        $a=+1;
                        $table[$v] = $c;

                        echo "<h4 style='color: white'>" . $v . "</h4>";
                        ?>
                        <form action="opis.php?art=<?php echo $the_id ?>&edit=<?php echo $the_id ?>" method="post">
                        <div <?php if ($v == "tresc") { ?> style="width: 1500px;"  <?php } else { ?>style="width: 900px;"<?php } ?> ><input type="file" name="image">
                            <?php //if ()
                            ?>





                        </div>
                    <?php }


                    if (isset($_POST['aktualizuj'])) {
                        $_POST['aktualizuj']= htmlentities( $_POST['aktualizuj'], ENT_QUOTES, "UTF-8");
                        $_POST['aktualizuj']=mysqli_real_escape_string($connection, $_POST['aktualizuj']);

                        //$ty = [];
                        //foreach($row as $f)


                        $p = $_POST[$v];
                        /*$_POST[$v]= htmlentities( $_POST[$v], ENT_QUOTES, "UTF-8");*/
                       /* $_POST[$v]=mysqli_real_escape_string($connection, $_POST[$v]);*/


                        if($v=='tresc'){
                            $query = "UPDATE posty SET $v='$_POST[$v]' WHERE id= '$the_id' ";

                            $update_query = mysqli_query($connection, $query);}

                        if($v=='img'){
                            $img1=$_FILES['image']['name'];
                            $img2=$_FILES['image']['tmp_name'];
                            move_uploaded_file($img2,"img/$img1");
                            $query = "UPDATE posty SET $v='$img1' WHERE id= '$the_id' ";

                            $update_query = mysqli_query($connection, $query);

                        }


                        if (!$update_query) {
                            die("Update failed " . mysqli_error($connection));
                        }
                        ?>
                        <META HTTP-EQUIV="Refresh" Content="0; URL='opis.php?art=<?php echo $the_id ?>'">

                        <?php
                        $query = "update `posty` set date=CURRENT_TIMESTAMP where `id` = '$the_id'; ";

                        $add_query = mysqli_query($connection, $query);
                    }
                    $poi+=1;}else $poi+=2;
            }

            ?>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="aktualizuj" value="Aktualizuj">

            </form>


            </div>
        <?php }}
//$qqq = $_GET['edit'];
}

function dodajpost(){
    global $pparent;

    if(isset($_GET['add']))
    {
        $asd=$_GET['add'];

        ?>
        <!--<form action="dane_i_formularz$add.php" metchod="post">
        <div class="form-group">

            <select id="parent_id" name="parent_id" >

                <?php
        /*
                        global $connection;
                        $query = "SELECT * FROM baza";

                        $result = mysqli_query($connection, $query);

                        $parent_id = 0;

                        echo "<option value='$parent_id'>NEW $parent_id</option>";

                        if (!$result) {
                            die('Query FAILED' . mysqli_error());
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                            $animal_name = $row['Treść'];
                            $parent_id = $row['Nad_id'];

                            echo "<option value='$parent_id'>$animal_name
                            $parent_id</option>";

                        }


                        */?>
            </select>

        </div>
        </form>
-->
        <?php

        if (isset($_POST))

            global $connection;
        $query = "SELECT * FROM posty "; // LIMIT 4 ogranicza nam ilość wierszy wziętych z bazy danych todo
        $add_categories_id = mysqli_query($connection,$query);
        $yt=0;
        $pip=0;

        /*$query = "INSERT INTO 'baza'";*/
        $add_firstid=mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($add_firstid);
        $ttable = [];

        foreach ($row as $j => $k)
        {
            $tabble[$j] = $k;

            $ttable[]=$j;
        }



        if (isset($_POST['dodaj']))
        {
            $query = "INSERT INTO `posty` (`id`,`date`) VALUES ($asd,CURRENT_TIMESTAMP); ";

            $add_query = mysqli_query($connection, $query);
            $query = "SELECT Treść FROM baza where Nr_id=$asd";
            $ide = mysqli_query($connection, $query);
            $roww = mysqli_fetch_assoc($ide);
            $tat=[];
            foreach ($roww as $a)
            {
                $tat=$a;
            }
            //print_r($tat);


            $query = "UPDATE posty SET nazwa='$tat' where id = '$asd' ";
            mysqli_query($connection, $query);



            $naj = mysqli_query($connection, 'select id from posty');
            $max = mysqli_fetch_assoc($naj);



        }

        while($row)
        {
            /*$query = "UPDATE baza SET Nad_id='$parent_id' WHERE Nr_id= '$value' ";

            $update_query = mysqli_query($connection, $query);*/


            foreach($row as $v => $c ) {
                if(($pip>=3)&&($pip<=5)){
                    /*$table[$v] = $c;
                    echo "<h4>" . $v . "</h4>";
                    */?><!--
                    <form action="dane_i_formularz.php?add" method="post">
                    <div width="100" class="form-group"><input id="formularz" value="" class="form-control" type="text" name="<?php /*echo $v */?>"></div>
--><?php
                    if($v=='tresc'){
                        $a=+1;
                        $table[$v] = $c;

                        echo "<h4 style='color: white'>" . $v . "</h4>";
                        ?>
                        <form action="opis.php?art=<?php echo $asd ?>&add=<?php echo $asd ?> " enctype="multipart/form-data"  method="post">
                        <div <?php if ($v == "tresc") { ?> style="width: 1500px;"  <?php } else { ?>style="width: 900px;"<?php } ?> >
                            <?php //if ()
                            ?>
                            <textarea  <?php if ($v == "tresc"){ ?> rows="25" cols="20" <?php } ?>id="formularz"
                                                                    class="form-control" type="text"
                                                                    name="<?php echo $v ?>"> </textarea>  </div>
                    <?php }

                    if($v=='img'){
                        $a=+1;
                        $table[$v] = $c;

                        echo "<h4 style='color: white'>" . $v . "</h4>";
                        ?>
                        <form action="opis.php?art=<?php echo $asd ?>&add=<?php echo $asd ?>" method="post">
                        <div <?php if ($v == "tresc") { ?> style="width: 1500px;"  <?php } else { ?>style="width: 900px;"<?php } ?> ><input type="file" name="image">
                            <?php //if ()
                            ?>





                             </div>
                    <?php }


                    if (isset($_POST['dodaj'])) {
                        print_r($_POST);
                        print_r($_FILES);
                        while($max = mysqli_fetch_assoc($naj)){
                            $value = max($max);}

                        /*$pparent= htmlentities( $pparent, ENT_QUOTES, "UTF-8");
                        $pparent=mysqli_real_escape_string($connection, $pparent);*/

                        //$p = $_POST[$v];
                       /* $_POST[$v]= htmlentities( $_POST[$v], ENT_QUOTES, "UTF-8");
                        $_POST[$v]=mysqli_real_escape_string($connection, $_POST[$v]);*/


                        //echo $p." ".$ipe;
                        if($v=='tresc'){
                        $query = "UPDATE posty SET $v='$_POST[$v]' WHERE id= '$asd' ";

                        $update_query = mysqli_query($connection, $query);}

                        if($v=='img'){
                            $img1=$_FILES['image']['name'];
                            $img2=$_FILES['image']['tmp_name'];
                            move_uploaded_file($img2,"img/$img1");
                            $query = "UPDATE posty SET $v='$img1' WHERE id= '$asd' ";

                            $update_query = mysqli_query($connection, $query);

                        }

                        /*if (!$update_query) {
                            die("Update failed " . mysqli_error($connection));
                        }*/
                        ?>
                        <META HTTP-EQUIV="Refresh" Content="0; URL='opis.php?art=<?php echo $asd?>'">

                        <?php
                    }$pip+=1;}else $pip+=2;
            }
            ?>

            <!--<div class="form-group">

                <select id="parent_id" name="parent_id" >

                    <?php
/*
                    global $connection;
                    $query = "SELECT * FROM baza";

                    $result = mysqli_query($connection, $query);

                    $parent_id = 0;

                    echo "<option value='$parent_id'>NEW $parent_id</option>";

                    if (!$result) {
                        die('Query FAILED' . mysqli_error());
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        $animal_name = $row['Treść'];
                        $parent_id = $row['Nr_id'];

                        echo "<option value='$parent_id'>$animal_name
                    $parent_id</option>";

                    }


                    */?>
                </select>

            </div>-->

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="dodaj" value="Dodaj">

            </form>




            </div>
            <?php break;



        }

    }
    /*if (isset($_POST['dodaj'])) {
        echo $fn =  date('Y-m-d H:i:s');
        echo $t=$fn;
        $qu="SELECT CURRENT_DATE";
        $wynn = mysqli_query ($connection,$qu);
        print_r( $wynn);
        $queryo = "update posty set date=$wynn where id='$asd'";
        echo $wynik = mysqli_query ($connection,$queryo);

        if (!$wynik) {
                            echo("Update failed " . mysqli_error($connection));
                        }
    }*/
}

function editnote()
{

    global $connection;

if(isset($_GET['edit']))
{$a=1;

    $the_id=$_GET['edit'];

    $the_id= htmlentities( $the_id, ENT_QUOTES, "UTF-8");
    $the_id=mysqli_real_escape_string($connection, $the_id);


    $query = "SELECT * FROM posty WHERE id = $the_id"; // LIMIT 4 ogranicza nam ilość wierszy wziętych z bazy danych todo
    $edit_categories_id = mysqli_query($connection,$query);
    $yt=0;
    $poi=0;
    /*------

            $query = "SELECT Treść FROM baza where Nr_id=$asd";
            $ide = mysqli_query($connection, $query);
            $roww = mysqli_fetch_assoc($ide);
            $tat=[];
            foreach ($roww as $a)
            {
                $tat=$a;
            }
            //print_r($tat);


            $query = "UPDATE posty SET nazwa='$tat' where id = '$asd' ";
            mysqli_query($connection, $query);



            $naj = mysqli_query($connection, 'select id from posty');
            $max = mysqli_fetch_assoc($naj);
            */





while($row = mysqli_fetch_assoc($edit_categories_id))
{
foreach($row as $v => $c ) {




if(($poi>=3) && ($poi<=4)) {


    $a=+1;
    $table[$v] = $c;
?><form action="opis.php?art=<?php echo $the_id ?>&edit=<?php echo $the_id ?> " enctype="multipart/form-data"  method="post">
    <textarea name="tresc" id="editor1" rows="50" cols="50">
<?php if(isset($c)) echo $c;?>

</textarea>
<script>CKEDITOR.replace('editor1',{
        filebrowserBrowseUrl: './ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
</script> <?php




        if (isset($_POST['aktualizuj'])) {
            $_POST['aktualizuj']= htmlentities( $_POST['aktualizuj'], ENT_QUOTES, "UTF-8");
            $_POST['aktualizuj']=mysqli_real_escape_string($connection, $_POST['aktualizuj']);

            //$ty = [];
            //foreach($row as $f)


            $p = $_POST[$v];
            /*$_POST[$v]= htmlentities( $_POST[$v], ENT_QUOTES, "UTF-8");*/
             $_POST[$v]=mysqli_real_escape_string($connection, $_POST[$v]);



                $query = "UPDATE posty SET $v='$_POST[$v]' WHERE id= '$the_id' ";

                $update_query = mysqli_query($connection, $query);




            if (!$update_query) {
                die("Update failed " . mysqli_error($connection));
            }
            ?>
            <META HTTP-EQUIV="Refresh" Content="0; URL='opis.php?art=<?php echo $the_id ?>'">

            <?php
            $query = "update `posty` set date=CURRENT_TIMESTAMP where `id` = '$the_id'; ";

            $add_query = mysqli_query($connection, $query);
        }
        $poi+=1;}else $poi+=2;
        }

        ?>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="aktualizuj" value="Aktualizuj">

    </form>


    </div>
<?php }}
//$qqq = $_GET['edit'];




}

function dodajnote(){
    global $pparent;

if(isset($_GET['add']))
{
    $asd=$_GET['add'];

    ?>
    <!--<form action="dane_i_formularz$add.php" metchod="post">
        <div class="form-group">

            <select id="parent_id" name="parent_id" >

                <?php
    /*
                    global $connection;
                    $query = "SELECT * FROM baza";

                    $result = mysqli_query($connection, $query);

                    $parent_id = 0;

                    echo "<option value='$parent_id'>NEW $parent_id</option>";

                    if (!$result) {
                        die('Query FAILED' . mysqli_error());
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        $animal_name = $row['Treść'];
                        $parent_id = $row['Nad_id'];

                        echo "<option value='$parent_id'>$animal_name
                        $parent_id</option>";

                    }


                    */?>
            </select>

        </div>
        </form>
-->
    <?php

    if (isset($_POST))

        global $connection;
    $query = "SELECT * FROM posty "; // LIMIT 4 ogranicza nam ilość wierszy wziętych z bazy danych todo
    $add_categories_id = mysqli_query($connection,$query);
    $yt=0;
    $pip=0;

    /*$query = "INSERT INTO 'baza'";*/
    $add_firstid=mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($add_firstid);
    $ttable = [];

    foreach ($row as $j => $k)
    {
        $tabble[$j] = $k;

        $ttable[]=$j;
    }



    if (isset($_POST['dodaj']))
    {
        $query = "INSERT INTO `posty` (`id`,`date`) VALUES ($asd,CURRENT_TIMESTAMP); ";

        $add_query = mysqli_query($connection, $query);
        $query = "SELECT Treść FROM baza where Nr_id=$asd";
        $ide = mysqli_query($connection, $query);
        $roww = mysqli_fetch_assoc($ide);
        $tat=[];
        foreach ($roww as $a)
        {
            $tat=$a;
        }
        //print_r($tat);


        $query = "UPDATE posty SET nazwa='$tat' where id = '$asd' ";
        mysqli_query($connection, $query);



        $naj = mysqli_query($connection, 'select id from posty');
        $max = mysqli_fetch_assoc($naj);



    }

    while($row)
    {
    /*$query = "UPDATE baza SET Nad_id='$parent_id' WHERE Nr_id= '$value' ";

    $update_query = mysqli_query($connection, $query);*/


    foreach($row as $v => $c ) {
    if(($pip>=3)&&($pip<=4)){
    /*$table[$v] = $c;
    echo "<h4>" . $v . "</h4>";
    */?><!--
                    <form action="dane_i_formularz.php?add" method="post">
                    <div width="100" class="form-group"><input id="formularz" value="" class="form-control" type="text" name="<?php /*echo $v */?>"></div>
--><?php
    if($v=='tresc'){
    $a=+1;
    $table[$v] = $c;

     ?> <form action="opis.php?art=<?php echo $asd ?>&add=<?php echo $asd ?> " enctype="multipart/form-data"  method="post">
        <textarea name="tresc" id="editor1">


</textarea>
<script>CKEDITOR.replace('editor1',{
        filebrowserBrowseUrl: './ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
</script>
    <?php }


        if (isset($_POST['dodaj'])) {
            print_r($_POST);
            print_r($_FILES);
            while($max = mysqli_fetch_assoc($naj)){
                $value = max($max);}

            /*$pparent= htmlentities( $pparent, ENT_QUOTES, "UTF-8");
            $pparent=mysqli_real_escape_string($connection, $pparent);*/

            //$p = $_POST[$v];
            /* $_POST[$v]= htmlentities( $_POST[$v], ENT_QUOTES, "UTF-8");
             $_POST[$v]=mysqli_real_escape_string($connection, $_POST[$v]);*/


            //echo $p." ".$ipe;
            if($v=='tresc'){
                $query = "UPDATE posty SET $v='$_POST[$v]' WHERE id= '$asd' ";

                $update_query = mysqli_query($connection, $query);}



            /*if (!$update_query) {
                die("Update failed " . mysqli_error($connection));
            }*/
            ?>
            <META HTTP-EQUIV="Refresh" Content="0; URL='opis.php?art=<?php echo $asd?>'">

            <?php
        }$pip+=1;}else $pip+=2;
        }
        ?>

        <!--<div class="form-group">

                <select id="parent_id" name="parent_id" >

                    <?php
        /*
                            global $connection;
                            $query = "SELECT * FROM baza";

                            $result = mysqli_query($connection, $query);

                            $parent_id = 0;

                            echo "<option value='$parent_id'>NEW $parent_id</option>";

                            if (!$result) {
                                die('Query FAILED' . mysqli_error());
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                $animal_name = $row['Treść'];
                                $parent_id = $row['Nr_id'];

                                echo "<option value='$parent_id'>$animal_name
                            $parent_id</option>";

                            }


                            */?>
                </select>

            </div>-->

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="dodaj" value="Dodaj">

    </form>




    </div>
    <?php break;



}

}
    /*if (isset($_POST['dodaj'])) {
        echo $fn =  date('Y-m-d H:i:s');
        echo $t=$fn;
        $qu="SELECT CURRENT_DATE";
        $wynn = mysqli_query ($connection,$qu);
        print_r( $wynn);
        $queryo = "update posty set date=$wynn where id='$asd'";
        echo $wynik = mysqli_query ($connection,$queryo);

        if (!$wynik) {
                            echo("Update failed " . mysqli_error($connection));
                        }
    }*/
}

function profiledit($opis)
{
    ?> <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
<?php
    global $connection;

    if(isset($_GET['edit']))
    {


        $the_id=$_GET['edit'];

        $the_id= htmlentities( $the_id, ENT_QUOTES, "UTF-8");
        $the_id=mysqli_real_escape_string($connection, $the_id);

                    ?><form action="profil.php?edit=<?php echo $the_id ?> " enctype="multipart/form-data"  method="post">
                    <textarea name="tresc" id="editor1" >
<?php if(isset($opis)) echo $opis;?>

</textarea>
                    <script>CKEDITOR.replace('editor1',{
                            filebrowserBrowseUrl: './ckfinder/ckfinder.html',
                            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
                            filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                        });
                    </script>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update" value="Uaktualnij">
        </div>
        </form>


    <?php




                if (isset($_POST['update'])) {
                $_POST['update']= htmlentities( $_POST['update'], ENT_QUOTES, "UTF-8");
                $_POST['update']=mysqli_real_escape_string($connection, $_POST['update']);
                $_POST['tresc']=mysqli_real_escape_string($connection, $_POST['tresc']);
                $q = $_POST['tresc'];
                $query = "UPDATE users SET opis='$q'  WHERE name= '$the_id' ";

                $update_query = mysqli_query($connection, $query);

                if (!$update_query) {
                    die("Update failed " . mysqli_error($connection));
                }
                ?>
                <META HTTP-EQUIV="Refresh" Content="0; URL='profil.php'">

        <?php }}
//$qqq = $_GET['edit'];




}

function typusera()
{

    if(isset($_SESSION['email'])){
    global $connection;
   $a=$_SESSION['email'];
    $query = "select id_g from users where email = '$a' ";
    $ress=mysqli_query($connection,$query);

    while($nr= mysqli_fetch_array($ress)){
        $up = $nr;}

   $_SESSION['wybor'] = $up['id_g'];}
    else $_SESSION['wybor'] = 5;

}


    ?>
