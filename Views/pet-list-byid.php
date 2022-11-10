<main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable">
      <form action="<?php echo FRONT_ROOT."Pet/ShowListPetsbyOwnView" ?>" method="">
        <table style="text-align:center;">
          <thead>
            <tr>
            <th>Id</th>
              <th>Name</th>
              <th>Animal type</th>
              <th>Size</th>
              <th>Breed</th>
              <th>Vaccines</th>
              <th>Video</th>
              <th>Owner ID</th> <!-- Esto obviamente dps se omite -->
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($petListId as $pet)
              {
                ?>
                  <tr>
                  <td><?php echo $pet->getId() ?></td>
                    <td><?php echo $pet->getName() ?></td>
                    <td><?php echo $pet->getAnimalType() ?></td>
                    <td><?php echo $pet->getSize() ?></td>
                    <td><?php echo $pet->getBreed() ?></td>
                    <td><?php echo $pet->getVaccines() ?></td>
                    <td><?php echo $pet->getVideo() ?></td>
                    <td><?php echo $pet->getOwnerId() ?></td>
                    <button type="submit" name="id" value="<?php echo $pet->getId() ?>"> Remove </button> <!--Se ve horrible por el css -->
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