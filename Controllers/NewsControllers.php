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
    public function getcategories()
    {
        if ($this->db->openConnection())
        {
            $query = "SELECT * FROM categories";
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
            
            $query = "INSERT INTO news (categories, date, title, newsDesc, img) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->getConnection()->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }
            
            // Bind parameters
            $categories = $news->getCategories(); // Corrected variable name
            $date = $news->getDate();
            $title = $news->getTitle();
            $newsDesc = $news->getNewsDesc();
            $img = $news->getImg();
            
            $stmt->bind_param("sssss", $categories, $date, $title, $newsDesc, $img);
            
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

    public function addCategories(Categories $categories)
    {
        try {
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }
            
            $query = "INSERT INTO categories (name) VALUES (?)";
            $stmt = $this->db->getConnection()->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }
            
            // Bind parameters
            $categorie = $categories->getName(); 
            
            
            $stmt->bind_param("s", $categorie);
            
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



    public function deleteNews($newsId)
    {
        try {
            // Open database connection
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }
            
            // Prepare delete query
            $query = "DELETE FROM news WHERE id = ?";
            $stmt = $this->db->getConnection()->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }
            
            // Bind parameter
            $stmt->bind_param("i", $newsId);
            
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


    public function editNews(News $news)
    {
        try {
            // Open database connection
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }
            
            // Prepare update query
            $query = "UPDATE news SET categories = ?, date = ?, title = ?, newsDesc = ?, img = ? WHERE id = ?";
            $stmt = $this->db->getConnection()->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }
            
            // Bind parameters
            $categories = $news->getCategories();
            $date = $news->getDate();
            $title = $news->getTitle();
            $newsDesc = $news->getNewsDesc();
            $img = $news->getImg();
            $id = $news->getId(); // Assuming you have a method to retrieve the news ID
            
            $stmt->bind_param("sssssi", $categories, $date, $title, $newsDesc, $img, $id);
            
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
