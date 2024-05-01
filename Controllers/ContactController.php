<?php

require_once '../../Controllers/DBController.php';
require_once '../../Models/contact.php';

class ContactControllers
{
    protected $db;

    public function __construct()
    {
        $this->db = new DBController();
    }

    public function addContact(Contact $contact)
    {
        try {
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }
            
            $query = "INSERT INTO contact (fname, lname, email, message) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->getConnection()->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }
            
            // Bind parameters
            $fname = $contact->getFname();
            $lname = $contact->getLname();
            $email = $contact->getEmail();
            $message = $contact->getMessage();
            
            $stmt->bind_param("ssss", $fname, $lname, $email, $message);
            
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
