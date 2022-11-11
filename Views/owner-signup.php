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
                <input type="text" id="firstName" class="form-control" name="name" required/>
                <label class="form-label" for="firstName">First name</label>
            </div>
        </div>

        <div class="col">
            <div class="form-outline">
                <input type="text" id="lastName" class="form-control" name="lastname" required/>
                <label class="form-label" for="lastName">Last name</label>
            </div>
        </div>

    </div>

    <div class="row mb-4 mt-4">
        <!-- Email input -->
        <div class="col">
            <input type="number" id="Dni" class="form-control" name="dni" required />
            <label class="form-label" for="Dni">DNI</label>
        </div>

        <!-- Number input -->
        <div class="col">
            <input type="text" id="Address" class="form-control" name="address" required />
            <label class="form-label" for="Address">Address</label>
        </div>
    </div>

    <div class="single-col">
            <input type="number" id="Telephone" class="form-control" name="telephone" required />
            <label class="form-label" for="Telephone">Telephone</label>
    </div>

    <!-- INFORMACION DE USUARIO -->
    <div class="row mb-4 mt-4">
        <h1>Personal Info</h1>
        <div class="col">
            <div class="form-outline">
                <input type="text" id="userName" class="form-control" name="username" required/>
                <label class="form-label" for="firstName">Username</label>
            </div>
        </div>

        <!-- pass -->
        <div class="col">
            <div class="form-outline">
                <input type="password" id="Password" class="form-control" name="password" required/>
                <label class="form-label" for="Password">Password</label>
            </div>
        </div>
    </div>

    <div class="single-col">
            <div class="form-outline">
                <input type="email" id="Email" class="form-control" name="email" required/>
                <label class="form-label" for="Email">Email</label>
    </div>



    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4" >Register!</button>
</form>
<?php
include_once('footer.php');
?>