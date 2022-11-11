<?php

    namespace Controllers;

    use DAObdd\PetDAO as PetDAO;
    use Models\Pet as Pet;
    use Models\Cat as Cat;
    use Models\Dog as Dog;

    class PetController{

        private $petDAO; // No se si agregar KeeperDAO/OwnerDAO creo que no

        function __construct()
        {
            $this->petDAO = new PetDAO();
        }


        public function ShowListPetsView()
        {
            require_once(VIEWS_PATH."validate-session-own.php");
            $petList = $this->petDAO->getAll();
            require_once(VIEWS_PATH."pet-list.php");
        }

        public function ShowRegisterPetView()
        {
            require_once(VIEWS_PATH."add-pet.php");
        }


        public function ShowListPetsbyOwnView()
        {
            require_once(VIEWS_PATH."validate-session-own.php");
            
            $arraySession = array();
            $arraySession = $_SESSION["userLogged"];
            $id2 = $arraySession->getId();
            $petListId = $this->petDAO->getPetsByOwnerId($id2);
            require_once(VIEWS_PATH."pet-list-byid.php");
        }

        
        
        public function Add($name, $size,$breed,$animalType) ///Aca no tomo el id de la mascota porque se hace automatico al ingresar al DAO 
        {///Pueden pasar esta func a los otros controllers /**Consultar como la funcion recibe estos parametros del form relacionado al Router/Request  */
            echo "ANIMALTYPE";var_dump($animalType);
            if(strcmp($animalType,"cat") ==0) //En este caso al ser perro/gato alcanza,supongo que si se agranda se podria concatenar variables o un switch
            {
                $pet = new Cat();
            }else if(strcmp($animalType,"dog") ==0){
                $pet = new Dog();
            }
            
            $pet->setName($name);
            
            $pet->setBreed($breed); //Con breed se podria llegar a hacer lo de size en cuanto a idBreed directo

            $user = $_SESSION["userLogged"];
            $pet->setOwnerId($user->getId()); //La idea seria que levante directamente el id de la sesion...
            
            switch($size)
            {
                case 'small':
                    $pet->setSize(1);
                    break;
                case 'medium':
                    $pet->setSize(2);
                    break;
                case 'large':
                    $pet->setSize(3);
                    break;

                default:
                    $pet->setAnimalType(0);
            }

            switch($animalType)
            {
                case 'dog':
                    $pet->setAnimalType(1);
                    break;
                case 'cat':
                    $pet->setAnimalType(2);
                    break;

                default: 
                    $pet->setAnimalType(0);
            }
            echo "PET";var_dump($pet);
            $this->petDAO->Add($pet);
            

            $this->ShowRegisterPetView(); //Redirecciona de nuevo al add por si tenes mas mascotas
        }

       

        public function Remove($id)
        {
            
            $this->petDAO->remove($id);

            $this->ShowListPetsView(); //Pendiente
        }


        

    }

?>