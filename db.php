<?php
$connection = mysqli_connect ('localhost','root','','bazz');

mysqli_set_charset($connection, 'utf8'); //znaki polsie todo
/*if($connection)
{
    echo "Connected with basedata<br>";
}
else
{
    echo "No connected with basedata";
}*/

$tab = [];
$query = "SELECT * FROM baza";
$select_all_query = mysqli_query($connection,$query);

if (!$select_all_query)
{
    die('Query fail' . mysqli_error());
}
else {
    while ($row = mysqli_fetch_assoc($select_all_query)) {
        foreach($row as $n => $w) $tab[$row['Nr_id']][$n]=$w;
    }
}
$dl = count($tab);
?>