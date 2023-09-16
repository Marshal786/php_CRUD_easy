<?php 

$db=mysqli_connect("localhost","root","","ashardb");


$id = $_GET['id'];
$qryd = "DELETE FROM datadb WHERE id=$id";

if(mysqli_query($db,$qryd))
{
    echo '<script> alert("employee deleted.....")</script>';
    header('location: index.php');

}
else
{
    echo mysqli_error($db);
}

?>