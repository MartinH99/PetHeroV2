<nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-5">
      <div class="container">
        <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav d-flex justify-content-evenly w-100 p-1">
            <li
              class="nav-item p-1 bg-dark border-end w-50 d-flex justify-content-center"
            >
              <a
                class="nav-link active"
                aria-current="page"
                href="<?php echo FRONT_ROOT."Home/index"?>"
                >Home</a
              >
            </li>
            <li
              class="nav-item p-1 bg-dark border-end w-50 d-flex justify-content-center"
            >
              <a class="nav-link" href="#"
                >Keepers</a
              >
            </li>
            <li
              class="nav-item p-1 bg-dark border-end w-50 d-flex justify-content-center"
            >
              <a class="nav-link" href="<?php echo FRONT_ROOT."Pet/ShowListPetsView"?>"> Pets</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>