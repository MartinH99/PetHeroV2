<?php
include_once('header.php');
?>
<h1>KEEPER SIGNUP</h1>

<form action="<?php echo FRONT_ROOT . "Keeper/Add" ?>" method="post">
    <!-- INFORMACION PERSONAL -->
    <div class="row mb-4 mt-4">
        <h1>Personal Info</h1>
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
            <input type="number" id="Cuil" class="form-control" name="cuil" required />
            <label class="form-label" for="Cuil">CUIL</label>
        </div>


        <div class="col">
            <input type="text" id="Address" class="form-control" name="address" required />
            <label class="form-label" for="Address">Address</label>
        </div>
    </div>
    <script>
        function validate() {
            if (document.getElementById('availabilityEnd').value < document.getElementById('availabilityStart').value)
                document.getElementById('availabilityEnd').setCustomValidity('Esta fecha debe ser mayor a la fecha inicial');
            else
                document.getElementById('availabilityEnd').setCustomValidity('');
        }
    </script>
    <div class="col">
        <label for="availabilityStart">Start date:</label>
        <input type="date" id="availabilityStart" class="form-control" name="availStart" min="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <br>
    <br>
    <div class="col">
        <label for="availabilityEnd">End date:</label>
        <input type="date" id="availabilityEnd" class="form-control" name="availEnd" title="La fecha inicial debe ser menor que la fecha final" oninput="validate()" required>
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
        <h1>Personal Info</h1>
        <div class="col">
            <div class="form-outline">
                <input type="text" id="userName" class="form-control" name="username" required />
                <label class="form-label" for="firstName">Username</label>
            </div>
        </div>

        <!-- pass -->
        <div class="col">
            <div class="form-outline">
                <input type="password" id="Password" class="form-control" name="password" required />
                <label class="form-label" for="Password">Password</label>
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
    <button type="submit" class="btn btn-primary btn-block mb-4">Register!</button>

</form>

<?php
include_once('footer.php');
?>