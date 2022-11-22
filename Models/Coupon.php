<?php


namespace Models;

class Coupon{
    
    private $couponId;
    private $total;
    private $subtotal;  //50%
    private $codeBook; //Ver si me manejo solo con el id de Booking para dps referenciar al obj o directamente usar al obj acá?!?
    private $couponStatus;

    /**
     * Get the value of couponId
     */ 
    public function getCouponId()
    {
        return $this->couponId;
    }

    /**
     * Set the value of couponId
     *
     * @return  self
     */ 
    public function setCouponId($couponId)
    {
        $this->couponId = $couponId;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of subtotal
     */ 
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set the value of subtotal
     *
     * @return  self
     */ 
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

  

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
     * Get the value of couponStatus
     */ 
    public function getCouponStatus()
    {
        return $this->couponStatus;
    }

    /**
     * Set the value of couponStatus
     *
     * @return  self
     */ 
    public function setCouponStatus($couponStatus)
    {
        $this->couponStatus = $couponStatus;

        return $this;
    }
}
?>