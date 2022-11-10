<main class="hoc container clear">
  <!-- main body -->
  <div class="content">
    <div class="scrollable">
      <form action="<?php echo FRONT_ROOT . "Keeper/Modify" ?>" method="">
        <table>
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Username</th>
              <th>Password</th> <!-- Esto obviamente dps se omite -->
              <th>Email</th>
              <th>Address</th>
              <th>Cuil</th>
              <th>Start</th>
              <th>End</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <?php  ?>
            <tr>
              <td><?php echo $keeperLogeado->getId() ?></td>
              <td><?php echo $keeperLogeado->getName() ?></td>
              <td><?php echo $keeperLogeado->getUserName() ?></td>
              <td><?php echo $keeperLogeado->getPassword() ?></td> <!-- Tambien se omite dps -->
              <td><?php echo $keeperLogeado->getEmail() ?></td>
              <td><?php echo $keeperLogeado->getAddress() ?></td>
              <td><?php echo $keeperLogeado->getCuil() ?></td>
              <td>
                <input id="availStart" type="text" value="<?php echo $keeperLogeado->getAvailStart() ?>" disabled>
                <input id="editAvailStart" type="button" name="availStart">
              </td>

              <td>
                <input id="availEnd" type="text" value="<?php echo $keeperLogeado->getAvailEnd() ?>" disabled>
                <input id="editAvailEnd" type="button" name="availEnd">
              </td>
              <td><?php echo $keeperLogeado->getPrice() ?></td>
            </tr>
          </tbody>
        </table>
      </form>
      <script>
        var modify = document.getElementById('editAvailStart');
        var toModify = document.getElementById('availStart');
        modify.addEventListener('click', function() {
          toModify.disabled = false;
          toModify.focus(); // set the focus on the editable field
        });
      </script>
      <script>
        var modify2 = document.getElementById('editAvailEnd');
        var toModify2 = document.getElementById('availEnd');
        modify2.addEventListener('click', function() {
          toModify2.disabled = false;
          toModify2.focus(); // set the focus on the editable field
        });
      </script>
    </div>
  </div>
  <!-- / main body -->
  <div class="clear"></div>
</main>
</div>