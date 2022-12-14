<?php

    namespace Controllers;

    use DAObdd\OwnerDAO as OwnerDAO;
    use DAObdd\KeeperDAO as KeeperDAO;
    use Models\Keeper as Keeper;
    use Models\Owner as Owner;
    use Controllers\KeeperController as KeeperController;
    use Controllers\OwnerController as OwnerController;

    class UserController {

        private $OwnerDAO;
        private $KeeperDAO;

        function __construct()
        {
            $this->OwnerDAO = new OwnerDAO();
            $this->KeeperDAO = new KeeperDAO();

        }

        public function index($message = "")
        {
            require_once(VIEWS_PATH."navbar-home.php");
            $keeperList = $this->KeeperDAO->getAll();
            require_once(VIEWS_PATH."main-home.php");
        }

        public function filterDateKeep($initDate,$endDate)
        {
            require_once(VIEWS_PATH."navbar-home.php");
            $keeperListNew = $this->KeeperDAO->filterKeepersByDate($initDate,$endDate);
            require_once(VIEWS_PATH."main-home-by.php");
        }

        public function filterDateKeep_Size($initDate,$endDate,$size)
        {
            require_once(VIEWS_PATH."navbar-home.php");
            $keeperListNew = $this->KeeperDAO->filterKeeperByDate_Size($initDate,$endDate,$size);
            require_once(VIEWS_PATH."main-home-by.php");
        }

        public function typeSignup($userType)
        {
            if(strcmp($userType,"owner") == 0)
            {
                $message = "";
                require_once(VIEWS_PATH."owner-signup.php");
                
                
            }else if(strcmp($userType,"keeper") == 0)
            {
                $message="";
                require_once(VIEWS_PATH."keeper-signup.php");
                
            }
        }

        public function typeLogin($userType)
        {
            if(strcmp($userType,"owner") == 0)
            {
                
                require_once(VIEWS_PATH."login-own.php");
                
            }else if(strcmp($userType,"keeper") == 0)
            {
                require_once(VIEWS_PATH."login-keep.php");
                
            }
        }

        public function Logout()
        {
            session_destroy();

            $this->Index();
        }
    }

?>