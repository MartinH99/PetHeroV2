<?php

    namespace DAObdd;

    use \Exception as Exception;
    use Models\Pet as Pet;
    use DAObdd\Connection as Connection;

    class PetDAO{ 

        private $connection;
        private $tablename = "pets";

        public function Add(Pet $pet)
        {
            
            try
            {
                
                $query = "INSERT INTO .$this->tablename (petId,name,sizeId,breed,ownerId,animalTypeId)
                 VALUES (:petId, :name, :sizeId,:breed,:ownerId,:animalType);";
                
                
                $parameters["petId"] = $this->setNextIdPet(); //$pet->getId();
                $parameters["name"] = $pet->getName();
                $parameters["sizeId"] = $pet->getSize();
                $parameters["breed"] = $pet->getBreed();
                $parameters["ownerId"] = $pet->getOwnerId();
                $parameters["animalType"] = $pet->getAnimalType();
               

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }


        public function getAll()
        {
            try
            {
                $petList = array(); //Inicializo un array de pets

                $query = "SELECT * FROM ".$this->tablename; //Traigo todo de pets

                $this->connection = Connection::GetInstance();

                $resultadoQuery = $this->connection->Execute($query);
                
                foreach ($resultadoQuery as $row) //Voy pasando a un objeto pet lo que recupera de la BD en un array asociativo por filas
                {                
                    //Revisar si precisa del methodPass
                    $pet = new Pet();
                    $pet->setId($row["petId"]);
                    $pet->setName($row["name"]);
                    $pet->setSize($row["sizeId"]);
                    $pet->setBreed($row["breed"]);
                    $pet->setOwnerId($row["ownerId"]);
                    $pet->setAnimalType($row["animalTypeId"]);
                  

                    var_dump($pet);

                    array_push($petList, $pet);
                }

                return $petList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function remove($petId)
        {
            try
            {
                
                $query = "DELETE FROM $this->tablename WHERE petId= :petId;";

                $this->connection = Connection::GetInstance();
                $parameters["petId"] = $petId;
                $resultado = $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(Exception $ex)
            {
                throw $ex;
            }
        }


        public function getPetsByOwnerId($ownerId)
        {
            try{
                $petListId = array();
                $query = "SELECT * FROM $this->tablename WHERE ownerId=:ownerId;";

                $this->connection = Connection::GetInstance();

                $parameters["ownerId"] = $ownerId;

                $resultQuery = $this->connection->Execute($query, $parameters);

                foreach ($resultQuery as $row) //Voy pasando a un objeto pet lo que recupera de la BD en un array asociativo por filas
                {                
                    //Revisar si precisa del methodPass
                    $pet = new Pet();
                    $pet->setId($row["petId"]);
                    $pet->setName($row["name"]);
                    $pet->setSize($row["sizeId"]);
                    $pet->setBreed($row["breed"]);
                    $pet->setOwnerId($row["ownerId"]);
                    $pet->setAnimalType($row["animalTypeId"]);
                    
                    array_push($petListId, $pet);
                }

                return $petListId;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }



        public function setNextIdPet()
        {

            try
                {
                    $query = "SELECT petId FROM $this->tablename ORDER BY petId DESC LIMIT 0, 1 ;";

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query);

            

            $newResult = reset($result);//Hago esto xq result devuelve un arreglo que en la 1°pos tiene otro arreglo asoc donde id esta en $x["ownerId"]

            $lastId = $newResult["petId"];

            

            return (int)$lastId=(int)$lastId +1;

            }catch(Exception $ex)
            {
            return $ex;
            }

        }

        public function getPetName($idPet)
        {

            $query = "SELECT `name` FROM $this->tablename WHERE petId = :petId;";
            $parameters["petId"] = $idPet;
            try
            {
                
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query,$parameters); //Tendria que devolver el array asociativo...
                $newResult  = reset($result);
                 //Si devuelve 1 es xq el Execute retorno alguna fila y sino error
                 return $newResult;
            }catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function getPetById($idPet)
        {

            $query = "SELECT * FROM $this->tablename WHERE petId = :petId;";
            $parameters["petId"] = $idPet;
            try
            {

                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query,$parameters); //Tendria que devolver el array asociativo...
                $newResult  = reset($result);


                echo "NEWRESULT;";
                var_dump($newResult);


                 //Si devuelve 1 es xq el Execute retorno alguna fila y sino error
            }catch(Exception $ex)
            {
                throw $ex;
            }


            if(!empty($newResult))
            {

                return $this->mapping2Pet($newResult);
                //Result viene en un array asocitativo,pero estamos trabajado con POO...
            }else 
            {
                return false;
            }
        }

        public function mapping2Pet($value) //No pude aplicar el mapping del video de Lab xq crasheaba siempre ya sea por falta de parametros,error en array|object o el array asociativa ya se generaba raro 
        {
            $value = is_array($value) ? $value : []; //Si es arreglo sigue con su valor sino se hace uno vacio

                $pet = new Pet();
                $pet->setId($value["petId"]);
                $pet->setName($value["name"]);
                $pet->setSize($value["sizeId"]);
                $pet->setAnimalType($value["animalTypeId"]);
                $pet->setOwnerId($value["ownerId"]);
                $pet->setBreed($value["breed"]);
                $pet->setImage(0);
                $pet->setVaccines(0);
                $pet->setVideo(0);
                $pet->setDescrip("");

                return $pet;

        }
        

    }
