<?php
include("header.php");
include("nav-bar-owner.php");
include("inner-nav.php");
?>

<h1>Coupons list</h1>
<form action="" method="post">

    <div class="row card-group w-60 mt-5 mb-4 ms-8 p-5 ">
        <?php foreach ($arrayCouponBookInfoOwn as $fullCouponBook) {
        ?>
            <div class="col-md-4">
                <div class="card bg-light m-5 border-start ">
                    <img src="https://cdn-icons-png.flaticon.com/512/2037/2037881.png" class="card-img-top mt-3" alt="destacados" />
                    <div class="card-body ">


                        <h5 class="card-title text-dark fs-6 d-flex justify-content-center ">Coupon Info
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Total :<?php echo $fullCouponBook["total"]; ?></li>
                                <li class="list-group-item">Subtotal :<?php echo $fullCouponBook["subtotal"]; ?></li>
                                <li class="list-group-item">Coupon status :<?php echo $fullCouponBook["couponStatus"]; ?></li>
                            </ul>
                        </h5>
                        <h6 class="card-subtitle text-secondary fst-italic  fw-light d-flex justify-content-center">Participants
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Owner username : <?php echo $fullCouponBook["ownerId"]; ?></li>
                                <li class="list-group-item">Keeper username :<?php echo $fullCouponBook["keeperId"];?></li>
                                <li class="list-group-item">Pet name :<?php echo $fullCouponBook["petId"];?></li>
                            </ul>
                        </h6>
                        <h4>Status : <?php  ?></h4>
                    </div>
                    <div class="d-flex card-footer">

                        <button type="submit" class="btn" name="codeBook" value="<?php  ?>" id="danger-outlined"> Modify </button>

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