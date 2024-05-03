<?php
    class Donor{
        private $id;
        private $name;
        private $email;
        private $city;
        private $phone;
        private $location;
        private $postalCode;
        private $paypalEmail;
        private $paypalPassord;
        private $creaditCard;
        private $expirtDate;
        private $CCV;
        private $amoun;
        private $date;

        function __construct($id = null, $name = null, $email = null, $city = null, $phone = null, $location = null, $postalCode = null, $paypalEmail = null, $paypalPassord = null, $creaditCard = null, $expirtDate = null, $CCV = null, $amoun = null, $date = null)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->city = $city;
            $this->phone = $phone;
            $this->location = $location;
            $this->postalCode = $postalCode;
            $this->amoun = $amoun;
            $this->paypalEmail = $paypalEmail;
            $this->paypalPassord = $paypalPassord;
            $this->creaditCard = $creaditCard;
            $this->expirtDate = $expirtDate;
            $this->CCV = $CCV;
            $this->date = $date;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getPhone()
        {
            return $this->phone;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getCity()
        {
            return $this->city;
        }

        public function getLocation()
        {
            return $this->location;
        }

        public function getPostalCode()
        {
            return $this->postalCode;
        }
        public function getPaypalEmail()
        {
            return $this->paypalEmail;
        }

        public function getPaypalPassord()
        {
            return $this->paypalPassord;
        }

        public function getCreaditCard()
        {
            return $this->creaditCard;
        }

        public function getExpirtDate()
        {
            return $this->expirtDate;
        }

        public function getCCV()
        {
            return $this->CCV;
        }
        public function getAmoun()
        {
            return $this->amoun;
        }
        public function getDate()
        {
            return $this->date;
        }

        // setter method

        public function setName($name)
        {
            $this->name = $name;
        }
        public function setPhone($phone)
        {
            $this->phone = $phone;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function setCity($city)
        {
            $this->city = $city;
        }
        public function setLocation($location)
        {
            $this->location = $location;
        }
        public function setPostalCode($postalCode)
        {
            $this->postalCode = $postalCode;
        }
        public function setPaypalEmail($paypalEmail)
        {
            $this->paypalEmail = $paypalEmail;
        }

        public function setPaypalPassord($paypalPassord)
        {
            $this->paypalPassord = $paypalPassord;
        }

        public function setCreaditCard($creaditCard)
        {
            $this->creaditCard = $creaditCard;
        }

        public function setExpirtDate($expirtDate)
        {
            $this->expirtDate = $expirtDate;
        }

        public function setCCV($CCV)
        {
            $this->CCV = $CCV;
        }
        public function setAmount($amoun)
        {
            $this->amoun = $amoun;
        }
        public function setDate($date)
        {
            $this->date = $date;
        }
    }
?>