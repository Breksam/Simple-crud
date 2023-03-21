<?php
$success = '';
$error = '';

function requireFields($value){
    $str = trim($value);
    if(strlen($str)>0){
        return true;
    }
    return false;
}

function filterString($value){
    $str = trim($value);
    $str = filter_var($value, FILTER_SANITIZE_STRING);
    return $str;
}

function filterEmail($value){
    $email = trim($value);
    $email = filter_var($value, FILTER_SANITIZE_EMAIL);
    return $email;
}

function minName($value, $min){
    if(strlen($value) < $min){
        return false;
    }
    return true;
}

function maxPass($value, $max){
    if(strlen($value) > $max){
        return false;
    }
    return true;
}
?>