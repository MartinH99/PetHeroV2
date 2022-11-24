<?php
include("header.php");
include("nav-bar-owner.php");
include("inner-nav.php");
?>

<h1>Coupons list</h1>
<form action="<?php echo FRONT_ROOT."Coupon/showPaymentCoupBook"?>" method="post">


        <div class="row card-group w-60 mt-5 mb-4 ms-8 p-5 ">
        <?php if(empty($arrayCouponBookInfoOwn))
        {
            echo "No coupons in your listings";
        }else
        {
            foreach ($arrayCouponBookInfoOwn as $fullCouponBook)
            {
        ?>
            <div class="col-md-4">
                <div class="card bg-light m-5 border-start ">
                    <img src="https://cdn-icons-png.flaticon.com/512/2037/2037881.png" class="card-img-top mt-3" alt="destacados" />
                    <div class="card-body ">
                        <h5 class="card-title text-dark fs-6 d-flex justify-content-center ">Coupon Info</h5>
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item">Coupon asoc :<?php echo $fullCouponBook["couponId"]; ?></li>
                            <li class="list-group-item">Codebook :<?php echo $fullCouponBook["codeBook"]; ?></li>
                                <li class="list-group-item">Total :<?php echo $fullCouponBook["total"]; ?></li>
                                <li class="list-group-item">Subtotal :<?php echo $fullCouponBook["subtotal"]; ?></li>
                                <li class="list-group-item">Coupon status :<?php echo $fullCouponBook["couponStatus"]; ?></li>
                            </ul>
                        
                        <h5 class="card-title text-dark fs-6 d-flex justify-content-center ">Participants</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Owner username : <?php echo $fullCouponBook["ownerId"]; ?></li>
                                <li class="list-group-item">Keeper username :<?php echo $fullCouponBook["keeperId"];?></li>
                                <li class="list-group-item">Pet name :<?php echo $fullCouponBook["petId"];?></li>
                            </ul>
                            <h5 class="card-title text-dark fs-6 d-flex justify-content-center ">Dates</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Initial Date : <?php echo $fullCouponBook["initDate"]; ?></li>
                                <li class="list-group-item">End Date :<?php echo $fullCouponBook["endDate"];?></li>
                                <li class="list-group-item">Total Days :<?php echo "placeholder";?></li>
                            </ul>
                            </div>

                            <div class="d-flex justify-content-between card-footer">

                                <!-- <button type="submit" class="btn" name="codeBook" value="<?php  ?>" id="danger-outlined"> Modify </button> -->

                                <?php if($fullCouponBook["couponStatus"] == "accepted" && $fullCouponBook["status"] == "accepted")
                                { ?>
                                        <div class="form-check">
                                            <button type="submit" class="btn bg-success text-white" name="couponId" value="<?php echo $fullCouponBook["couponId"] ?>">Pay booking</button>
                                        </div>
                               <?php } ?>
            
                                <div class="form-check">
                                    <a href="#" class="btn bg-danger text-white" name="couponId" v type="button">Cancel booking</a>
                                </div>
                            </div>
                    </div>
                    
                    </div>
                
            
        <?php
            }
        }
        ?>
        </div>
        </div>
</form>