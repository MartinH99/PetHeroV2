<?php

    namespace Controllers;

    use DAObdd\KeeperDAO as KeeperDAO;
    use Models\Keeper as Keeper;
    use Controllers\HomeController as HomeController;
    class KeeperController{
        private $keeperDAO;

        function __construct()
        {
            $this->keeperDAO = new KeeperDAO();
            $this->homeController = new HomeController(); //No estoy seguro si esto esta bien
        }

        public function indexKeeper($message = "")
        {
            require_once(VIEWS_PATH."validate-session-keep.php");
            require_once(VIEWS_PATH."nav-bar-keeper.php");
            require_once(VIEWS_PATH."main-home.php");
            
        }

        public function ShowListKeepersView()
        {
            require_once(VIEWS_PATH."validate-session-keep.php");
            $keeperList = $this->keeperDAO->getAll(); //$keeperlist llega al keeper-list por el require entonces ahi lo podes iterar con el foreach (linea 21)
            
            require_once(VIEWS_PATH."keeper-list.php");
        }


        public function setSession($user)
        {
            $_SESSION["userLogged"] = $user;
        }


        public function Add($firstname,$lastname,$username,$password,$email,$address,$telephone,$cuil,$availStart,$availEnd,$price)
        {

            
            $keeper = new Keeper();

            $keeper->setUsername($username);
            $keeper->setPassword($password);
            $keeper->setEmail($email);
            $keeper->setFirstName($firstname);
            $keeper->setLastname($lastname);
            $keeper->setAddress($address);
            $keeper->setTelephone($telephone);
            $keeper->setCuil($cuil);
            $keeper->setAvailStart($availStart); 
            $keeper->setAvailEnd($availEnd); 
            $keeper->setPrice($price);
            

            $this->keeperDAO->Add($keeper);
            session_destroy();
            require_once(VIEWS_PATH."login-keep.php");
        }

        public function remove($id)
        {
            
            $this->keeperDAO->remove($id);

            $this->ShowListKeepersView(); //Pendiente
        }

        public function Modify()
        {
            require_once(VIEWS_PATH."validate-session-keep.php");
            $keeperLogeado = $_SESSION["loggedUser"];
            require_once(VIEWS_PATH."keeper-profile.php");
        }


    public function Login($username, $password)
    {
        
        $newDao = new keeperDAO();
        //$keeper = $this->keeperDAO->searchkeeper($username);ASI NO 
        $keeper = $newDao->searchKeeper($username);
        
        if ($keeper) {

            if ($keeper->getPassword() === $password) {
                $this->setSession($keeper);
                
                $this->indexKeeper("Bienvenido,logeado");
                return $keeper;
            } else {

                $this->homeController->index("Rechazado");
                return false;
            }
        }
    }

    }

?>