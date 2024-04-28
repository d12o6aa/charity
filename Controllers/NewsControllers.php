<?php

require_once '../../Controllers/DBController.php';
require_once '../../Models/news.php';

class NewsControllers
{
    protected $db;

    public function getNews()
    {
        $this->db = new DBController;
        if ($this->db->openConnection())
        {
            $query = "SELECT * FROM news";
            return $this->db->select($query);
        }
        else
        {
            echo "error in Database connection";
            return false;
        }
    }

}


?>
