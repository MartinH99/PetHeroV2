<?php
include("header.php");
include("nav-bar-keeper.php");
include("inner-nav.php");
?>

<form action="<?php echo FRONT_ROOT . "Booking/getBookingsByStatus" ?>" method="post">

    
    <div class="d-flex justify-content-center align-self-center p-5 m-5">
        
        <div class="container-fluid bg-light d-flex">
        
        <select class="form-select" name="status" aria-label="Default select example">
            <option selected value="rejected">REJECTED</option>
            <option value="pending">PENDING</option>
            <option value="accepted">ACCEPTED</option>
            <option value="confirmed">CONFIRMED</option>
            <option value="finished">FINISHED</option>
        </select>
        <button type="sumbit" class="btn btn-outline btn-small p-1 mb-1 mt-2">
            Filtrar
        </button>
        </div>
        </div>
        <div class="d-flex flex-row-reverse p-2 m-2">
            <a href="<?php echo FRONT_ROOT . "Booking/ShowBooksPendings" ?>" class="btn btn-outline btn-lg p-1 m-3 bg-danger text-light">Pendings</a><!--Lista de pendientes confirm/rejected pendiente -->
            <a href="<?php echo FRONT_ROOT . "Booking/ShowBooksByConfirmed"?>" class="btn btn-outline btn-lg p-1 m-3 bg-success text-light">Accepted</a><!--Lista de confirmados que podes dar de baja -->
        </div>
        <div class="row card-group w-60 mt-5 mb-4 ms-8 p-5  ">
        <h1 class="h1">My Bookings</h1>
            <?php if(empty($arrayBooking))
        {
            echo "Accepted's list is empty!";
        }else
        {
            foreach ($arrayBooking as $booking) {    
            ?>
                <div class="col-md-4">
                    <div class="card bg-light m-5 border-start ">
                        <img src="https://i.cbc.ca/1.5077459.1553886010!/fileImage/httpImage/pets.jpg" class="card-img-top mt-3" alt="destacados" />
                        <div class="card-body">
                            <h5 class="card-title">Pet's name : <?php echo $petObj->getName(); ?></h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Size :<?php echo $petObj->getSize2(); ?></li>
                                <li class="list-group-item">Breed :<?php echo $petObj->getBreed(); ?></li>

                            </ul>
                        </div>
                        <h5 class="card-title">User owner :<?php echo $ownerObj->getUsername(); ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">User dni :<?php echo $ownerObj->getDni(); ?></li>
                            <li class="list-group-item"></li>
                        </ul>
                        <h5 class="card-title">Codebook :<?php echo $booking["codeBook"]; ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Init date :<?php echo $booking["initDate"]; ?></li>
                            <li class="list-group-item">End date :<?php echo $booking["endDate"]; ?></li>
                            <li class="list-group-item">Status :<?php echo $booking["status"]; ?> </li>
                        </ul>
                        <!-- <div class="card-body">
                            <a href="<?php echo FRONT_ROOT . "Booking/ShowChangeStatus" ?>" class="card-link">Edit Status</a>
                            
                            <a href="#" class="card-link">Patea a y</a>
                            
                        </div> -->
                    </div>
                    <!-- <button type="sumbit" name="id" class="btn btn-outline btn-small p-1 mb-1 mt-2" value="">
                        Solicitar
                    </button> -->

                </div>
            <?php 
            }
        }
            ?>
        </div>
   
</form>
<?php
include("footer.php");
?>