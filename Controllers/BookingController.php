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
        //var_dump($id2);
        $bookingListById = $this->bookingDAO->getBookingByKeepId($id2); //Levanta todas las reservas del keeper
        require_once(VIEWS_PATH . "bookings-keep.php"); //Simplemente lista las bookings de x = idKeeper (logeado)
        ///return $bookingListById;
    }

    public function getBookingsByStatus($status)//Cuando estan en la vista de la funcion de arriba,es la que filtra por estados
    {
        require_once(VIEWS_PATH . "validate-session-own.php");
        $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $bookingListByKeepStatus = $this->bookingDAO->getBookingByStatus2($status, $id2);
        require_once(VIEWS_PATH . "bookings-keep-status.php");//bookings-keep.php filtrado por status
    }

    public function showChangeStatus() //Al clickear edit status te redirecciona acá
    {
        require_once(VIEWS_PATH . "validate-session-keep.php");
        $arraySession = array(); 
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $allBookingById = $this->bookingDAO->getAllById($id2);
        //$keepDao =$this->keeperDAO;
       // $ownDao = $this->ownerDAO;
       // $petDao = $this->petDAO;
       
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
            $coupon->setTotal($keeper->getPrice());
            $coupon->setsubTotal($keeper->getPrice()/2);
            $coupon->setCodeBook($codeBook);
            $coupon->setCouponStatus("accepted");
            $this->couponDAO->generateCoupon($coupon);
        }
        $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $booking = $this->bookingDAO->getOneBook($codeBook);
        $allBookingById = $this->bookingDAO->getAllById($id2);
        $allBookingByIdFormated = array();
        foreach ($allBookingById as $booking)
        {
            $idOwner = $booking->getIdOwner();
            $idKeeper = $booking->getIdKeeper();
            $idPet = $booking->getIdPet();

            $booking->setIdOwner2($idOwner);
            $booking->setIdKeeper2($idKeeper);
            $booking->setIdPet2($idPet);

            array_push($allBookingByIdFormated, $booking);
        }
        $ownerUsername = $this->ownerDAO->getUsernameOwner($booking->getIdOwner());
        $keeperUsername = $this->keeperDAO->getUsernameKeeper($booking->getIdKeeper());
        $petName = $this->petDAO->getPetName($booking->getIdPet());
        
        require_once(VIEWS_PATH . "booking-status.php");
    }


    public function showBooksPendings($status = "pending") //Booking status 2
    {
        require_once(VIEWS_PATH . "validate-session-own.php");
        $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $allBookingByIdndStatus = $this->bookingDAO->getAllByIdStatus($id2, $status);
        require_once(VIEWS_PATH . "booking-status2.php");
    }

    public function showBooksByConfirmed($status = "confirmed")//Booking status 3
    {
        require_once(VIEWS_PATH . "validate-session-own.php");
        $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
        $arraySession = $_SESSION["userLogged"];
        $id2 = $arraySession->getId();
        $allBookingByIdndStatus = $this->bookingDAO->getAllByIdStatus($id2, $status);
        require_once(VIEWS_PATH . "booking-status3.php");
    }

//                  IMPORTANTE
//     En caso de que la reserva sea aceptada por el Keeper, se envía un cupón de pago
// al Owner con el 50% del costo del total de la estadía. Al momento de efectuar el pago, la
// reserva queda confirmada.

}
