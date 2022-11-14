<?php include("navbar-home.php"); ?>
<div class="card-body mb-3">
    <div class="row g-0 d-flex align-items-center bg-dark text-white ">
        <div class="col-lg-4 d-none d-lg-flex">
            <img src="https://i.pinimg.com/originals/0a/19/55/0a1955fd5c4bd0bea8d4f6397dce80bd.jpg" alt="Trendy Pants and Shoes" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        </div>
        <div class="col-lg-8">
            <div class="card-body py-5 px-md-5">
                <div class="text-center mb-5">
                    <h1 class="h1">¡WELCOME,KEEPER!</h1>
                </div>
                <form form action="<?php echo FRONT_ROOT . "Keeper/Login" ?>" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4 ">
                        <input type="text" id="userName" class="form-control" name="username" placeholder="Username" />
                        <label class="form-label" for="userName">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="Password" class="form-control" name="password" placeholder="Password" />
                        <label class="form-label" for="Password">Password</label>
                    </div>
                    <p class="d-inline-block bg-light text-danger"><b><?php echo $message ?></b></p>
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                <label class="form-check-label" for="form2Example31"> Remember me </label>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                </form>

            </div>
        </div>
    </div>
</div>
</form>




</body>

</html>

<?php

include("footer.php");
?>