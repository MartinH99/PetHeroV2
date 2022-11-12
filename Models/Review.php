<?php

namespace Models;

class Review{

    private $reviewId;
    private $ownerId;
    private $keeperId;
    private $comment;
    private $stars;
    
    public function __construct()
    {
        
    }

    


    /**
     * Get the value of reviewId
     */ 
    public function getReviewId()
    {
        return $this->reviewId;
    }

    /**
     * Set the value of reviewId
     *
     * @return  self
     */ 
    public function setReviewId($reviewId)
    {
        $this->reviewId = $reviewId;

        return $this;
    }

    /**
     * Get the value of ownerId
     */ 
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Set the value of ownerId
     *
     * @return  self
     */ 
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    /**
     * Get the value of keeperId
     */ 
    public function getKeeperId()
    {
        return $this->keeperId;
    }

    /**
     * Set the value of keeperId
     *
     * @return  self
     */ 
    public function setKeeperId($keeperId)
    {
        $this->keeperId = $keeperId;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of stars
     */ 
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * Set the value of stars
     *
     * @return  self
     */ 
    public function setStars($stars)
    {
        $this->stars = $stars;

        return $this;
    }
}

?>