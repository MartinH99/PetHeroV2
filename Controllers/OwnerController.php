<?php

    namespace Controllers;
    
    use DAObdd\OwnerDAO as OwnerDAO;
    use Models\Owner as Owner;
    use Controllers\HomeController as HomeController;
    use \Exception;
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
            try{

                if(!empty($name))
                {
                    if(!empty($lastname))
                    {
                        if(!empty($dni))
                        {
                            if(strlen($dni)==8)
                            {
                                if($this->validateDni($dni))
                                {
                                    if(!empty($address))
                                    {
                                        if(strlen($telephone) >= 9)
                                        {
                                            if(!empty($username))
                                            {
                                                if($this->validateUser($username))
                                                {
                                                    if(!empty($password))
                                                    {
                                                        if(strlen($password) >=6)
                                                        {
                                                            if(!empty($email))
                                                            {
                                                                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                                                {
                                            
                                                                    if($this->validateEmail($email))
                                                                    {
                                                                        $owner = new Owner();
                                                                        $owner->setUsername($username);
                                                                        $owner->setPassword($password);
                                                                        $owner->setEmail($email);
                                                                        $owner->setFirstname($name);
                                                                        $owner->setLastname($lastname);
                                                                        $owner->setAddress($address);
                                                                        $owner->setTelephone($telephone);
                                                                        $owner->setDni($dni);
                                                                        $this->ownerDAO->Add($owner);
                                                                        require_once(VIEWS_PATH."login-own.php");
                                                                       // $this->indexOwner("Owner successfully registered!"); // si descomento esto se rompe
                                                                    }else
                                                                    {
                                                                        throw new Exception("The email is already registered.");
                                                                    }
                                                                }else
                                                                {
                                                                    throw new Exception("The email you entered is not valid.");
                                                                }
                                            
                                                            }else
                                                            {
                                                                throw new Exception("The field '<b>email</b>' cannot be empty.");
                                                            }
                                    
                                                        }else
                                                        {

                                                            throw new Exception("The password must be at least 6 characters long.");
                                                        }
                                    
                                                    }else
                                                    {

                                                        throw new Exception("The field '<b>Password</b>' cannot be empty.");
                                                    }
                                                }else
                                                {

                                                    throw new Exception("The username is not available.");
                                                }
                                            }else
                                            {

                                                throw new Exception("The field '<b>Username</b>' cannot be empty.");
                                            }
                                        }else
                                        {

                                            throw new Exception("The telephone must have at least 9 numbers.");
                                        }
                                    }else
                                    {

                                        throw new Exception("he field '<b>Address</b>' cannot be empty.");
                                    }
                                }else
                                {

                                    throw new Exception("The DNI is already registered.");
                                }
                            }else
                            {
                                throw new Exception("The DNI you entered is not valid.");
                            }
                        }else
                        {

                            throw new Exception("The field '<b>DNI</b>' cannot be empty.");
                        }
                    }else
                    {
                        throw new Exception("The field '<b>Last name</b>' cannot be empty.");
                    }
                }else
                {
                    throw new Exception("The field '<b>First name</b>' cannot be empty.");
                }


            }catch(Exception $e)
            {
                $e->getMessage();
                require_once(VIEWS_PATH . "owner-signup.php");
            } 

         }



         public function validateEmail($email)
        {
            try {

                $flag = true;

                $ownerEmail = $this->ownerDAO->searchOwnerbyEmail($email);

                if($ownerEmail != false)
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

                $ownerUser = $this->ownerDAO->searchOwner($username);

                if($ownerUser != false)
                {
                    $flag = false;
                }
                return $flag;
            }catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function validateDni($dni)
        {
            try {

                $flag = true;

                $ownerDni = $this->ownerDAO->searchOwnerbyDni($dni); //si devuelve false es porque no lo encontró

                if($ownerDni != false)
                {
                    $flag = false; //si flag es false es porque ya existe
                }
                return $flag;
            }catch(Exception $ex)
            {
                throw $ex;
            }
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


        public function errorLogin($message="")
        {
            require_once(VIEWS_PATH."login-own.php");
        }

        public function Login($username,$password)
        {
            
            $newDao =new OwnerDAO();
            //$owner = $this->ownerDAO->searchOwner($username);ASI NO 
            $owner = $newDao->searchOwner($username);
            if ($owner != false) {

                if ($owner->getPassword() === $password) {
                    $this->setSession($owner);

                    $this->indexOwner("");
                    return $owner;
                } else {

                    $this->errorLogin("The password you entered is incorrect.");
                }
            }else
            {
                $this->errorLogin("No such owner with that username.");
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