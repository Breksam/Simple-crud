<?php


$connection = mysqli_connect('localhost', 'root', '','crud');

if(!$connection){
    die('Connection Failed'. mysqli_connect_error());
}
