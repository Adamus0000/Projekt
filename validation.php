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





$con = mysqli_connect('localhost','root','','');

mysqli_select_db($con,'bazz');

$email=$_POST['email'];
$pass=$_POST['password'];

$pass = htmlentities( $pass, ENT_QUOTES, "UTF-8");
$email = htmlentities( $email, ENT_QUOTES, "UTF-8");

$pass=mysqli_real_escape_string($con, $pass);
$email=mysqli_real_escape_string($con, $email);
//echo $pass." ".$name;

$hashFormat = "$2y$10$";

$salt = "jesteminformatykiemk222";

$hash_and_salt = $hashFormat.$salt;
$pass = crypt($pass, $hash_and_salt);

$query = "select * from users where email = '$email' && password = '$pass'";
$result = mysqli_query($con, $query);

$num = mysqli_num_rows($result);
if($num==1)
{
    $query = "select id_g,name from users where email = '$email' ";
    $ress=mysqli_query($con,$query);

    $t = [];
    while($nr= mysqli_fetch_array($ress)){
        $up = $nr;}

        $_SESSION['wybor'] = $up['id_g'];
        $_SESSION['username']=$up['name'];
        $_SESSION['email']=$email;
   ?> <meta http-equiv="refresh" content="3;url=dane_i_formularz.php" />
    <div class="login-box pb-5 mb-5" id="asd"><h1 align="center">ZALOGOWANO!</h1></div>
    <?php
}
else
{


    ?><meta http-equiv="refresh" content="4;url=login.php" />
    <div class="login-box pb-5 mb-5" id="asd"><h1 align="center">PODAŁEŚ ZŁY LOGIN LUB HASŁO. PODAJ PONOWNIE</h1></div>
    <?php
}

?>

