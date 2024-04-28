<?php

require_once '../../Controllers/DBController.php';
require_once '../../Models/news.php';

class AuthController
{
    protected $db;

    public function getNews()
    {
        $this->db = new DBController;
    }

}


?>
