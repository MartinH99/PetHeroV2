<?php
include("header.php");
include("inner-nav.php");
include ("avail-dates.php");
?>
<form action="<?php echo FRONT_ROOT ."Booking/AddBookView"?>" method="post">
<div class="container-fluid bg-light d-flex justify-content-center ">
    <div class="row card-group w-60 mt-5 mb-4 ms-8 p-5 ">
        
        <?php foreach ($keeperList as $keeper) {
        ?>
        <div class="col-md-4">
            <div class="card bg-light m-5 border-start ">
                <img src="http://cdn.sheknows.com/articles/2014/06/Mike_C/SheKnows_US/1039483/Woman-kissing-dog.jpg" class="card-img-top mt-3" alt="destacados" />
                <div class="card-body ">
                    <h5 class="card-title text-dark fs-6 d-flex justify-content-center ">
                        <?php echo $keeper->getFirstname(); ?>
                    </h5>
                    <h6 class="card-subtitle text-secondary fst-italic opacity-50 fw-light d-flex justify-content-center">
                    Telephone : <?php echo  $keeper->getTelephone(); ?>
                    </h6>
                </div>
                <div class="card-footer">
                    <medium class="badge text-wrap fs-6 d-flex justify-content-center"><?php echo " $ ".$keeper->getPrice(); ?></medium>
                    <div class="d-grid gap-2 col-9 mx-auto">
                        
                        <button type="sumbit" name="id" class="btn btn-outline btn-small p-1 mb-1 mt-2"  value="<?php echo $keeper->getId(); ?>">
                            Solicitar
                        </button>
                    </div>
                </div>
            </div>
            </div>
        <?php
        }
        ?>
        
    </div>
</div>
</form>
<?php
include("footer.php");
?>