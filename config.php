<?php
// $conn= mysqli_connect("localhost","root","school") or die("connection failed");
// $conn=  mysql_connect("localhost","root","","school");

$conn= mysqli_connect("localhost", "root", "", "school");
 if($conn){
    echo" done";

 }
 else{

    die(" ERROR: could not connect." . mysqli_connect_error());  


 }
?>