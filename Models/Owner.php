<?php

namespace Models;

class Owner extends User
{
    
    private  $dni;
   
    public function __construct()
    {
        parent::__construct();
    }

   
    public function getDni()
    {
        return $this->dni;
    }

   
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }
}
?>