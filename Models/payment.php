<?php
    class Payment{
        private $id;
        // private $donorId;
        private $paypalEmail;
        private $paypalPassord;
        private $creaditCard;
        private $expirtDate;
        private $CCV;

        function __construct($id = null, $paypalEmail = null, $paypalPassord = null, $creaditCard = null, $expirtDate = null, $CCV = null)
        {
            $this->id = $id;
            // $this->donorId = $donorId;
            $this->paypalEmail = $paypalEmail;
            $this->paypalPassord = $paypalPassord;
            $this->creaditCard = $creaditCard;
            $this->expirtDate = $expirtDate;
            $this->CCV = $CCV;
        }

        public function getId()
        {
            return $this->id;
        }

        // public function getDonorId()
        // {
        //     return $this->donorId;
        // }

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

        // setter method

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
    }
?>