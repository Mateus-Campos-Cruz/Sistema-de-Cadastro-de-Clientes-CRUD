<?php

$servername = "localhost";
$usernanme = "root";
$password = "";
$database = "crud2";

$conn = mysqli_connect($servername, $usernanme, $password,$database);

if(!$conn){
    die("Connection failed ". mysqli_connect_error());
}

//echo "Connected sucessfully";