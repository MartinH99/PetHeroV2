<?php
include_once("header.php");
?>

<title>Sign Up</title>

<body>
    <?php
    include_once("navbar-home.php");
    ?>
    <div class="container sm-Form">
    <h1>What's your role?</h1>
    <form action="<?php echo FRONT_ROOT . "User/typeSignup" ?>" method="post">
        

        <label class="btn btn-primary labshape"  for="owner">Owner</label>
        <input type="radio" id="owner" name="userType" value ="owner" />

        <label class="btn btn-primary labshape" for="keeper">Keeper</label>
        <input type="radio" id="keeper" name="userType" value ="keeper"  />
        
        <br>
        <button type="submit" class="btn btn-info">Register</button>
    </form>
        </div>
</body>

</html>
<?php
include("footer.php");
?>