<?php

require_once '../../Controllers/DBController.php';
require_once '../../Models/news.php';

class NewsControllers
{
    protected $db;

    public function __construct()
    {
        $this->db = new DBController();
    }

    public function getNews()
    {
        if ($this->db->openConnection())
        {
            $query = "SELECT * FROM news";
            $result = $this->db->select($query);
            $this->db->closeConnection(); // Close connection after fetching data
            return $result;
        }
        else
        {
            echo "Error in database connection";
            return false;
        }
    }

    public function addNews(News $news)
    {
        try {
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }
            
            $query = "INSERT INTO news (userId, date, title, newsDesc, img) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->getConnection()->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }
            
            // Bind parameters
            $userId = $news->getUserId();
            $date = $news->getDate();
            $title = $news->getTitle();
            $newsDesc = $news->getNewsDesc();
            $img = $news->getImg();
            
            $stmt->bind_param("sssss", $userId, $date, $title, $newsDesc, $img);
            
            // Execute the statement
            $result = $stmt->execute();
            
            // Check if the query executed successfully
            if ($result) {
                return true;
            } else {
                throw new Exception("Error in executing statement: " . $stmt->error);
            }
        } catch (Exception $e) {
            // Handle or log the error appropriately
            echo "Error: " . $e->getMessage();
            return false;
        } finally {
            $stmt->close(); // Close the statement
            $this->db->closeConnection(); // Ensure connection is always closed
        }
    }

}

?>
