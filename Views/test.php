<!DOCTYPE html>
<html>
<head>
    <title>PetHero</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href=<?php echo CSS_PATH."/styleIndex.css" ?> type="text/css" media="all">
    <link rel="icon" href="<?php echo FRONT_ROOT."Home/index"?>">
    <script src="https://kit.fontawesome.com/7571cdfd05.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("navbar-home.php"); 
    ?>

    <a href="<?php echo FRONT_ROOT."Owner/ShowListOwnersView"?>" class="a-navbar">Lista de OWNERS</a>
    <a href="<?php echo FRONT_ROOT."Keeper/ShowListKeepersView"?>" class="a-navbar">Lista de Keepers</a>
    <a href="<?php echo FRONT_ROOT."Pet/ShowListPetsView"?>" class="a-navbar">Lista de Mascotas</a>
    <a href="<?php echo FRONT_ROOT."Keeper/Modify"?>" class="a-navbar">Modificar keeper fechas</a>
    <a href="<?php echo FRONT_ROOT."Pet/ShowListPetsbyOwnView"?>" class="a-navbar">Perros dueño por ID</a>
    
    <a href="../Views/add-pet.php" class="a-navbar">AGREGAR MASCOTA</a>
    

    <?php
    include("footer.php");

    ?>

