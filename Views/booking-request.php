<?php
include('header.php');
include('nav-bar-owner.php');
?>

<h2>Keeper profile</h2>
<form action="<?php echo FRONT_ROOT."Booking/Add" ?>" method="post">
                    <!-- Esto deberia ser como el resumen del keeper en el q solicitaste-->
                    <table>
          <thead>
            <tr>
              <th>First name</th>
              <th>Last name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Address</th>
              <th>Telephone</th>
              <th>Cuil</th>
              <th>Start</th>
              <th>End</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
                  <tr>
                    <td><?php echo $keeper->getFirstName() ?></td>
                    <td><?php echo $keeper->getLastName() ?></td>
                    <td><?php echo $keeper->getUserName() ?></td>
                    <td><?php echo $keeper->getEmail() ?></td>
                    <td><?php echo $keeper->getAddress() ?></td>
                    <td><?php echo $keeper->getCuil() ?></td>
                    <td><?php echo $keeper->getAvailStart() ?></td>
                    <td><?php echo $keeper->getAvailEnd() ?></td>
                    <td><?php echo $keeper->getPrice() ?></td>
                  </tr>    
          </tbody>
        </table>

    <div class="hidden">
        <input id="prodId" name="ownerId" type="hidden" value="<?php echo $_SESSION["userLogged"]->getId(); ?>">
        <input id="prodId" name="keeperId" type="hidden" value="<?php echo $keeper->getId(); ?>">
    </div>
    <div class="col">
        <label for="availabilityStart">Start date:</label>
        <input type="date" id="availabilityStart" class="form-control" name="initStart">
    </div>
    <br>
    <br>
    <div class="col">
        <label for="availabilityEnd">End date:</label>
        <input type="date" id="availabilityEnd" class="form-control" name="initEnd" title="La fecha inicial debe ser menor que la fecha final" oninput="validate()" >
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
   <p style="color:red;" ><?php if(isset($message)) echo $message;?></p> 
<?php
include_once('footer.php');
?>