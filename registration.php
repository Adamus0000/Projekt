<?php session_start(); ?>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap-theme.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<?php include 'db.php';
include 'funkcje.php';
include 'nawigacja_p.php'; ?>



<?php


//header('location:login.php');
//print_r($_POST);
$con = mysqli_connect('localhost','root','','');

mysqli_select_db($con,'bazz');
$email=$_POST['email'];
$name=$_POST['user'];
$nazwisko=$_POST['nazwisko'];
$pass=$_POST['password'];
$pass2=$_POST['password2'];

//$wybor=$_POST['wybor'];
//$pin = $_POST['pinn'];

   /* $name= htmlentities( $name, ENT_QUOTES, "UTF-8");
    $pass = htmlentities($pass , ENT_QUOTES, "UTF-8");*/
    //$wybor= htmlentities( $wybor, ENT_QUOTES, "UTF-8");
    //$pin = htmlentities( $pin, ENT_QUOTES, "UTF-8");
/*if(strlen($name)<4)
{

    die("Hasło jest za któtkie(min.4 znaki)")
}*/
    $name=mysqli_real_escape_string($con, $name);
    $pass =mysqli_real_escape_string($con, $pass);
    $pass2 =mysqli_real_escape_string($con, $pass2);
    $nazwisko =mysqli_real_escape_string($con, $nazwisko);
    $email =mysqli_real_escape_string($con, $email);
    //$wybor=mysqli_real_escape_string($con, $wybor);
   // $pin=mysqli_real_escape_string($con, $pin);

    $hashFormat = "$2y$10$";

    $salt = "jesteminformatykiemk222";

    $hash_and_salt = $hashFormat.$salt;
    $pass = crypt($pass, $hash_and_salt);
$pass2 = crypt($pass2, $hash_and_salt);





$query ="select * from users where email = '$email'";
$result=mysqli_query($con, $query);

$num = mysqli_num_rows($result);
if($num==1)
{
   ?> <meta http-equiv="refresh" content="3;url=login.php" />
    <div class="login-box" id="asd"><h1 align="center">Użytkownik już istnieje. Wybierz inny login!</h1></div>
    <?php

}
else
{
        if ($pass===$pass2){
        $reg = "insert into users(id_g,email ,name, nazwisko , password) values ('4','$email','$name','$nazwisko','$pass')";
        mysqli_query($con, $reg);
        /*$reg2 = "insert into users_name(id,username) values ('2','$name')";
        mysqli_query($con, $reg2);*/
        ?>
            <meta http-equiv="refresh" content="3;url=login.php" />
            <div class="login-box" id="asd"><h1 align="center">Zarejestrowano pomyślnie!</h1></div>
<?php }


}

?>