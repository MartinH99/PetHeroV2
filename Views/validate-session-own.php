<?php
if(isset($_SESSION["userLogged"]))
{
    $loggedOwn = $_SESSION["userLogged"];
}else
    header("location:../index.php");    
?>