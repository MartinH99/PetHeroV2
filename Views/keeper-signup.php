<?php
include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keeper Sign up</title>
</head>

<body>
    <h1>KEEPER SIGNUP</h1>

    
    <form action="<?php echo FRONT_ROOT . "Keeper/Add" ?>" method="post">
    <!-- los campos no tienen REQUIRED porque las validaciones estan hechas en el Controller -->
    <!-- INFORMACION PERSONAL -->
    <div class="row mb-4 mt-4">
            <h1>Personal information</h1>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="firstName" class="form-control" name="firstname" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']?>" />
                    <label class="form-label" for="firstName">First name</label>
                </div>
            </div>
            
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="lastName" class="form-control" name="lastname" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']?>"  />
                    <label class="form-label" for="lastName">Last name</label>
                </div>
            </div>
            
        </div>
        
        <div class="row mb-4 mt-4">
            
        <div class="col">
        <label class="form-label" for="Cuil">CUIL</label>
        <input type="number" id="Cuil" class="form-control" name="cuil" oninput="validateCuil()" value="<?php if (isset($_POST['cuil'])) echo $_POST['cuil']?>" />
        </div>
            <div class="col">
                <input type="text" id="Address" class="form-control" name="address" value="<?php if (isset($_POST['address'])) echo $_POST['address']?>"  />
                <label class="form-label" for="Address">Address</label>
            </div>
        </div>
        <label for="availabilityStart">Start date:</label>
        <input id="availabilityStart" name="availStart" type="date" class="form-control"  value="<?php if (isset($_POST['availStart'])) echo $_POST['availStart']?>" placeholder="">
    </div>
    <br>
    <br>
    <div class="col">
        <label for="availabilityEnd">End date:</label>
        <input id="availabilityEnd" name="availEnd" type="date" class="form-control" value="<?php if (isset($_POST['availEnd'])) echo $_POST['availEnd']?>">
    </div>
        <br>
        <div class="row mb-4 mt-4">
            <div class="col">
                <input type="number" id="Telephone" class="form-control" name="telephone" value="<?php if (isset($_POST['telephone'])) echo $_POST['telephone']?>"  />
                <label class="form-label" for="Telephone">Telephone</label>
            </div>
            <div class="col">
                <input type="number" id="Price" class="form-control" name="price" value="<?php if (isset($_POST['price'])) echo $_POST['price']?>" />
                <label class="form-label" for="Price">Price</label>
            </div>
        </div>
        
        <!-- INFORMACION DE USUARIO -->
        <div class="row mb-4 mt-4">
            <h1>Sign up information</h1>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="userName" class="form-control" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']?>" />
                    <label class="form-label" for="firstName">Username</label>
                </div>
            </div>
            <!-- pass -->
            <div class="col">
            <div class="form-outline">
                    <label class="form-label" for="Password">Password</label>
                    <input type="password" id="Password" class="form-control" name="password" oninput="validatePassword()" value="<?php if (isset($_POST['password'])) echo $_POST['password']?>" />
                </div>
            </div>
        </div>
        <div class="single-col">
            <div class="form-outline">
                <input type="text" id="Email" class="form-control" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']?>" />
                <label class="form-label" for="Email">Email</label>
            </div>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
    </form>
    <br>
    <?php if ($message != null) { ?>
    <p style="color:red;">
    <?php echo $message; ?>
    </p>
    <?php } ?>
</body>

</html>

<?php
include_once('footer.php');
?>