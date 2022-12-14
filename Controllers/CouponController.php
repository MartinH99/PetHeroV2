<?php

    namespace Controllers;

    use \Exception as Exception;
    use DAObdd\BookingDAO as BookingDAO;
    use DAObdd\PetDAO as PetDAO;
    use DAObdd\KeeperDAO as KeeperDAO;
    use DAObdd\OwnerDAO as OwnerDAO;

    use Models\Booking as Booking;
    use Models\Coupon as Coupon;
    use DAObdd\CouponDAO as CouponDAO;

    class CouponController{

        private $bookingDAO;
        private $ownerDAO;
        private $petDAO;
        private $keeperDAO;
        private $couponDAO;


        function __construct()
        {
            $this->ownerDAO = new OwnerDAO();
            $this->keeperDAO = new KeeperDAO();
            $this->petDAO = new PetDAO();
            $this->bookingDAO = new BookingDAO();
            $this->couponDAO = new CouponDAO();
        }

        public function showCouponListKeepView()
        {
            require_once(VIEWS_PATH . "validate-session-keep.php");
            //require_once(VIEWS_PATH. "nav-bar-keeper.php");
            $arraySession = array(); 
            $arraySession = $_SESSION["userLogged"];
            $idKeepLogged = $arraySession->getId();
            $couponListByIdKeep = $this->couponDAO->getAllByIdKeeper($idKeepLogged);
            
            $arrayCouponBookInfoKeep = array();
            foreach($couponListByIdKeep as $coupon) //Uso el objeto coupon para copiar su contenido en un array
            {                                       //Y dps creo un objeto booking -bookInfo- donde obtengo el resto de datos
                $infoCouponArr["couponId"] = $coupon->getCouponid();
                $infoCouponArr["total"] = $coupon->getTotal();
                $infoCouponArr["subtotal"] = $coupon->getSubtotal();
                $infoCouponArr["codeBook"] = $coupon->getCodebook();
                $infoCouponArr["couponStatus"] = $coupon->getCouponStatus();
                
                $bookInfo = $this->bookingDAO->getOneBook($coupon->getCodebook());
                
                $infoCouponArr["initDate"] = $bookInfo->getInitDate();
                $infoCouponArr["endDate"] = $bookInfo->getEndDate();
                $infoCouponArr["status"] = $bookInfo->getStatus();
               
                //Voy reemplazando la var auxAsoc recibiendo un key->value que es el resultado de la consulta de la funcion
                $auxAsoc =$this->ownerDAO->getUsernameOwner($bookInfo->getIdOwner());
                $infoCouponArr["ownerId"] = $auxAsoc["username"];

                $auxAsoc = $this->keeperDAO->getUsernameKeeper($bookInfo->getIdKeeper());
                $infoCouponArr["keeperId"] = $auxAsoc["username"];

                $auxAsoc = $this->petDAO->getPetName($bookInfo->getidPet());
                $infoCouponArr["petId"] = $auxAsoc["name"];
                
                array_push($arrayCouponBookInfoKeep,$infoCouponArr); //Pusheo todo al arreglo a iterar en el html
            }
            require_once(VIEWS_PATH. "coupons-list-keep.php");
        }

        public function showCouponListOwnView($message = "")
        {
            require_once(VIEWS_PATH . "validate-session-own.php");
            
            $arraySession = array(); 
            $arraySession = $_SESSION["userLogged"];
            $idOwnerLogged = $arraySession->getId();
            $couponListByIdOwner = $this->couponDAO->getAllByIdOwner($idOwnerLogged);
            
            $arrayCouponBookInfoOwn = array();
            foreach($couponListByIdOwner as $coupon) //Uso el objeto coupon para copiar su contenido en un array
            {                                       //Y dps creo un objeto booking -bookInfo- donde obtengo el resto de datos
                $infoCouponArr["couponId"] = $coupon->getCouponid();
                $infoCouponArr["total"] = $coupon->getTotal();
                $infoCouponArr["subtotal"] = $coupon->getSubtotal();
                $infoCouponArr["codeBook"] = $coupon->getCodebook();
                $infoCouponArr["couponStatus"] = $coupon->getCouponStatus();
                
                $bookInfo = $this->bookingDAO->getOneBook($coupon->getCodebook());
                
                $infoCouponArr["initDate"] = $bookInfo->getInitDate();
                $infoCouponArr["endDate"] = $bookInfo->getEndDate();
                $infoCouponArr["status"] = $bookInfo->getStatus();
               
                //Voy reemplazando la var auxAsoc recibiendo un key->value que es el resultado de la consulta de la funcion
                $auxAsoc =$this->ownerDAO->getUsernameOwner($bookInfo->getIdOwner());
                $infoCouponArr["ownerId"] = $auxAsoc["username"];

                $auxAsoc = $this->keeperDAO->getUsernameKeeper($bookInfo->getIdKeeper());
                $infoCouponArr["keeperId"] = $auxAsoc["username"];

                $auxAsoc = $this->petDAO->getPetName($bookInfo->getidPet());
                $infoCouponArr["petId"] = $auxAsoc["name"];
                
                array_push($arrayCouponBookInfoOwn,$infoCouponArr); //Pusheo todo al arreglo a iterar en el html
            }
            require_once(VIEWS_PATH. "coupons-list-own.php");

        }

        public function showPaymentCoupBook($couponId)
        {
            require_once(VIEWS_PATH . "validate-session-own.php");
            
            $coupon = $this->couponDAO->getCouponById($couponId); //Busco el cupon pasado por parametro

            $book = $this->bookingDAO->getOneBook($coupon->getCodebook());//Del buscado de arriba 'extraigo' la info del booking

                $infoCouponArr["couponId"] = $coupon->getCouponid();
                $infoCouponArr["total"] = $coupon->getTotal();
                $infoCouponArr["subtotal"] = $coupon->getSubtotal();
                $infoCouponArr["codeBook"] = $coupon->getCodebook();
                $infoCouponArr["couponStatus"] = $coupon->getCouponStatus();

                $infoCouponArr["endDate"] = $book->getEndDate();
                $infoCouponArr["initDate"] = $book->getInitDate();
                $infoCouponArr["status"] = $book->getStatus();
                $infoCouponArr["initDate"] = $book->getInitDate();
                $infoCouponArr["endDate"] = $book->getEndDate();
                $infoCouponArr["status"] = $book->getStatus();

                //Trayendo cada objeto para la informacion total
                $keeperObj = $this->keeperDAO->searchKeeperById($book->getIdKeeper());

                $petObj = $this->petDAO->getPetById($book->getidPet());

                $auxAsoc =$this->ownerDAO->getUsernameOwner($book->getIdOwner());
                $infoCouponArr["ownerId"] = $auxAsoc["username"];

                $auxAsoc = $this->keeperDAO->getUsernameKeeper($book->getIdKeeper());
                $infoCouponArr["keeperId"] = $auxAsoc["username"];

                $auxAsoc = $this->petDAO->getPetName($book->getidPet());
                $infoCouponArr["petId"] = $auxAsoc["name"];

                require_once(VIEWS_PATH. "payment-book.php");

        }

        public function getCurrentDate()
        {
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $currentDate = date("Y-m");
            return $currentDate;
        }

        public function payOutCoupBook($couponId,$codeBook,$cardnumber,$expire,$cvc,$cardname)
        {
            $currentDate = $this->getCurrentDate();
            try
            {
                    if(!empty($cardnumber))
                    {
                        if(strlen($cardnumber) == 16)
                        {
                            if(!empty($expire))
                            {
                                if($expire >= $currentDate)
                                {
                                    if(!empty($cvc))
                                    {
                                        if(strlen($cvc) == 3)
                                        {
                                            if(!empty($cardname))
                                            {
                                                $this->bookingDAO->updateBooking("confirmed",$codeBook);
                                                $this->couponDAO->updateCouponStatus($couponId,"confirmed");
                                                $this->showCouponListOwnView("Booking successfully payed!");
                                            }else
                                            {
                                                throw new Exception("The field '<b>Cardholder Name</b>' cannot be empty.");
                                            }
                                        }else
                                        {
                                            throw new Exception("Invalid CVC.");
                                        }
                                    }else{
                                        throw new Exception("The field '<b>CVC</b>' cannot be empty.");
                                    }
                                }else
                                {
                                    throw new Exception("Your card is expired.");
                                }
                            }else
                            {
                                throw new Exception("The field '<b>Expires</b>' cannot be empty.");
                            }
                        }else
                        {
                            throw new Exception("Invalid card number.");
                        }
                    }else
                    {
                        throw new Exception("The field '<b>Card Number</b>' cannot be empty.");
                    }
            }catch(Exception $e){

                $message = $e->getMessage();
                require_once(VIEWS_PATH . "payment-book.php");


            }
          
        }
    }