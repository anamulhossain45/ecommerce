<?php 
 require_once("db.php");
 require_once("function.php");
 session_start();
 if(file_exists('css/materialize.min.css')) {
     $path = '';
 } elseif(file_exists('../css/materialize.min.css')) {
     $path = '../';
 } else {
    $path = '../../';
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?=$path;?>css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?=$path;?>css/style.css"/>
</head>
<body class="container">
