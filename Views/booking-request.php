<?php
include('header.php');
include('nav-bar-owner.php');
?>

<h2>Keeper profile</h2>
<form action="<?php echo FRONT_ROOT . "Booking/Add" ?>" method="post">
    <script>
        function validate() {
            if (document.getElementById('availabilityEnd').value < document.getElementById('availabilityStart').value)
                document.getElementById('availabilityEnd').setCustomValidity('Esta fecha debe ser mayor a la fecha inicial');
            else
                document.getElementById('availabilityEnd').setCustomValidity('');
        }
    </script>
    <!-- Esto deberia ser como el resumen del keeper en el q solicitaste-->
    <td><?php echo $keeper->getId() ?></td>
    <td><?php echo $keeper->getFirstName() ?></td>
    <td><?php echo $keeper->getLastName() ?></td>
    <td><?php echo $keeper->getUserName() ?></td>
    <td><?php echo $keeper->getEmail() ?></td>
    <td><?php echo $keeper->getAddress() ?></td>
    <td><?php echo $keeper->getAvailStart() ?></td>
    <td><?php echo $keeper->getAvailEnd() ?></td>
    <td><?php echo $keeper->getPrice() ?></td>

    <div class="hidden">
        <input id="prodId" name="ownerId" type="hidden" value="<?php echo $_SESSION["userLogged"]->getId(); ?>">
        <input id="prodId" name="keeperId" type="hidden" value="<?php echo $keeper->getId(); ?>">
    </div>
    <div class="col">
        <label for="availabilityStart">Start date:</label>
        <input type="date" id="availabilityStart" class="form-control" name="initStart" min="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <br>
    <br>
    <div class="col">
        <label for="availabilityEnd">End date:</label>
        <input type="date" id="availabilityEnd" class="form-control" name="initEnd" title="La fecha inicial debe ser menor que la fecha final" oninput="validate()" required>
    </div>

    <div>
        <select name="petId" id="Name">
            <?php
            foreach ($petListById as $pet) { ?>

                <?php if($pet->getSize() == $keeper->getTypekeep()) //Valido que los animales a elegir sea tamaño keeper
                {?>
                    <option value="<?php echo $pet->getId(); ?>"> <?php echo $pet->getName() ?></option>
                <?php
                }
                ?>
            <?php }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<br>