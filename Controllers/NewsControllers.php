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

    public function addNews(News $news)
    {
        if ($this->db->openConnection())
        {
            $query = "INSERT INTO news VALUES ('', ?, ?, ?, ?, ?)";
            $params = array(
                $news->getUserId(),
                $news->getDate(),
                $news->getTitle(),
                $news->getNewsDesc(),
                $news->getImg()
            );
            return $this->db->insert($query, $params);
        }
        else
        {
            throw new Exception("Error: Database connection failed");
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            // echo "Error: Database connection failed";
            // return false;
        }
    }


}


?>
