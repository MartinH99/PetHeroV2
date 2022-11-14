<?php

namespace DAObdd;

use DateInterval;
use Models\Keeper as Keeper;
use DAObdd\Connection as Connection;
use \Exception as Exception;

class KeeperDAO
{
    private $connection;
    private $tablename = "keepers";


    public function Add(Keeper $keeper)
        {
            
            try
            { //Recordar que interval tiene que ser una entidad propia
                $query = "INSERT INTO ".$this->tablename." (keeperId,firstname, lastname,username,password,email,address,telephone,cuil,availStart,availEnd,price,stars)
                 VALUES (:keeperId, :firstname, :lastname,:username,:password,:email,:address,:telephone,:cuil,:availStart,:availEnd,:price,:stars);";
                

                $parameters["keeperId"] = $this->setNextIdKeep(); //$owner->getId(); Aca estaria bueno lo de el nextId con lastInsertId + inicial Tabla K1/O1
                $parameters["firstname"] = $keeper->getFirstName();
                $parameters["lastname"] = $keeper->getLastName();
                $parameters["username"] = $keeper->getUsername();
                $parameters["password"] = $keeper->getPassword();
                //methodPass
                $parameters["email"] = $keeper->getEmail();
                $parameters["address"] = $keeper->getAddress();
                $parameters["telephone"] = $keeper->getTelephone();
                $parameters["cuil"] = $keeper->getCuil();
                $parameters["availStart"] = $keeper->getAvailStart();
                $parameters["availEnd"] = $keeper->getAvailEnd();
                //$parameters["interval"] = null; //Aca lo mejor seria getEnd - GetStart = interval y meterlo en su tabla devolviendo un id que se guarda acá (Podrias guardar el id o el valor d1)
                $parameters["price"] = $keeper->getPrice();
                $parameters["stars"] = 1;


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
                $keeperList = array(); //Inicializo un array de keepers

                $query = "SELECT * FROM ".$this->tablename; //Traigo todo de keepers

                $this->connection = Connection::GetInstance();

                $resultadoQuery = $this->connection->Execute($query);
                
                foreach ($resultadoQuery as $row) //Voy pasando a un objeto owner lo que recupera de la BD en un array asociativo por filas
                {                
                    //Revisar si precisa del methodPass / rta = nop
                    $keeper = new Keeper();
                    $keeper->setId($row["keeperId"]);
                    $keeper->setFirstname($row["firstname"]);
                    $keeper->setLastName($row["lastname"]);
                    $keeper->setUsername($row["username"]);
                    $keeper->setPassword($row["password"]);
                    $keeper->setEmail($row["email"]);
                    $keeper->setAddress($row["address"]);
                    $keeper->setTelephone($row["telephone"]);
                    $keeper->setCuil($row["cuil"]);
                    $keeper->setAvailStart($row["availStart"]);
                    $keeper->setAvailEnd($row["availEnd"]);
                    $keeper->setInterval(0);
                    $keeper->setPrice($row["price"]);
                    $keeper->setStars($row["stars"]);

                    

                    array_push($keeperList, $keeper);
                }

                return $keeperList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function remove($keeperId)
        {
            try
            {
                $query = "DELETE FROM $this->tablename WHERE keeperId= :keeperId;";

                $this->connection = Connection::GetInstance();

                $parameters["keeperId"] = $keeperId;

                $resultado = $this->connection->ExecuteNonQuery($query, $parameters);

                var_dump($resultado);
            }catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function searchKeeper($username)
        {

            $query = "SELECT * FROM $this->tablename WHERE username = :username;";
            $parameters["username"] = $username;
            try
            {
                
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query,$parameters); //Tendria que devolver el array asociativo...
                $newResult  = reset($result);
                 //Si devuelve 1 es xq el Execute retorno alguna fila y sino error
            }catch(Exception $ex)
            {
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


        public function searchKeeperById($idKeeper)
        {

            $query = "SELECT * FROM $this->tablename WHERE keeperId = :keeperId;";
            $parameters["keeperId"] = $idKeeper;
            try
            {
                
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query,$parameters); //Tendria que devolver el array asociativo...
                $newResult  = reset($result);
                 //Si devuelve 1 es xq el Execute retorno alguna fila y sino error
            }catch(Exception $ex)
            {
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


        public function mapping2($value) //No pude aplicar el mapping del video de Lab xq crasheaba siempre ya sea por falta de parametros,error en array|object o el array asociativa ya se generaba raro 
        {
            $value = is_array($value) ? $value : []; //Si es arreglo sigue con su valor sino se hace uno vacio  

                $keeper = new Keeper();
                $keeper->setId($value["keeperId"]);
                $keeper->setFirstname($value["firstname"]);
                $keeper->setLastname($value["lastname"]);
                $keeper->setUsername($value["username"]);
                $keeper->setEmail($value["email"]);
                $keeper->setPassword($value["password"]);
                $keeper->setCuil($value["cuil"]);
                $keeper->setAddress($value["address"]);
                $keeper->setTelephone($value["telephone"]);
                $keeper->setAvailStart($value["availStart"]);
                $keeper->setAvailEnd($value["availEnd"]);
                $keeper->setStars($value["stars"]);
                $keeper->setPrice($value["price"]);

                return $keeper;
            
        }

        public function setNextIdKeep()
    {

        try
        {
            $query = "SELECT keeperId FROM $this->tablename ORDER BY keeperId DESC LIMIT 0, 1 ;";

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query);

            

            $newResult = reset($result);//Hago esto xq result devuelve un arreglo que en la 1°pos tiene otro arreglo asoc donde id esta en $x["ownerId"]

            $lastId = $newResult["keeperId"];

            

            return (int)$lastId=(int)$lastId +1;

        }catch(Exception $ex)
        {
            return $ex;
        }
        

    }

    public function filterKeepersByDate($initDate,$initEnd)
    {
        try
        {
            $keeperListByDate = array();

            $query = "SELECT * FROM $this->tablename WHERE availStart >= '$initDate' AND availEnd <= '$initEnd';";

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query);
            var_dump($result);
            foreach ($result as $row) //Voy pasando a un objeto owner lo que recupera de la BD en un array asociativo por filas
                {                
                    //Revisar si precisa del methodPass / rta = nop
                    $keeper = new Keeper();

                    $keeper->setId($row["keeperId"]);
                    $keeper->setFirstname($row["firstname"]);
                    $keeper->setLastName($row["lastname"]);
                    $keeper->setUsername($row["username"]);
                    $keeper->setPassword($row["password"]);
                    $keeper->setEmail($row["email"]);
                    $keeper->setAddress($row["address"]);
                    $keeper->setTelephone($row["telephone"]);
                    $keeper->setCuil($row["cuil"]);
                    $keeper->setAvailStart($row["availStart"]);
                    $keeper->setAvailEnd($row["availEnd"]);
                    $keeper->setPrice($row["price"]);
                    $keeper->setStars($row["stars"]);

                    

                    array_push($keeperListByDate, $keeper);
                }

                return $keeperListByDate;

        }catch(Exception $ex)
        {
            return $ex;
        }
    }

    public function getUsernameKeeper($idKeeper)
        {

            $query = "SELECT username FROM $this->tablename WHERE keeperId = :keeperId;";
            $parameters["keeperId"] = $idKeeper;
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
