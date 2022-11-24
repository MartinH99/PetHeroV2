<?php
        namespace Models;
        use Models\User as User;

class Keeper extends User
{
        
        private  $cuil;
        private  $availStart;
        private  $availEnd;
        private $interval;
        private  $price;
        private $stars;
        private $typeKeep;

        public function __construct()
        {
                parent::__construct();
        }


        /**
         * Get the value of cuil
         */ 
        public function getCuil()
        {
                return $this->cuil;
        }

        /**
         * Set the value of cuil
         *
         * @return  self
         */ 
        public function setCuil($cuil)
        {
                $this->cuil = $cuil;

                return $this;
        }

        /**
         * Get the value of availStart
         */ 
        public function getAvailStart()
        {
                return $this->availStart;
        }

        /**
         * Set the value of availStart
         *
         * @return  self
         */ 
        public function setAvailStart($availStart)
        {
                $this->availStart = $availStart;

                return $this;
        }

        /**
         * Get the value of availEnd
         */ 
        public function getAvailEnd()
        {
                return $this->availEnd;
        }

        /**
         * Set the value of availEnd
         *
         * @return  self
         */ 
        public function setAvailEnd($availEnd)
        {
                $this->availEnd = $availEnd;

                return $this;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

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
         * Get the value of typeKeep
         */ 
        public function getTypeKeep()
        {
                return $this->typeKeep;
        }

        public function getTypeKeep2()
        {
                switch($this->typeKeep)
                {
                     case 1:
                        $this->typeKeep = 'small';
                        break;
                        
                        case 2:
                                $this->typeKeep = 'medium';
                                break;

                                case 3:
                                        $this->typeKeep = 'large';
                                        break;

                }
                return $this->typeKeep;
        }

        /**
         * Set the value of typeKeep
         *
         * @return  self
         */ 
        public function setTypeKeep($typeKeep)
        {
                $this->typeKeep = $typeKeep;

                return $this;
        }
}
?>