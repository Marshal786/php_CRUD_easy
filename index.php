<?php $db=mysqli_connect("localhost","root","","ashardb") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post">
<input type="text" name="name" placeholder="Enter Your Name:">
<input type="text" name="mail" placeholder="Enter Your Email:">
<input type="text" name="add" placeholder="Enter Your Address:">

<input type="submit" name="Submit" value="submit" >
</form>

<?php
if(isset($_POST['Submit']))
{
    $n = $_POST['name'];
    $em = $_POST['mail'];
    $ad = $_POST['add'];


    $qry = "insert into datadb values(null,'$n','$em','$ad')";

    if(mysqli_query($db,$qry))
    {
        echo '<script> alert("employee registred.....")</script>';
        header('location: index.php');

    }
    else
    {
        echo mysqli_error($db);
    }
}
        
?>
    
<hr>
<h3>Employee List:</h3>

<table style="width: 70%;" border="1">
<tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>ADDRESS</th>
    <th>OPERATION</th>
</tr>
<?php 
$i=1;

$qrys = "select * from datadb";
$run = $db -> query($qrys);

if($run -> num_rows>0)
{
    while($row = $run ->fetch_assoc())
    { $id = $row['id'];
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $row['name'] ?></td>
<td><?php echo $row['email'] ?></td>
<td><?php echo $row['address'] ?></td>
<td>
   <a href="update.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure?')">update</a> 
   <a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure?')">Delete</a> 
</td>
</tr>
<?php 
    }
}
?>
</table>



