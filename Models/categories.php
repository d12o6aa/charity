<?php
    class Categories{
        private $id;
        private $name;


        function __construct($id = null, $name = null)
        {
            $this->id = $id;
            $this->name = $name;
        }

        public function getId()
        {
            return $this->id;
        }

        

        public function getName()
        {
            return $this->name;
        }


        // setter method

        public function setName($name)
        {
            $this->name = $name;
        }

        
    }
?>