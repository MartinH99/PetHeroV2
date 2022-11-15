<?php

    namespace Controllers;

    use DAObdd\KeeperDAO as KeeperDAO;
    use Models\Keeper as Keeper;
    use Controllers\HomeController as HomeController;
use Exception;

    class KeeperController{
        private $keeperDAO;
        
        function __construct()
        {
            $this->keeperDAO = new KeeperDAO();
             //No estoy seguro si esto esta bien
        }

        public function indexKeeper($message = "")
        {
            require_once(VIEWS_PATH."validate-session-keep.php");
            require_once(VIEWS_PATH."nav-bar-keeper.php");
            $keeperList = $this->keeperDAO->getAll();
            require_once(VIEWS_PATH."main-home.php");
            
        }

        public function ShowListKeepersView()
        {
            require_once(VIEWS_PATH."validate-session-keep.php");
            $keeperList = $this->keeperDAO->getAll(); //$keeperlist llega al keeper-list por el require entonces ahi lo podes iterar con el foreach (linea 21)
            
            require_once(VIEWS_PATH."keeper-list.php");
        }
        
        public function showSignUpKeeper($message = "")
        {
            
            require_once(VIEWS_PATH."keeper-signup.php");
        }


        public function setSession($user)
        {
            $_SESSION["userLogged"] = $user;
        }


        public function Add($firstname,$lastname,$username,$password,$email,$address,$telephone,$cuil,$availStart,$availEnd,$price)
        {

            try{
                $keeper = new Keeper();
            
            if($this->validateUser($username) == true)
            {
                $keeper->setUsername($username);
            }else
            {
                $usernameMessage = "This username is not available.";
                require_once(VIEWS_PATH."keeper-signup.php");
            }
            $keeper->setPassword($password);

            if($this->validateEmail($email) == true)
            {
                $keeper->setEmail($email);
            }else
            {
                $emailMessage = "This email is already registered.";
                require_once(VIEWS_PATH."keeper-signup.php");
            }

            if($firstname != null)
            {
                $keeper->setFirstName($firstname);
            }else
            {
                $nameMessage = "This field cannot be empty.";
                require_once(VIEWS_PATH."keeper-signup.php");
            }
            $keeper->setLastname($lastname);
            $keeper->setAddress($address);
            $keeper->setTelephone($telephone);
            if($this->validateCuil($cuil) == true)
            {
                $keeper->setCuil($cuil);
            }else
            {
                $cuilMessage = "This CUIL is already registered.";
                require_once(VIEWS_PATH."keeper-signup.php");
            }
            $keeper->setAvailStart($availStart); 
            $keeper->setAvailEnd($availEnd); 
            $keeper->setPrice($price);
            
            session_destroy();
            $this->keeperDAO->Add($keeper);
            }catch(Exception $ex)
            {
                require_once(VIEWS_PATH."keeper-signup.php");
                
            }
           
            
            //require_once(VIEWS_PATH."login-keep.php");
        }






        
        public function validateCuil($cuil)
        {
            try {

                $flag = true;

                $keeperCuil = $this->keeperDAO->searchKeeperbyCuil($cuil);

                if($keeperCuil != false)
                {
                    $flag = false;
                }
                return $flag;
            }catch(Exception $ex)
            {
                throw $ex;
            }
        }
        
        public function validateEmail($email)
        {
            try {

                $flag = true;

                $keeperEmail = $this->keeperDAO->searchKeeperbyEmail($email);

                if($keeperEmail != false)
                {
                    $flag = false;
                }
                return $flag;
            }catch(Exception $ex)
            {
                throw $ex;
            }
        }
        
        public function validateUser($username)
        {
            try {

                $flag = true;

                $keeperUser = $this->keeperDAO->searchKeeper($username);

                if($keeperUser != false)
                {
                    $flag = false;
                }
                return $flag;
            }catch(Exception $ex)
            {
                throw $ex;
            }
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


        public function errorLogin($message="")
        {
            require_once(VIEWS_PATH."login-keep.php");
        }

    public function Login($username, $password)
    {
        
        $newDao = new keeperDAO();
        //$keeper = $this->keeperDAO->searchkeeper($username);ASI NO 
        $keeper = $newDao->searchKeeper($username);
        $message = "";
        if ($keeper) {

            if ($keeper->getPassword() === $password) {
                $this->setSession($keeper);
                
                $this->indexKeeper("Bienvenido,logeado");
                return $keeper;
            } else {

                $this->errorLogin("Password error!");
            }
        }else
        {
            $this->errorLogin("Not such owner with that username!");
        }
    }

    }

?>