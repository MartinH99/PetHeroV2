<?php

namespace Controllers;

use DAObdd\BookingDAO as BookingDAO;
use Models\Booking as Booking;
use Controllers\HomeController as HomeController;
use DAObdd\PetDAO as PetDAO;
use DAObdd\KeeperDAO as KeeperDAO;
use DAObdd\OwnerDAO as OwnerDAO;

class BookingController
{
    private $bookingDAO;
    private $tablename = "bookings";
    private $petDAO;
    private $keeperDAO;
    private $ownerDAO;

    function __construct()
        {
            $this->bookingDAO = new BookingDAO();
            $this->petDAO = new PetDAO();
            $this->keeperDAO = new KeeperDAO();
            $this->ownerDAO = new OwnerDAO();
            //$this->homeController = new HomeController(); //No estoy seguro si esto esta bien
        }

       
        
        public function showAddBookView()//$idKeep
        {
            //include(VIEWS_PATH."validate-session-own.php"); comento acá para probar cuando no inicie session
           
            //require_once(VIEWS_PATH."booking-request.php");
            

        }

        public function AddBookView($id)
        {
            require_once(VIEWS_PATH."validate-session-own.php");
            $arraySession = array();
            $arraySession = $_SESSION["userLogged"];
            $id2 = $arraySession->getId();
            $petListById = $this->petDAO->getPetsByOwnerId($id2);
            $keeper = $this->keeperDAO->searchKeeperById($id);

           require_once(VIEWS_PATH."booking-request.php");
            
            
            
        }

        public function Add($initStart,$initEnd,$petId,$ownerId,$keeperId) ///$Pet seria el obj?
        {
            var_dump($petId);
            $booking = new Booking();
            //$interval;  fecha fin-inicio
            $booking->setIdOwner($ownerId);
            $booking->setIdKeeper($keeperId);
            $booking->setIdPet($petId);
            $booking->setInitDate($initStart);
            $booking->setEndDate($initEnd);
            $booking->setStatus("pending");
            $booking->setInterval(0); //
            
            $this->bookingDAO->Add($booking);

        }


        
        public function listPetsOwnId()
        {
            require_once(VIEWS_PATH."validate-session-own.php");
            $arraySession = array();
            $arraySession = $_SESSION["userLogged"];
            $id2 = $arraySession->getId();
            $petListById = $this->petDAO->getPetsByOwnerId($id2);
            require_once(VIEWS_PATH."booking-request.php");
        }

        public function getBookingsById()
        {
            require_once(VIEWS_PATH."validate-session-own.php");
            $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
            $arraySession = $_SESSION["userLogged"];
            $id2 = $arraySession->getId();
            //var_dump($id2);
            $bookingListById = $this->bookingDAO->getBookingByKeepId($id2);
            require_once(VIEWS_PATH."bookings-keep.php");
            return $bookingListById;
        }

        public function getBookingsByStatus($status)
        {
            require_once(VIEWS_PATH."validate-session-own.php");
            $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
            $arraySession = $_SESSION["userLogged"];
            $id2 = $arraySession->getId();
            $bookingListByKeepStatus = $this->bookingDAO->getBookingByStatus2($status,$id2);
            require_once(VIEWS_PATH."bookings-keep-status.php");
        }

        public function showChangeStatus()
        {
            require_once(VIEWS_PATH."validate-session-own.php");
            $arraySession = array(); ///Si hacer todo esto del usuario logeado O directamente levantarlo del html...
            $arraySession = $_SESSION["userLogged"];
            $id2 = $arraySession->getId();
            $allBookingById = $this->bookingDAO->getAllById($id2);
            // $ownerUsername = $this->ownerDAO->getUsernameOwner($booking->getIdOwner());
            // $keeperUsername = $this->keeperDAO->getUsernameKeeper($booking->getIdKeeper());
            // $petName = $this->petDAO->getPetName($booking->getIdPet());
            require_once(VIEWS_PATH."booking-status.php");
        }
}

?>