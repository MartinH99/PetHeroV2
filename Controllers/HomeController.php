<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO; //Usamos USER DAO || OWNERDAO || KEEPERDAO?
    use DAObdd\KeeperDAO as KeeperDAO;

    class HomeController
    {
        private $keeperDAO;

        function __construct()
        {
            $this->keeperDAO = new KeeperDAO();  
        }
        public function index($message = "")
        {
            // require_once(VIEWS_PATH."validate-session-keep.php");
            // require_once(VIEWS_PATH."validate-session-own.php");
            echo $message;
            require_once(VIEWS_PATH."navbar-home.php");
            $keeperList = $this->keeperDAO->getAll();
            require_once(VIEWS_PATH."main-home.php");
            
        }

        public function ShowLogView()
        {
            require_once(VIEWS_PATH."navbar-home.php");
            require_once(VIEWS_PATH."login.php");
        }

        public function ShowRegisterView()
        {
            require_once(VIEWS_PATH."signup.php");
        }

        public function ShowRegisterPetView()
        {
            require_once(VIEWS_PATH."add-pet.php");
        }
        
        public function TestView()
        {
            require_once(VIEWS_PATH."test.php");
        }
        public function Logout()
        {
            session_destroy();

            $this->Index();
        }
    }
?>