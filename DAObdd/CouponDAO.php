<?
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
    private $tablename = "coupon";


    public function Add(Coupon $coupon)
    {
        try
        {
            $query = "INSERT INTO ".$this->tablename." (couponId,total,subtotal,codeBook) 
            VALUES (:couponId, :total, :subtotal, :codeBook); ";

            $parameters["couponId"] = $this->setNextIdCoup();
            $paramteers["total"] = $coupon->setTotal();
            $paramteers["subtotal"] = $coupon->setSubtotal();
            $paramteers[""] = $coupon->;
            
        }catch(Exception $ex)
        {

        }
    }
}

?>