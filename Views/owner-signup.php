<?php
include_once('header.php');
?>
<h1>OWNER SIGNUP</h1>
<form action="<?php echo FRONT_ROOT . "Owner/Add" ?>" method="post">
    <!-- INFORMACION PERSONAL -->
    <div class="row mb-4 mt-4">
        <h1>Personal Info</h1>
        <div class="col">
            <div class="form-outline">
                <input type="text" id="firstName" class="form-control" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']?>"/>
                <label class="form-label" for="firstName">First name</label>
            </div>
        </div>

        <div class="col">
            <div class="form-outline">
                <input type="text" id="lastName" class="form-control" name="lastname" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']?>"/>
                <label class="form-label" for="lastName">Last name</label>
            </div>
        </div>

    </div>

    <div class="row mb-4 mt-4">
        <!-- Email input -->
        <div class="col">
            <input type="number" id="Dni" class="form-control" name="dni" value="<?php if (isset($_POST['dni'])) echo $_POST['dni']?>" />
            <label class="form-label" for="Dni">DNI</label>
        </div>

        <!-- Number input -->
        <div class="col">
            <input type="text" id="Address" class="form-control" name="address" value="<?php if (isset($_POST['address'])) echo $_POST['address']?>" />
            <label class="form-label" for="Address">Address</label>
        </div>
    </div>

    <div class="single-col">
            <input type="number" id="Telephone" class="form-control" name="telephone" value="<?php if (isset($_POST['telephone'])) echo $_POST['telephone']?>" />
            <label class="form-label" for="Telephone">Telephone</label>
    </div>

    <!-- INFORMACION DE USUARIO -->
    <div class="row mb-4 mt-4">
        <h1>Personal Info</h1>
        <div class="col">
            <div class="form-outline">
                <input type="text" id="userName" class="form-control" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']?>"/>
                <label class="form-label" for="firstName">Username</label>
            </div>
        </div>

        <!-- pass -->
        <div class="col">
            <div class="form-outline">
                <input type="password" id="Password" class="form-control" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']?>"/>
                <label class="form-label" for="Password">Password</label>
            </div>
        </div>
    </div>

    <div class="single-col">
            <div class="form-outline">
                <input type="text" id="Email" class="form-control" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']?>"/>
                <label class="form-label" for="Email">Email</label>
    </div>
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4" >Register</button>
</form>
<br>
<?php if ($message != null) { ?>
    <p style="color:red;">
    <?php echo $message; ?>
    </p>
    <?php } ?>
<?php
include_once('footer.php');
?>