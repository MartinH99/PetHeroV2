<?php
include("header.php");
include("nav-bar-keeper.php");
include("inner-nav.php");
?>

<form action="<?php echo FRONT_ROOT . "Booking/getBookingsByStatus "?>" method="post">
<div class="d-flex justify-content-center align-self-center p-5 m-2">
                <select class="form-select" name="status" aria-label="Default select example">
                    <option selected>Estado</option>
                    <option value="pending">PENDING</option>
                    <option value="confirmed">CONFIRMED</option>
                    <option value="finished">FINISHED</option>
                </select>
                <button type="sumbit"  class="btn btn-outline btn-small p-1 mb-1 mt-2">
                        Filtrar
                    </button>
            </div>
    <div class="container-fluid bg-light d-flex justify-content-center ">
        <div class="row card-group w-60 mt-5 mb-4 ms-8 p-5 ">
            <?php $i = 0;
            while ($i < count($bookingListByKeepStatus)) {
                $booking = $bookingListByKeepStatus[$i];
            ?>
                <div class="col-md-4">
                    <div class="card bg-light m-5 border-start ">
                        <img src="https://i.cbc.ca/1.5077459.1553886010!/fileImage/httpImage/pets.jpg" class="card-img-top mt-3" alt="destacados" />
                        <div class="card-body">
                            <h5 class="card-title">Pet's name : <?php echo $booking["name"]; ?></h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Size :<?php echo $booking["size"]; ?></li>
                                <li class="list-group-item">Breed :<?php echo $booking["breed"]; ?></li>

                            </ul>
                        </div>
                        <h5 class="card-title">User owner :<?php echo $booking["username"]; ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">User dni :<?php echo $booking["dni"]; ?></li>
                            <li class="list-group-item"></li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                        <h5 class="card-title">Codebook :<?php echo $booking["codebook"]; ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Init date :<?php echo $booking["initDate"]; ?></li>
                            <li class="list-group-item">End date :<?php echo $booking["endDate"]; ?></li>
                            <li class="list-group-item">Status :<?php echo $booking["status"]; ?> </li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Patea a x</a>
                            <!--Algun lugar q sirva como info del user o de la pet -->
                            <a href="#" class="card-link">Patea a y</a>
                            <!--Algun lugar q sirva como info del user o de la pet -->
                        </div>
                    </div>
                    <button type="sumbit" name="id" class="btn btn-outline btn-small p-1 mb-1 mt-2" value="<?php echo $keeper->getId(); ?>">
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