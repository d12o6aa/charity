<?php
    class Donor{
        private $id;
        private $name;
        private $email;
        private $city;
        private $phone;
        private $location;
        private $postalCode;

        function __construct($id = null, $name = null, $email = null, $city = null, $phone = null, $location = null, $postalCode = null)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->city = $city;
            $this->phone = $phone;
            $this->location = $location;
            $this->postalCode = $postalCode;
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
    }
?>