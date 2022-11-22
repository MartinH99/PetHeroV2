<?php
namespace DAObdd;

use DateInterval;
use Models\Coupon as Coupon;
use DAObdd\Connection as Connection;
use \Exception as Exception;
use DAObdd\KeeperDAO as Keeper;
use DAObdd\OwnerDAO as Owner;
use DAObdd\PetDAO as Pet;

class CouponDAO
{

    private $connection;
    private $tablename = "coupons";


    public function generateCoupon(Coupon $coupon)
    {
        //echo "COUPON QUE LLEGA";
            //var_dump($coupon);
        try
        {
            
            $query = "INSERT INTO ".$this->tablename." (couponId,total,subtotal,codeBook) 
            VALUES (:couponId, :total, :subtotal, :codeBook); ";

            $parameters["couponId"] = $this->setNextIdCoup();
            $paramteers["total"] = $coupon->getTotal();
            $paramteers["subtotal"] = $coupon->getSubtotal();
            $paramteers["codeBook"] = $coupon->getCodeBook();
            $paramteers["couponStatus"] = $coupon->getCouponStatus();
            
            $this->connection = Connection::GetInstance();
                  
            $this->connection->ExecuteNonQuery($query, $parameters);
        }catch(Exception $ex)
        {
            throw $ex;
        }
    }


    public function getAll()
        {
            try
            {
                $couponList = array();

                $query = "SELECT * FROM ".$this->tablename; //Traigo todo de coupons

                $this->connection = Connection::GetInstance();

                $resultadoQuery = $this->connection->Execute($query);
                
                foreach ($resultadoQuery as $row) //Voy pasando a un objeto owner lo que recupera de la BD en un array asociativo por filas
                {                
                    //Revisar si precisa del methodPass / rta = nop
                    $coupon = new Coupon();
                    $coupon->setCouponId($row["couponId"]);
                    $coupon->setTotal($row["total"]);
                    $coupon->setSubtotal($row["subtotal"]);
                    $coupon->setCodeBook($row["codeBook"]);
                    $coupon->setCouponStatus($row["couponStatus"]);

                    //var_dump($coupon);

                    array_push($couponList, $coupon);
                }

                return $couponList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }



    public function setNextIdCoup()
    {

        try
        {
            $query = "SELECT couponId FROM $this->tablename ORDER BY couponId DESC LIMIT 0, 1 ;";

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query);

            

            $newResult = reset($result);//Hago esto xq result devuelve un arreglo que en la 1°pos tiene otro arreglo asoc donde id esta en $x["ownerId"]
            //var_dump($result);
            $lastId = $newResult["couponId"];
            
            

            return (int)$lastId=(int)$lastId +1;

        }catch(Exception $ex)
        {
            return $ex;
        }
    }

    public function mapping2Booking($value)
        {
            $value = is_array($value) ? $value : []; //Si es arreglo sigue con su valor sino se hace uno vacio  

                $coupon = new Coupon();
                
                $coupon->setCouponId($value["couponId"]);
                $coupon->setTotal($value["total"]);
                $coupon->setSubtotal($value["subtotal"]);
                $coupon->setCodeBook($value["codeBook"]);
                $coupon->setCouponStatus($value["couponStatus"]);
                
                

                return $coupon;
            
        }

        //Tanto la de owner como keeper si puede hacer en 1 func y concatenar el parametro x el que se quiere filtrar pero mas facil asi

        public function getAllByIdKeeper($keeperId) //Trae todos los cupones de X keeper (id)
        {
            try
            {
                $couponListByIdKeeper = array();

                $query = "SELECT c.couponId,c.total,c.subtotal,c.couponStatus,b.codeBook,b.initDate,b.endDate,b.status,b.ownerId,b.keeperId,b.petId
                from coupons as c
                JOIN bookings as b
                on c.codeBook = b.codeBook
                where b.keeperId = $keeperId;"; //Traigo todo de coupons

                //$parameters["keeperId"] = $keeperId;   
                
                $this->connection = Connection::GetInstance();

                $resultadoQuery = $this->connection->Execute($query);
                
                foreach ($resultadoQuery as $row) //Voy pasando a un objeto owner lo que recupera de la BD en un array asociativo por filas
                {                
                    //Revisar si precisa del methodPass / rta = nop
                    $coupon = new Coupon();
                    $coupon->setCouponId($row["couponId"]);
                    $coupon->setTotal($row["total"]);
                    $coupon->setSubtotal($row["subtotal"]);
                    $coupon->setCodeBook($row["codeBook"]);
                    $coupon->setCouponStatus($row["couponStatus"]);

                    //var_dump($coupon);

                    array_push($couponListByIdKeeper, $coupon);
                }

                return $couponListByIdKeeper;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function getAllByIdOwner($ownerId)
        {
            try
            {
                $couponListByIdOwner = array();

                $query = "SELECT c.couponId,c.total,c.subtotal,c.couponStatus,b.codeBook,b.initDate,b.endDate,b.status,b.ownerId,b.keeperId,b.petId
                from coupons as c
                JOIN bookings as b
                on c.codeBook = b.codeBook
                where b.ownerId = $ownerId;"; //Traigo todo de coupons

                //$parameters["keeperId"] = $keeperId;   
                
                $this->connection = Connection::GetInstance();

                $resultadoQuery = $this->connection->Execute($query);
                
                foreach ($resultadoQuery as $row) //Voy pasando a un objeto owner lo que recupera de la BD en un array asociativo por filas
                {                
                    //Revisar si precisa del methodPass / rta = nop
                    $coupon = new Coupon();
                    $coupon->setCouponId($row["couponId"]);
                    $coupon->setTotal($row["total"]);
                    $coupon->setSubtotal($row["subtotal"]);
                    $coupon->setCodeBook($row["codeBook"]);
                    $coupon->setCouponStatus($row["couponStatus"]);

                    var_dump($coupon);

                    array_push($couponListByIdOwner, $coupon);
                }

                return $couponListByIdOwner;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
}

?>