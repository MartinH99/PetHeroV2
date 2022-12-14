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

        public function getCurrentDate()
        {
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $currentDate = date("Y-m-d");
            return $currentDate;
        }


        public function Add($firstname,$lastname,$username,$password,$email,$address,$telephone,$cuil,$availStart,$availEnd,$price,$typeKeep)
        {

            $currentDate = $this->getCurrentDate();
            try{
            
            if(!empty($firstname))
            {
                if(!empty($lastname))
                {
                    if(!empty($address))
                    {
                        if(!empty($username))
                        {
                            if($this->validateUser($username))
                            {
                                if(!empty($password))
                                {
                                    if(strlen($password) >= 6)
                                    {
                                        if(!empty($typeKeep))
                                        {
                                            if(!empty($email))
                                            {
                                                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                                {
                                                    if($this->validateEmail($email))
                                                    {
                                                        if(!empty($cuil))
                                                        {
                                                            if(strlen($cuil) == 11)
                                                            {
                                                                if($this->validateCuil($cuil))
                                                                {
                                                                   if(!empty($availStart))
                                                                   {
                                                                        if($availStart >= $currentDate)
                                                                        {
                                                                            if(!empty($availEnd))
                                                                            {
                                                                                if($availEnd >= $availStart)
                                                                                {
                                                                                    if(strlen($telephone) >= 9)
                                                                                    {
                                                                                        if(!empty($price))
                                                                                        {
                                                                                            $keeper = new Keeper();
                                                                                            switch($typeKeep)
                                                                                            {
                                                                                                case 'small':
                                                                                                    $keeper->setTypeKeep(1);
                                                                                                    break;
                                                                                                case 'medium':
                                                                                                    $keeper->setTypeKeep(2);
                                                                                                    break;
                                                                                                case 'large':
                                                                                                    $keeper->setTypeKeep(3);
                                                                                                    break;
                                                                                                default:
                                                                                                    $keeper->setTypeKeep(0);
                                                                                            }
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
                                                                                            require_once(VIEWS_PATH."login-keep.php");
                                                                                        }else
                                                                                        {
  
                                                                                            throw new Exception("The field '<b>Price</b>' cannot be empty.");
                                                                                        }
                                                                                    }else
                                                                                    {
   
                                                                                        throw new Exception("The telephone must have at least 9 numbers.");
                                                                                    }
                                                                                }else
                                                                                {
     
                                                                                    throw new Exception("'<b>End date</b>' must be greater than '<b>Start date</b>'.");
                                                                                }
                                                                            }else
                                                                            {
       
                                                                                throw new Exception("The field '<b>End date</b>' cannot be empty.");
                                                                            }
                                                                        }else
                                                                        {

                                                                            throw new Exception("'<b>Start date</b>' must be equal or greater than current date.");
                                                                        }
                                                                   }else
                                                                   {

                                                                        throw new Exception("The field '<b>Start date</b>' cannot be empty.");
                                                                   }
                                                                }else
                                                                {
    
                                                                    throw new Exception("The CUIL is already registered.");
                                                                }
                                                            }else
                                                            {

                                                                throw new Exception("The CUIL you entered is not valid.");
                                                            }
                                                        }else
                                                        {
 
                                                            throw new Exception("The field '<b>CUIL</b>' cannot be empty.");
                                                        }
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

                                                throw new Exception("The field '<b>Email</b>' cannot be empty.");
                                            }
                                        }else
                                        {
    
                                            throw new Exception("You must choose a size.");
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

                        throw new Exception("The field '<b>Address</b>' cannot be empty.");
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
                 $message = $e->getMessage();
                 require_once(VIEWS_PATH . "keeper-signup.php");
            } 
        }


        
        public function validateCuil($cuil)
        {
            try {

                $flag = true;

                $keeperCuil = $this->keeperDAO->searchKeeperbyCuil($cuil); //si devuelve false es porque no lo encontr??

                if($keeperCuil != false)
                {
                    $flag = false; //si flag es false es porque ya existe
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

                $this->errorLogin("The password you entered is incorrect.");
            }
        }else
        {
            $this->errorLogin("No such keeper with that username.");
        }
    }

    }
