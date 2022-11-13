<?php

namespace DAObdd;

use \Exception as Exception;
use Models\Owner as Owner;
use DAObdd\Connection as Connection;

class OwnerDAO
{
    private $connection;
    private $tablename = "owners";

    private function GetNextId() //El tema es como hacer que no choquen con la id de otra tabla ¿¿Agregar U o K al principio?? 
    {
        // select id =(isnull( max(id), 0)  + 1 ) from owners  

        // //crear statement
        // $stmt = $this->conexion->prepare('select id =(isnull( max(id), 0)  + 1 ) from owners');
        // $stmt->execute();
        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // // aqui obtienes el id a guardar
        // $idNew = $result->id;
    }

    public function Add(Owner $owner)
        {
            
            try
            {
                $query = "INSERT INTO ".$this->tablename." (ownerId,firstname, lastname,dni,username,password,email,address,telephone)
                 VALUES (:ownerId, :firstname, :lastname,:dni,:username,:password,:email,:address,:telephone);";
                

                $parameters["ownerId"] = $this->setNextIdOwn(); //$owner->getId();
                $parameters["firstname"] = $owner->getFirstName();
                $parameters["lastname"] = $owner->getLastName();
                $parameters["dni"] = $owner->getDni();
                $parameters["username"] = $owner->getUsername();
                $parameters["password"] = $owner->getPassword();
                //$parameters["methodpass"] = "md5";
                $parameters["email"] = $owner->getEmail();
                $parameters["address"] = $owner->getAddress();
                $parameters["telephone"] = $owner->getTelephone();

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
                $ownerList = array(); //Inicializo un array de owners

                $query = "SELECT * FROM ".$this->tablename; //Traigo todo de owners

                $this->connection = Connection::GetInstance();

                $resultadoQuery = $this->connection->Execute($query);
                
                foreach ($resultadoQuery as $row) //Voy pasando a un objeto owner lo que recupera de la BD en un array asociativo por filas
                {                
                    //Revisar si precisa del methodPass
                    $owner = new Owner();
                    $owner->setId($row["ownerId"]);
                    $owner->setFirstname($row["firstname"]);
                    $owner->setLastName($row["lastname"]);
                    $owner->setDni($row["dni"]);
                    $owner->setUsername($row["username"]);
                    $owner->setPassword($row["password"]);
                    $owner->setEmail($row["email"]);
                    $owner->setAddress($row["address"]);
                    $owner->setTelephone($row["telephone"]);

                    var_dump($owner);

                    array_push($ownerList, $owner);
                }

                return $ownerList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function remove($ownerId)
        {
            try
            {
                $query = "DELETE FROM $this->tablename WHERE ownerId= :ownerId;";

                $this->connection = Connection::GetInstance();
                $parameters["ownerId"] = $ownerId;
                $resultado = $this->connection->ExecuteNonQuery($query, $parameters);

                var_dump($resultado);
            }catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByUserName($username)
        {
            try
            {
                $query = "SELECT * FROM $this->tablename WHERE username LIKE %:username%;";

                $this->connection = Connection::GetInstance();
                $parameters["username"] = $username;
                $result = $this->connection->Execute($query, $parameters);

                
            }catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function searchOwner($username)
        {

            $query = "SELECT * FROM $this->tablename WHERE username = :username;";
            $parameters["username"] = $username;
            try
            {
                
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query,$parameters); //Tendria que devolver el array asociativo...
                $newResult  = reset($result);
                // echo "RESULTADO <pre>";var_dump($result);echo "</pre>";
                // echo "RESULTADO <pre>";var_dump($newResult);echo "</pre>";
                //  //Si devuelve 1 es xq el Execute retorno alguna fila y sino error
            }catch(Exception $ex)
            {
                die("Error : ".$ex->getMessage());
                throw $ex;
            }
            

            if(!empty($newResult))
            {
                
                return $this->mapping2($newResult);
                //Result viene en un array asocitativo,pero estamos trabajado con POO...
            }else 
            {
                return false;
            }
        }

        public function mapping2($value) //Como con callback se rompia lo hice mas 'rustico'
        {
            $value = is_array($value) ? $value : []; //Si es arreglo sigue con su valor sino se hace uno vacio  

                $owner = new Owner();
                $owner->setId($value["ownerId"]);
                $owner->setFirstname($value["firstname"]);
                $owner->setLastname($value["lastname"]);
                $owner->setUsername($value["username"]);
                $owner->setEmail($value["email"]);
                $owner->setPassword($value["password"]);
                $owner->setDni($value["dni"]);
                $owner->setAddress($value["address"]);
                $owner->setTelephone($value["telephone"]);

                return $owner;
            
        }

        // public function mapping($value) No me sirvió el ejemplo en yt
        // {
        //     $value = is_array($value) ? $value : []; //Si es arreglo sigue con su valor sino se hace uno vacio

        //     $resp = array_map(function($p){
        //         return new Owner ($p["ownerId"],$p["firstname"],$p["lastname"],$p["dni"],$p["username"],
        //         $p["password"],$p["email"],$p["address"] ,$p["telephone"]);
        //     },$value); //Recorre cada valor del array y opera sobre ese.
        //                 //Recibe una func anonima con un param que es el dato que va a ir leyendo del array

        //     return count($resp) > 1 ? $resp : $resp[0];
        // }

    

    public function setNextIdOwn()
    {

        try
        {
            $query = "SELECT ownerId FROM $this->tablename ORDER BY ownerId DESC LIMIT 0, 1 ;";

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query);

            

            $newResult = reset($result);//Hago esto xq result devuelve un arreglo que en la 1°pos tiene otro arreglo asoc donde id esta en $x["ownerId"]

            $lastId = $newResult["ownerId"];

            

            return (int)$lastId=(int)$lastId +1;


        }catch(Exception $ex)
        {
            return $ex;
        }
        
        

    }

    public function getUsernameOwner($idOwner)
        {

            $query = "SELECT username FROM $this->tablename WHERE ownerId = :ownerId;";
            $parameters["ownerId"] = $idOwner;
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


}

   
?>