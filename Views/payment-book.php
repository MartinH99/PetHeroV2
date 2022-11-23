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
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-4">
                <div class="row m-0">
                    <div class="col-12 px-4">
                        <div class="d-flex align-items-end mt-4 mb-2">
                            <p class="h4 m-0"><span class="pe-1">ZAZ</span><span class="pe-1">966</span><span
                                    class="pe-1">B</span></p>
                            <P class="ps-3 textmuted">1L</P>
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
                            <p class="fs-14 fw-bold">-<span class="fas fa-dollar-sign px-1"></span>(50%) xxxx</p>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Total</p>
                            <div class="d-flex align-text-top ">
                                <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span><span class="h4">xxxxx</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0">
                        <div class="row bg-light m-0">
                            <div class="col-12 px-4 my-4">
                                <p class="fw-bold">Payment detail</p>
                            </div>
                            <div class="col-12 px-4">
                                <div class="d-flex  mb-4">
                                    <span class="">
                                        <p class="text-muted">Card number</p>
                                        <input class="form-control" type="text" value="4485 6888 2359 1498"
                                            placeholder="1234 5678 9012 3456">
                                    </span>
                                    <div class=" w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">Expires</p>
                                        <input class="form-control2" type="text" value="01/2020" placeholder="MM/YYYY">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <span class="me-5">
                                        <p class="text-muted">Cardholder name</p>
                                        <input class="form-control" type="text" value="Jorge Equis"
                                            placeholder="Name">
                                    </span>
                                    <div class="w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">CVC</p>
                                        <input class="form-control3" type="text" value="630" placeholder="XXX">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12  mb-4 p-0">
                                <div class="btn btn-primary">Purchase<span class="fas fa-arrow-right ps-2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>