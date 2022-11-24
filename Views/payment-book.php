<?php
    include("header.php");
    include("nav-bar-owner.php");
    include("inner-nav.php");
?>
<div class="container"> <!--En este caso en particular no se si precisa un form sino mas bien que solo dispare el cambio del estado del booking y del coupon en una vistaX -->
        <div class="row m-0">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row">
                    <div class="col-12 p-5">
                        <img class="card-img-top" src="https://i.ytimg.com/vi/GiLY2jTDiRg/maxresdefault.jpg"
                            alt="">
                    </div>
                    <div class="row m-0 bg-light">
                        <?php
                        if(isset($infoCouponArr["keeperId"])){?>
                        <div class="col-md-4 col-6 ps-30 pe-0 my-4">
                            <p class="text-muted">Keeper username</p>
                            <p class="h5"><?php echo $infoCouponArr["keeperId"] ?>
                        </div>
                        <div class="col-md-4 col-6  ps-30 my-4">
                            <p class="text-muted">Keeper Size care</p>
                            <p class="h5 m-0"><?php echo $keeperObj->getTypeKeep2() ?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Pet to care :</p>
                            <p class="h5 m-0"><?php echo $petObj->getName() ?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Full name</p>
                            <p class="h5 m-0"><?php echo $keeperObj->getFirstname()." ".$keeperObj->getLastname() ?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Contact</p>
                            <p class="h5 m-0"><?php echo $keeperObj->getTelephone() ?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Stars</p>
                            <p class="h5 m-0"><?php echo $keeperObj->getStars() ?></p>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-4">
                <div class="row m-0">
                    <div class="col-12 px-4">
                        <div class="d-flex align-items-end mt-4 mb-2">
                            <p class="h4 m-0"><span class="pe-1">Brief</span></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Days</p> <!-- Sacar de interval cant dias -->
                            <p class="fs-14 fw-bold">X</p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Subtotal</p>
                            <p class="fs-14 fw-bold"><span class="fas fa-dollar-sign pe-1"></span>xxxxx</p>
                        </div>
                        <!-- <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Shipping</p>
                            <p class="fs-14 fw-bold">Free</p>
                        </div> -->
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Pending 50%</p>
                            <p class="fs-14 fw-bold">-<span class="fas fa-dollar-sign px-1"></span>(50%)<?php echo $infoCouponArr["subtotal"]  ?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Total</p>
                            <div class="d-flex align-text-top ">
                                <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span><span class="h4"><?php echo $infoCouponArr["subtotal"] ?></span>
                            </div>
                        </div>
                    </div>
                    <form action="<?php echo FRONT_ROOT."Coupon/payOutCoupBook"?>" method="post">
                    <div class="col-12 px-0">
                        <div class="row bg-light m-0">
                            <div class="col-12 px-4 my-4">
                                <p class="fw-bold">Payment detail</p>
                            </div>
                            <div class="col-12 px-4">
                                <div class="d-flex  mb-4">
                                    <span class="">
                                        <p class="text-muted">Card number <br><sub>(no blanks)</sub></p>
                                        <input class="form-control" type="text" name="cardnumber" value="<?php if (isset($_POST["cardnumber"])) echo $_POST["cardnumber"]?>"
                                            placeholder="1234 5678 9012 3456">
                                    </span>
                                    <div class=" w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">Expires</p>
                                        <input class="form-control2" type="month" name="expire" value="<?php if (isset($_POST["expire"])) echo $_POST["expire"]?>">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <span class="me-5">
                                        <p class="text-muted">Cardholder name</p>
                                        <input class="form-control" type="text" name="cardname" value="<?php if (isset($_POST["cardname"])) echo $_POST["cardname"]?>"
                                            placeholder="Name">
                                    </span>
                                    <div class="w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">CVC</p>
                                        <input class="form-control3" type="text" name="cvc" value="<?php if (isset($_POST["cvc"])) echo $_POST["cvc"]?>" placeholder="XXX">
                                    </div>
                                </div>
                            </div>
                            <!-- Hidden inputs donde mandas el codigo de reserva y el codigo del booking -->
                            <input type="hidden" name="couponId" value="<?php echo $infoCouponArr["couponId"] ?>">
                            <input type="hidden" name="codeBook"  value="<?php echo $infoCouponArr["codeBook"] ?>" >
                        </div>
                        <div class="row m-0">
                        <?php if (isset($message)) { ?>
                        <p style="color:#ff0000;">
                        <?php echo $message; ?>
                        </p>
                        <?php } ?>
                            <div class="col-12  mb-4 p-0">
                                <button type="submit" class="btn btn-primary">Purchase<span class="fas fa-arrow-right ps-2"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>