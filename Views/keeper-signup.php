<?php
include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="validations.js"></script>
    <title>Keeper Sign up</title>
</head>

<body>
    <h1>KEEPER SIGNUP</h1>

    
    <form action="<?php echo FRONT_ROOT . "Keeper/Add" ?>" method="post">
    <!-- INFORMACION PERSONAL -->
    <div class="row mb-4 mt-4">
            <h1>Personal information</h1>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="firstName" class="form-control" name="firstname" required />
                    <label class="form-label" for="firstName">First name</label>
                </div>
            </div>
            
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="lastName" class="form-control" name="lastname" required />
                    <label class="form-label" for="lastName">Last name</label>
                </div>
            </div>
            
        </div>
        
        <div class="row mb-4 mt-4">
            
        <div class="col">
        <label class="form-label" for="Cuil">CUIL</label>
        <input type="number" id="Cuil" class="form-control" name="cuil" oninput="validateCuil()" />
        </div>
            <div class="col">
                <input type="text" id="Address" class="form-control" name="address" required />
                <label class="form-label" for="Address">Address</label>
            </div>
        </div>
        <?php date_default_timezone_set('America/Argentina/Buenos_Aires');
        $currentDate = date("Y-m-d");?>
        <label for="availabilityStart">Start date:</label>
        <input id="availabilityStart" name="availStart" type="date" class="form-control" placeholder="" required="" min="<?php echo $currentDate; ?>" oninput="validateStartDate()">
    </div>
    <br>
    <br>
    <div class="col">
        <label for="availabilityEnd">End date:</label>
        <input id="availabilityEnd" name="availEnd" type="date" class="form-control" title="" required="" oninput="validateEndDate()">
    </div>
        <br>
        <div class="row mb-4 mt-4">
            <div class="col">
                <input type="number" id="Telephone" class="form-control" name="telephone" required />
                <label class="form-label" for="Telephone">Telephone</label>
            </div>
            <div class="col">
                <input type="number" id="Price" class="form-control" name="price" required />
                <label class="form-label" for="Price">Price</label>
            </div>
        </div>
        
        <!-- INFORMACION DE USUARIO -->
        <div class="row mb-4 mt-4">
            <h1>Sign up information</h1>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="userName" class="form-control" name="username" required />
                    <label class="form-label" for="firstName">Username</label>
                </div>
            </div>
            <!-- pass -->
            <div class="col">
            <div class="form-outline">
                    <label class="form-label" for="Password">Password</label>
                    <input type="password" id="Password" class="form-control" name="password" oninput="validatePassword()" required />
                </div>
            </div>
        </div>
        <div class="single-col">
            <div class="form-outline">
                <input type="email" id="Email" class="form-control" name="email" required />
                <label class="form-label" for="Email">Email</label>
            </div>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
    </form>
    <script src="../Views/js/validations.js"></script>
</body>

</html>

<?php
include_once('footer.php');
?>