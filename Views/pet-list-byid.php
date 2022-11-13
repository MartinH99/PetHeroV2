<?php include_once("nav-bar-owner.php")?>
<main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable">
      <form action="<?php echo FRONT_ROOT."Pet/Remove" ?>" method="post">
        <table style="text-align:center;">
          <thead>
            <tr>
              <th>Name</th>
              <th>Animal type</th>
              <th>Size</th>
              <th>Breed</th>
              <th>Vaccines</th>
              <th>Image</th>
              <th>Video</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($petListId as $pet)
              {
                ?>
                  <tr>
                    <td><?php echo $pet->getName() ?></td>
                    <td><?php if($pet->getAnimalType() == 1) echo "Dog"; else echo "Cat";?></td>
                    <td><?php if($pet->getSize() == 1) echo "Small"; else if($pet->getSize()==2) echo "Medium"; else echo "Large";?></td>
                    <td><?php echo $pet->getBreed() ?></td>
                    <td><?php echo $pet->getVaccines() ?></td>
                    <td><?php echo $pet->getImage()?></td>
                    <td><?php echo $pet->getVideo() ?></td>
                    <td><button type="submit" name="petId" id="btnRemove" value="<?php echo $pet->getId() ?>"> Remove </button></td> <!--Se ve horrible por el css -->
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
<?php include_once("footer.php")?>