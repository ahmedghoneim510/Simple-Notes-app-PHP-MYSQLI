<?php
    require "connection.php";
    $del=new connection();
    echo '<pre>';print_r($_POST);echo '</pre>';
    $del->DeleteNote($_POST['id']);
    header("Location:../index.php");

?>