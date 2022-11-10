<main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable" >
      <form action="<?php echo FRONT_ROOT."Keeper/remove" ?>" method="">
        <table>
          <thead>
            <tr>
              <th >Id</th>
              <th>FirstName</th>
              <th>LastName</th>
              <th>Username</th>
              <th>Password</th> <!-- Esto obviamente dps se omite -->
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
            <?php
              foreach($keeperList as $keeper)
              {
                ?>
                  <tr>
                    <td><?php echo $keeper->getId() ?></td>
                    <td><?php echo $keeper->getFirstName() ?></td>
                    <td><?php echo $keeper->getLastName() ?></td>
                    <td><?php echo $keeper->getUserName() ?></td>
                    <td><?php echo $keeper->getPassword() ?></td> <!-- Tambien se omite dps -->
                    <td><?php echo $keeper->getEmail() ?></td>
                    <td><?php echo $keeper->getAddress() ?></td>
                    <td><?php echo $keeper->getCuil() ?></td>
                    <td><?php echo $keeper->getAddress() ?></td>
                    <td><?php echo $keeper->getAvailStart() ?></td>
                    <td><?php echo $keeper->getAvailEnd() ?></td>
                    <td><?php echo $keeper->getPrice() ?></td>
                    <td>
                      <button type="submit" name="id" class="btn" value="<?php echo $keeper->getId() ?>"> Remove </button>
                    </td>
                  </tr>
                <?php
              }
            ?>                          
          </tbody>
        </table></form> 
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>