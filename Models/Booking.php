<?php
namespace Models;

class Booking {

    private $codeBook;
    private $initDate;
    private $endDate;
    private $interval;
    private $status; //Nueva,Caducada(Aplicable si nunca se acepto o terminó),RECHAZADA(Keeper dice no),ACEPTADA,CANCELADA
    private $idOwner;
    private $idKeeper;
    private $idPet;


    /**
     * Get the value of codeBook
     */ 
    public function getCodeBook()
    {
        return $this->codeBook;
    }

    /**
     * Set the value of codeBook
     *
     * @return  self
     */ 
    public function setCodeBook($codeBook)
    {
        $this->codeBook = $codeBook;

        return $this;
    }

    /**
     * Get the value of initDate
     */ 
    public function getInitDate()
    {
        return $this->initDate;
    }

    /**
     * Set the value of initDate
     *
     * @return  self
     */ 
    public function setInitDate($initDate)
    {
        $this->initDate = $initDate;

        return $this;
    }

    /**
     * Get the value of endDate
     */ 
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set the value of endDate
     *
     * @return  self
     */ 
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get the value of interval
     */ 
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * Set the value of interval
     *
     * @return  self
     */ 
    public function setInterval($interval)
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of idOwner
     */ 
    public function getIdOwner()
    {
        return $this->idOwner;
    }

    /**
     * Set the value of idOwner
     *
     * @return  self
     */ 
    public function setIdOwner($idOwner)
    {
        $this->idOwner = $idOwner;

        return $this;
    }

    /**
     * Get the value of idKeeper
     */ 
    public function getIdKeeper()
    {
        return $this->idKeeper;
    }

    /**
     * Set the value of idKeeper
     *
     * @return  self
     */ 
    public function setIdKeeper($idKeeper)
    {
        $this->idKeeper = $idKeeper;

        return $this;
    }

    /**
     * Get the value of idPet
     */ 
    public function getIdPet()
    {
        return $this->idPet;
    }

    /**
     * Set the value of idPet
     *
     * @return  self
     */ 
    public function setIdPet($idPet)
    {
        $this->idPet = $idPet;

        return $this;
    }
}

?>