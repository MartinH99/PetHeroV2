
    
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="h1 text-dark" href="<?php echo FRONT_ROOT."Keeper/indexKeeper"?>"><i class="fa-solid fa-dog"></i>PetHero</a></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo FRONT_ROOT."Home/TestView"?>">Test <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo FRONT_ROOT."User/Logout"?>">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Mis reservas</a>
      </li>
      <li class="nav-item dropdown">
        <button class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Hello,<?php echo $_SESSION["userLogged"]->getUsername(); ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

      
    </ul>
    <!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
-->
  </div>
</nav>



