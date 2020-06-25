<?php
$con=mysqli_connect('localhost','root','','event') OR die('Error');

function random_string($length = 10) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


error_reporting(0);


extract($_POST);
extract($_GET);
session_start();


if(function_exists('date_default_timezone_set'))
{
    date_default_timezone_set("Asia/Kolkata");
}





$date = date("Y-m-d");
$time =  date("H:i a");

// echo $time;
// echo $date;




?>