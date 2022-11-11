<?php
namespace DAObdd;

use DateInterval;
use Models\Booking as Booking;
use DAObdd\Connection as Connection;
use \Exception as Exception;
use DAObdd\KeeperDAO as Keeper;
use DAObdd\OwnerDAO as Owner;
use DAObdd\PetDAO as Pet;

class BookingDAO{

    private $connection;
    private $tablename = "bookings";

    public function Add(Booking $booking)
        {
            
            try
            { //Recordar que interval tiene que ser una entidad propia
                $query = "INSERT INTO ".$this->tablename." (codeBook,initDate,endDate,interv,status,ownerId,keeperId,petId)
                VALUES (:codeBook, :initDate, :endDate, :interv, :status, :ownerId, :keeperId, :petId);";
                
                
                $parameters["codeBook"] = $this->setNextIdBook(); //$owner->getId(); Aca estaria bueno lo de el nextId con lastInsertId + inicial Tabla K1/O1
                $parameters["initDate"] = $booking->getInitDate();
                $parameters["endDate"] = $booking->getEndDate();
                $parameters["interv"] = $booking->getInterval();
                $parameters["status"] = $booking->getStatus();
                //methodPass
                $parameters["ownerId"] = $booking->getIdOwner();
                $parameters["keeperId"] = $booking->getIdKeeper();
                $parameters["petId"] = $booking->getIdPet();

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
                    $booking = new Booking();
                    $booking->setCodeBook($row["codeBook"]);
                    $booking->setInitDate($row["initDate"]);
                    $booking->setEndDate($row["endDate"]);
                    $booking->setInterval($row["interval"]);
                    $booking->setStatus($row["status"]);
                    $booking->setIdOwner($row["ownerId"]);
                    $booking->setIdKeeper($row["keeperId"]);
                    $booking->setIdPet($row["petId"]);
                

                    var_dump($booking);

                    array_push($bookingList, $booking);
                }

                return $bookingList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function remove($codeBook) //Considerar el remove como el cambiado de la variable eliminado a 0 o 1
        {
            try
            {
                $query = "DELETE FROM $this->tablename WHERE codeBook= :codeBook;";

                $this->connection = Connection::GetInstance();

                $parameters["codeBook"] = $codeBook;

                $resultado = $this->connection->ExecuteNonQuery($query, $parameters);

                var_dump($resultado);
            }catch(Exception $ex)
            {
                throw $ex;
            }
        }


        public function setNextIdbook()
    {

        try
        {
            $query = "SELECT codeBook FROM $this->tablename ORDER BY codeBook DESC LIMIT 0, 1 ;";

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query);

            

            $newResult = reset($result);//Hago esto xq result devuelve un arreglo que en la 1°pos tiene otro arreglo asoc donde id esta en $x["ownerId"]
            var_dump($result);
            $lastId = $newResult["codeBook"];
            
            

            return (int)$lastId=(int)$lastId +1;

        }catch(Exception $ex)
        {
            return $ex;
        }
    }



}




?>