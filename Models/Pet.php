<?php

namespace Models;

class Pet
{
    private $id;
    private $name;
    private $size;
    private $animalType;
    private $ownerId;
    private $breed;
    private $image;
    private $vaccines;
    private $video;
    private $descrip;

    public function __construct()
    {
        
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId( $id)
    {
        $this->id = $id;
        return $this;
    }




    public function getOwnerId()
    {
        return $this->ownerId;
    }

    public function setOwnerId( $ownerId)
    {
        $this->ownerId = $ownerId;
        return $this;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName( $name)
    {
        $this->name = $name;

        return $this;
    }


    public function getAnimalType()
    {
        return $this->animalType;
    }


    public function setAnimalType( $animalType)
    {
        $this->animalType = $animalType;

        return $this;
    }

   

   
    public function getBreed()
    {
        return $this->breed;
    }

    
    public function setBreed($breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of vaccines
     */ 
    public function getVaccines()
    {
        return $this->vaccines;
    }

    /**
     * Set the value of vaccines
     *
     * @return  self
     */ 
    public function setVaccines($vaccines)
    {
        $this->vaccines = $vaccines;

        return $this;
    }

    /**
     * Get the value of video
     */ 
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set the value of video
     *
     * @return  self
     */ 
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get the value of descrip
     */ 
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Set the value of descrip
     *
     * @return  self
     */ 
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }
}
?>