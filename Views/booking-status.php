<?php
include("header.php");
include("nav-bar-keeper.php");
include("inner-nav.php");
?>

<h1>Booking status change</h1>
<form action="<?php echo FRONT_ROOT . "Booking/modifyStatusBook" ?>" method="post">

    <div class="row card-group w-60 mt-5 mb-4 ms-8 p-5 ">
        <?php foreach ($allBookingByIdFormated as $booking) {
        ?>
            <div class="col-md-4">
                <div class="card bg-light m-5 border-start ">
                    <img src="http://cdn.sheknows.com/articles/2014/06/Mike_C/SheKnows_US/1039483/Woman-kissing-dog.jpg" class="card-img-top mt-3" alt="destacados" />
                    <div class="card-body ">


                        <h5 class="card-title text-dark fs-6 d-flex justify-content-center ">Booking Info
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Codebook: <?php echo $booking->getCodeBook(); ?></li>
                                <li class="list-group-item">Init date: <?php echo $booking->getInitDate(); ?></li>
                                <li class="list-group-item">End date: <?php echo $booking->getEndDate(); ?></li>
                            </ul>
                        </h5>
                        <h6 class="card-subtitle text-secondary fst-italic  fw-light d-flex justify-content-center">Participants
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Owner username: <?php echo $booking->getIdOwner2();?></li>
                                <li class="list-group-item">Keeper username: <?php echo $booking->getIdKeeper2();?></li>
                                <li class="list-group-item">Pet name: <?php echo $booking->getIdPet2();?></li>
                            </ul>
                        </h6>
                        <h4>Status: <?php echo $booking->getStatus(); ?></h4>
                    </div>
                    <div class="d-flex card-footer">

                        <button type="submit" class="btn" name="codeBook" value="<?php echo $booking->getCodeBook(); ?>" id="danger-outlined"> Modify </button>

                        <div class="form-check">
                            <label class="form-check-label" for="Confirmed">Confirm</label>
                            <input class="form-check-input" name="status" type="radio" value="confirmed" id="Confirmed" />
                           
                        </div>

                        <div class="form-check">
                            <label class="form-check-label" for="Rejected">Reject</label>
                            <input class="form-check-input" name="status" type="radio" value="rejected" id="Rejected" />
                            
                        </div>

                        


                        <div class="d-grid gap-2 col-9 mx-auto">


                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</form>