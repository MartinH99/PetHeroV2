<?php

    namespace Controllers;
    
    use DAObdd\OwnerDAO as OwnerDAO;
    use Models\Owner as Owner;
    use Controllers\HomeController as HomeController;
    use DAObdd\KeeperDAO as KeeperDAO;

    class OwnerController{

        private $ownerDAO;
        private $homeController;
        private $keeperDAO;

        function __construct()
        {
            $this->ownerDAO = new OwnerDAO();
            $this->keeperDAO = new KeeperDAO();
            $this->homeController = new HomeController();
        }

        public function indexOwner($message = "")
        {
            require_once(VIEWS_PATH."validate-session-own.php");
            require_once(VIEWS_PATH."nav-bar-owner.php");
            $keeperList = $this->keeperDAO->getAll();
            require_once(VIEWS_PATH."main-home.php");
            
        }

        public function ShowListOwnersView()
        {
            require_once(VIEWS_PATH."validate-session-own.php");
            require_once(VIEWS_PATH."nav-bar-owner.php");
            $ownerList = $this->ownerDAO->getAll(); //Esto es el nuevo getAll con BD
            
            require_once(VIEWS_PATH."owner-list.php");
        }

         public function Add($username,$password,$email,$name,$lastname,$dni,$address,$telephone) //No se como gestionar el tema de los pass acá
         {
            $owner = new Owner();

            $owner->setUsername($username);
            $owner->setPassword($password);
            $owner->setEmail($email);
            $owner->setFirstName($name);
            $owner->setLastname($lastname);
            $owner->setDni($dni);
            $owner->setAddress($address);
            $owner->setTelephone($telephone);

            $this->ownerDAO->Add($owner);

            $this->indexOwner("Registrado Owner correctamente");
         }


         public function remove($id)
        {
            
            $this->ownerDAO->remove($id);

            $this->ShowListOwnersView(); //Pendiente
        }

        public function setSession($user)
        {
            $_SESSION["userLogged"] = $user;
        }

        public function getSession()
        {
            return $_SESSION["userLogged"]; 
        }




        public function Login($username,$password)
        {
            
            $newDao =new OwnerDAO();
            //$owner = $this->ownerDAO->searchOwner($username);ASI NO 
            $owner = $newDao->searchOwner($username);

            if ($owner) {

                if ($owner->getPassword() === $password) {
                    $this->setSession($owner);

                    $this->indexOwner("");
                    return $owner;
                } else {

                    $this->homeController->index("Rechazado");
                    return false;
                }
            }
        }



        public function showKeeperOwnView()
        {   
            require_once(VIEWS_PATH."validate-session-own.php");
            require_once(VIEWS_PATH."nav-bar-owner.php");
            
            require_once(VIEWS_PATH."main-home.php");
        }

        public function filterDateKeep($initDate,$endDate){

            require_once(VIEWS_PATH."validate-session-own.php");
            require_once(VIEWS_PATH."nav-bar-owner.php");
            $keeperListNew = $this->keeperDAO->filterKeepersByDate($initDate,$endDate);
            require_once(VIEWS_PATH."main-home-by.php");
            

        }


    }
?>