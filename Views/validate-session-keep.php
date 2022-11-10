<?php
if(isset($_SESSION["userLogged"]))
{
    $loggedKeep = $_SESSION["userLogged"];
}else
    header("location:../index.php");  
?>