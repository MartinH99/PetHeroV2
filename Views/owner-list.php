<main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable" >
      <form action="<?php echo FRONT_ROOT."Owner/remove" ?>" method="">
        <table>
          <thead>
            <tr>
              <th >Id</th>
              <th>Name</th>
              <th>Username</th>
              <th>Password</th> <!-- Esto obviamente dps se omite -->
              <th>Email</th>
              <th>Address</th>
              <th>Dni</th>
              <th>Telephone</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($ownerList as $owner)
              {
                ?>
                  <tr>
                    <td><?php echo $owner->getId() ?></td>
                    <td><?php echo $owner->getFirstName() ?></td>
                    <td><?php echo $owner->getLastName() ?></td>
                    <td><?php echo $owner->getUserName() ?></td>
                    <td><?php echo $owner->getPassword() ?></td> <!-- Tambien se omite dps -->
                    <td><?php echo $owner->getEmail() ?></td>
                    <td><?php echo $owner->getAddress() ?></td>
                    <td><?php echo $owner->getDni() ?></td>
                    <td><?php echo $owner->getTelephone() ?></td>
                    <td>
                      <button type="submit" name="id" class="btn" value="<?php echo $owner->getId() ?>"> Remove </button>
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