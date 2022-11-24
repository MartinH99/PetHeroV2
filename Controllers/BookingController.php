<?php

namespace Controllers;

use \Exception as Exception;
use DAObdd\BookingDAO as BookingDAO;
use Models\Booking as Booking;
use Controllers\HomeController as HomeController;
use DAObdd\PetDAO as PetDAO;
use DAObdd\KeeperDAO as KeeperDAO;
use DAObdd\OwnerDAO as OwnerDAO;
use Controllers\OwnerController as OwnerController;
use Controllers\UserController as UserController;
use Models\Coupon as Coupon;
use DAObdd\CouponDAO as CouponDAO;

class BookingController
{
    private $bookingDAO;
    private $petDAO;
    private $keeperDAO;
    private $ownerDAO;
    private $ownerController;
    private $userController;
    private $couponDAO;

    function __construct()
    {
        $this->bookingDAO = new BookingDAO();
        $this->petDAO = new PetDAO();
        $this->keeperDAO = new KeeperDAO();
        $this->ownerDAO = new OwnerDAO();
        $this->ownerController = new OwnerController();
        $this->userController = new UserController();
        $this->couponDAO = new CouponDAO();
        //$this->homeController = new HomeController(); //No estoy seguro si esto esta bien
    }



    public function showAddBookView() //$idKeep
    {
        //include(VIEWS_PATH."validate-session-own.php"); comento acá para probar cuando no inicie session

        //require_once(VIEWS_PATH."booking-request.php");


    }

    public function AddBookView($id, $message = "")
    {
        require_once(VIEWS_PATH . "validate-session-own.php");
        $arraySession = array();
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $petListById = $this->petDAO->getPetsByOwnerId($id2);
        $keeper = $this->keeperDAO->searchKeeperById($id);
        require_once(VIEWS_PATH . "booking-request.php");
    }

    public function Add($initStart, $initEnd, $petId, $ownerId, $keeperId) ///$Pet seria el obj?
    {

        $currentDate = $this->getCurrentDate();
        $keeper = $this->keeperDAO->searchKeeperById($keeperId);
        $booking = $this->bookingDAO->getFirstBreedBook($keeperId,$initStart);
        
        try {
            if($booking == false)
            {
                     if (!empty($petId)) {
                         if (!empty($initStart)) {
                             if ($initStart >= $currentDate) {
                                 if ($this->validateStartDate($initStart, $keeperId)) {
                                     if (!empty($initEnd)) {
                                         if ($initStart <= $initEnd) {
                                             if ($this->validateEndDate($initEnd, $keeperId)) {
                                                 $booking = new Booking();
                                                 $booking->setIdOwner($ownerId);
                                                 $booking->setIdKeeper($keeperId);
                                                 $booking->setIdPet($petId);
                                                 $booking->setInitDate($initStart);
                                                 $booking->setEndDate($initEnd);
                                                 $booking->setStatus("pending");
                                                 $booking->setInterval(0); //
         
                                                 $this->bookingDAO->Add($booking);
                                                 $this->ownerController->indexOwner("Keeper booked!");
                                             } else {
                                                 throw new Exception ("The keeper will not be available on the end date you entered.");
                                             }
                                         } else {
                                             throw new Exception ("End date must be equal or greater than start date.");
                                         }
                                     } else {
                                         throw new Exception ("The field '<b>End date</b>' cannot be empty.");
                                     }
                                 } else {
                                     throw new Exception ("The keeper will not be available on the start date you entered.");
                                 }
                             } else {
                                 throw new Exception ("Start date must be equal or greater than current date.");
                             }
                         } else {
                             throw new Exception ("The field '<b>Start date</b>' cannot be empty.");
                         }
                     } else {
                          throw new Exception ("You must choose one of your pets.");
                     }
            }else
            {
                $idPet = $booking->getIdPet();
                $petAux = $this->petDAO->getPetById($idPet);
                $petIngresado = $this->petDAO->getPetById($petId);
                if($petAux->getBreed() == $petIngresado->getBreed())
                {
                    if (!empty($petId)) {
                        if (!empty($initStart)) {
                            if ($initStart >= $currentDate) {
                                if ($this->validateStartDate($initStart, $keeperId)) {
                                    if (!empty($initEnd)) {
                                        if ($initStart <= $initEnd) {
                                            if ($this->validateEndDate($initEnd, $keeperId)) {
                                                $booking = new Booking();
                                                $booking->setIdOwner($ownerId);
                                                $booking->setIdKeeper($keeperId);
                                                $booking->setIdPet($petId);
                                                $booking->setInitDate($initStart);
                                                $booking->setEndDate($initEnd);
                                                $booking->setStatus("pending");
                                                $booking->setInterval(0); //
        
                                                $this->bookingDAO->Add($booking);
                                                $this->ownerController->indexOwner("Keeper booked!");
                                            } else {
                                                throw new Exception ("The keeper will not be available on the end date you entered.");
                                            }
                                        } else {
                                            throw new Exception ("End date must be equal or greater than start date.");
                                        }
                                    } else {
                                        throw new Exception ("The field '<b>End date</b>' cannot be empty.");
                                    }
                                } else {
                                    throw new Exception ("The keeper will not be available on the start date you entered.");
                                }
                            } else {
                                throw new Exception ("The keeper will not be available on the start date you entered.");
                            }
                        } else {
                            throw new Exception ("The field '<b>Start date</b>' cannot be empty.");
                        }
                    } else {
                        throw new Exception ("You must choose one of your pets.");
                    }
                }else
                {
                    throw new Exception ("This keeper does not keep pets of that breed's type");
                }
            }
        }catch (Exception $ex) {
            $message = $ex->getMessage();
            $this->AddBookView($keeperId,$message);
        }
    }

    public function getCurrentDate()
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $currentDate = date("Y-m-d");
        return $currentDate;
    }

    public function validateStartDate($initDate, $keeperId)
    {
        try {

            $flag = true;

            $keeperAux = $this->keeperDAO->searchKeeperById($keeperId);
            $keeperInitDate = $keeperAux->getAvailStart();

            if ($initDate < $keeperInitDate) {
                $flag = false; //si flag es false es porque ya existe
            }
            return $flag;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function validateEndDate($endDate, $keeperId)
    {
        try {

            $flag = true;

            $keeperAux = $this->keeperDAO->searchKeeperById($keeperId);
            $keeperEndDate = $keeperAux->getAvailEnd();

            if ($endDate > $keeperEndDate) {
                $flag = false; //si flag es false es porque ya existe
            }
            return $flag;
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function listPetsOwnId()
    {
        require_once(VIEWS_PATH . "validate-session-own.php");
        $arraySession = array();
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $petListById = $this->petDAO->getPetsByOwnerId($id2);
        require_once(VIEWS_PATH . "booking-request.php");
    }

    public function getBookingsById()//Funcion que se dispara al clickear 'My Bookings'
    {
        require_once(VIEWS_PATH . "validate-session-own.php");
        $arraySession = array(); 
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        
        $bookingListById = $this->bookingDAO->getAllById($id2); //Levanta todas las reservas del keeper

            $arrayBooking = array();
            foreach($bookingListById as $coupon) //Uso el objeto coupon para copiar su contenido en un array
            {                                       //Y dps creo un objeto booking -bookInfo- donde obtengo el resto de datos  
                $bookInfo = $this->bookingDAO->getOneBook($coupon->getCodebook());

                $infoCouponArr["codeBook"] = $bookInfo->getCodeBook();
                $infoCouponArr["initDate"] = $bookInfo->getInitDate();
                $infoCouponArr["endDate"] = $bookInfo->getEndDate();
                $infoCouponArr["status"] = $bookInfo->getStatus();
               
                //Trayendo cada objeto para la informacion total
                $keeperObj = $this->keeperDAO->searchKeeperById($bookInfo->getIdKeeper());

                $petObj = $this->petDAO->getPetById($bookInfo->getidPet());

                $ownerObj = $this->ownerDAO->searchOwnerById($bookInfo->getIdOwner());

                //Voy reemplazando la var auxAsoc recibiendo un key->value que es el resultado de la consulta de la funcion
                $auxAsoc =$this->ownerDAO->getUsernameOwner($bookInfo->getIdOwner());
                $infoCouponArr["ownerId"] = $auxAsoc["username"];

                $auxAsoc = $this->keeperDAO->getUsernameKeeper($bookInfo->getIdKeeper());
                $infoCouponArr["keeperId"] = $auxAsoc["username"];

                $auxAsoc = $this->petDAO->getPetName($bookInfo->getidPet());
                $infoCouponArr["petId"] = $auxAsoc["name"];
                
                array_push($arrayBooking,$infoCouponArr); //Pusheo todo al arreglo a iterar en el html
            }

        require_once(VIEWS_PATH . "bookings-keep.php"); //Simplemente lista las bookings de x = idKeeper (logeado)
        
    }

    public function getBookingsByStatus($status)//Cuando estan en la vista de la funcion de arriba,es la que filtra por estados
    {
        require_once(VIEWS_PATH . "validate-session-own.php");
        $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $bookingListByKeepStatus = $this->bookingDAO->getBookingByStatusAndId($id2,$status);

            $arrayBooking = array();
            foreach($bookingListByKeepStatus as $coupon) //Uso el objeto coupon para copiar su contenido en un array
            {                                       //Y dps creo un objeto booking -bookInfo- donde obtengo el resto de datos  
                $bookInfo = $this->bookingDAO->getOneBook($coupon->getCodebook());

                $infoCouponArr["codeBook"] = $bookInfo->getCodeBook();
                $infoCouponArr["initDate"] = $bookInfo->getInitDate();
                $infoCouponArr["endDate"] = $bookInfo->getEndDate();
                $infoCouponArr["status"] = $bookInfo->getStatus();
               
                //Trayendo cada objeto para la informacion total
                $keeperObj = $this->keeperDAO->searchKeeperById($bookInfo->getIdKeeper());

                $petObj = $this->petDAO->getPetById($bookInfo->getidPet());

                $ownerObj = $this->ownerDAO->searchOwnerById($bookInfo->getIdOwner());
                
                //Voy reemplazando la var auxAsoc recibiendo un key->value que es el resultado de la consulta de la funcion
                $auxAsoc =$this->ownerDAO->getUsernameOwner($bookInfo->getIdOwner());
                $infoCouponArr["ownerId"] = $auxAsoc["username"];

                $auxAsoc = $this->keeperDAO->getUsernameKeeper($bookInfo->getIdKeeper());
                $infoCouponArr["keeperId"] = $auxAsoc["username"];

                $auxAsoc = $this->petDAO->getPetName($bookInfo->getidPet());
                $infoCouponArr["petId"] = $auxAsoc["name"];
                
                array_push($arrayBooking,$infoCouponArr); //Pusheo todo al arreglo a iterar en el html
            }
        require_once(VIEWS_PATH . "bookings-keep-status.php");//bookings-keep.php filtrado por status
    }

    public function showChangeStatus() //Al clickear edit status te redirecciona acá
    {
        require_once(VIEWS_PATH . "validate-session-keep.php");
        $arraySession = array(); 
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $allBookingById = $this->bookingDAO->getAllById($id2);
        
        $arrayBooking = array();
            foreach($allBookingById as $coupon) //Uso el objeto coupon para copiar su contenido en un array
            {                                       //Y dps creo un objeto booking -bookInfo- donde obtengo el resto de datos
                // $infoCouponArr["couponId"] = $coupon->getCouponid();
                // $infoCouponArr["total"] = $coupon->getTotal();
                // $infoCouponArr["subtotal"] = $coupon->getSubtotal();
                // $infoCouponArr["codeBook"] = $coupon->getCodebook();
                // $infoCouponArr["couponStatus"] = $coupon->getCouponStatus();
                
                $bookInfo = $this->bookingDAO->getOneBook($coupon->getCodebook());
                
                $infoCouponArr["codeBook"] = $bookInfo->getCodeBook();
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
                
                array_push($arrayBooking,$infoCouponArr); //Pusheo todo al arreglo a iterar en el html
            }
       
        require_once(VIEWS_PATH . "booking-status.php");
    }

    public function modifyStatusBook($codeBook, $status)//Al confirmar o rechazar actua esto --probar acá lo del cupon--
    {
        require_once(VIEWS_PATH . "validate-session-own.php");
        $this->bookingDAO->updateBooking($status, $codeBook);
        //A partir de aca seria la generacion del coupon --faltan validaciones
        $bookingAux = $this->bookingDAO->getOneBook($codeBook); //Creo un obj booking con toda la info referida por ID
        if($status == "accepted")
        {
            $coupon = new Coupon();
            $keeper = $this->keeperDAO->searchKeeperById($bookingAux->getIdKeeper());//Creo un obj para tener la info de Keeper
            $coupon->setTotal($keeper->getPrice() * $keeper->getInterval()); //El precio del cupon es por la cant de dias
            $coupon->setsubTotal(($keeper->getPrice() * $keeper->getInterval() )/2);//El subtotal del cupon es por la cant de dias
            $coupon->setCodeBook($codeBook);
            $coupon->setCouponStatus("accepted");
            $this->couponDAO->generateCoupon($coupon);
        }
        $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $booking = $this->bookingDAO->getOneBook($codeBook);
        $allBookingById = $this->bookingDAO->getAllById($id2);
        
            $arrayBooking = array();
            foreach($allBookingById as $coupon) //Uso el objeto coupon para copiar su contenido en un array
            {                                       //Y dps creo un objeto booking -bookInfo- donde obtengo el resto de datos
                // $infoCouponArr["couponId"] = $coupon->getCouponid();
                // $infoCouponArr["total"] = $coupon->getTotal();
                // $infoCouponArr["subtotal"] = $coupon->getSubtotal();
                // $infoCouponArr["codeBook"] = $coupon->getCodebook();
                // $infoCouponArr["couponStatus"] = $coupon->getCouponStatus();
                
                $bookInfo = $this->bookingDAO->getOneBook($coupon->getCodebook());

                $infoCouponArr["codeBook"] = $bookInfo->getCodeBook();
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
                
                array_push($arrayBooking,$infoCouponArr); //Pusheo todo al arreglo a iterar en el html
            }
        
        require_once(VIEWS_PATH . "booking-status.php");
    }


    public function showBooksPendings($status = "pending") //Booking status 2
    {
        require_once(VIEWS_PATH . "validate-session-own.php");
        $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $allBookingByIdndStatus = $this->bookingDAO->getAllByIdStatus($id2, $status);

            $arrayBooking = array();
            foreach($allBookingByIdndStatus as $coupon) //Uso el objeto coupon para copiar su contenido en un array
            {                                       //Y dps creo un objeto booking -bookInfo- donde obtengo el resto de datos
                // $infoCouponArr["couponId"] = $coupon->getCouponid();
                // $infoCouponArr["total"] = $coupon->getTotal();
                // $infoCouponArr["subtotal"] = $coupon->getSubtotal();
                // $infoCouponArr["codeBook"] = $coupon->getCodebook();
                // $infoCouponArr["couponStatus"] = $coupon->getCouponStatus();
                
                $bookInfo = $this->bookingDAO->getOneBook($coupon->getCodebook());
                $infoCouponArr["codeBook"] = $bookInfo->getCodeBook();
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
                
                array_push($arrayBooking,$infoCouponArr); //Pusheo todo al arreglo a iterar en el html
            }

        require_once(VIEWS_PATH . "booking-status2.php");
    }

    public function showBooksByConfirmed($status = "accepted")//Booking status 3
    {
        require_once(VIEWS_PATH . "validate-session-own.php");
        $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $allBookingByIdndStatus = $this->bookingDAO->getAllByIdStatus($id2, $status);

            $arrayBooking = array();
            foreach($allBookingByIdndStatus as $coupon) //Uso el objeto coupon para copiar su contenido en un array
            {                                       //Y dps creo un objeto booking -bookInfo- donde obtengo el resto de datos
                // $infoCouponArr["couponId"] = $coupon->getCouponid();
                // $infoCouponArr["total"] = $coupon->getTotal();
                // $infoCouponArr["subtotal"] = $coupon->getSubtotal();
                // $infoCouponArr["codeBook"] = $coupon->getCodebook();
                // $infoCouponArr["couponStatus"] = $coupon->getCouponStatus();
                
                $bookInfo = $this->bookingDAO->getOneBook($coupon->getCodebook());
                $infoCouponArr["codeBook"] = $bookInfo->getCodeBook();
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
                
                array_push($arrayBooking,$infoCouponArr); //Pusheo todo al arreglo a iterar en el html
            }
        require_once(VIEWS_PATH . "booking-status3.php");
    }
    
    

//                  IMPORTANTE
//     En caso de que la reserva sea aceptada por el Keeper, se envía un cupón de pago
// al Owner con el 50% del costo del total de la estadía. Al momento de efectuar el pago, la
// reserva queda confirmada.

}
