<?php 
    require "connection.php";
    $add=new Connection();
    $id=$_POST['id']?? '';
    if($id){
        $add->UpdateNode(($id),$_POST);
    }
    else
    {
        $add->Addnote($_POST);
    }
    header("Location:../index.php");
?>