<?php
include('header.php');
include('nav-bar-owner.php');
?>

<div class="container h-100">
    <h1 class="h1 dark text-center">ADD PET</h1>
    <div class="row h-100 border border-primary mt-5  ml-5  d-flex align-items-center justify-content-center">
        <div class="col-10 col-md-8 col-lg-6 mt-5">
            <form action="<?php echo FRONT_ROOT . "Pet/Add" ?>" method="post">
                <div class="form-outline ">
                    <label class="form-label" for="Name">Name</label>
                    <input type="text" id="Name" name="name" class="form-control" />
                </div>

                <div class="form-outline">
                    <label class="form-label" for="Breed">Breed</label>
                    <input type="text" id="Race" class="form-control" name="breed" />
                </div>

                <div id="sizePet" class="mt-4">
                    <h5>Size :</h5>
                    <div class="form-check">
                        <label class="form-check-label" for="sma"> Small </label>
                        <input class="form-check-input" type="radio" name="size" id="sma" value="small" />
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="med"> Medium </label>
                        <input class="form-check-input" type="radio" name="size" id="med" value="medium" />
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="lar"> Large </label>
                        <input class="form-check-input" type="radio" name="size" id="lar" value="large" />

                    </div>
                </div>

                <div class="form-outline mt-3">
                <label for="AnimalType">Choose type:</label>
                <select name="animalType" id="AnimalType">
                    <option value="cat">Cat</option>
                    <option value="dog">Dog</option>
                </select>
                </div>


                <div class="mt-4 d-flex justify-content-center mb-5">
                <button class="btn btn-primary" type="submit">Agregar mascota</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<?php
include('footer.php');
?>