<?php
include_once("header.php");
?>

<title>Login</title>

<body>
    <?php
    include_once("navbar-home.php");
    ?>
    <div class="container sm-Form">
    <h1>What's your role?</h1>
    <form action="<?php echo FRONT_ROOT . "User/typeLogin" ?>" method="post">
        

        <label class="btn btn-primary labshape"  for="owner">Owner</label>
        <input type="radio" id="owner" name="userType" value ="owner" required/>

        <label class="btn btn-primary labshape" for="keeper">Keeper</label>
        <input type="radio" id="keeper" name="userType" value ="keeper"  required/>
        
        <br>
        <button type="submit" class="btn btn-info">Log in</button>
    </form>
        </div>
</body>

</html>
<?php
include("footer.php");
?>