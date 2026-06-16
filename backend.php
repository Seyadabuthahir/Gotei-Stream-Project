<?php
$n=$_POST['name'];
$e=$_POST['email'];
$d=$_POST['dob'];
$p=$_POST['password'];
$conn=mysqli_connect("localhost", "root","","flixbase");
$sql=("INSERT INTO users (username,useremail,userdob,userpass) VALUES ('$n','$e','$d','$p')");
$r=mysqli_query($conn, $sql);
if($r)
{
    echo "User account created";
}
else
{
    echo "User account creation failed";
}
?>