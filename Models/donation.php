<?php
    class Donor{
        private $id;
        private $amoun;


        function __construct($id = null, $amoun = null)
        {
            $this->id = $id;
            $this->amoun = $amoun;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getAmoun()
        {
            return $this->amoun;
        }


        // setter method

        public function setAmount($amoun)
        {
            $this->amoun = $amoun;
        }

        
    }
?>