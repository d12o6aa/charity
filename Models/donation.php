<?php
    class Donation{
        private $id;
        private $amoun;
        // private $donorId;


        function __construct($id = null, $amoun = null)
        {
            $this->id = $id;
            // $this->donorId = $donorId;
            $this->amoun = $amoun;
        }

        public function getId()
        {
            return $this->id;
        }

        // public function getDonorId()
        // {
        //     return $this->donorId;
        // }

        public function getAmoun()
        {
            return $this->amoun;
        }


        // setter method

        public function setAmount($amoun)
        {
            $this->amoun = $amoun;
        }

        // public function setDonorId($donorId)
        // {
        //     $this->donorId = $donorId;
        // }

        
    }
?>