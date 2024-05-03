<?php

require_once '../../Controllers/DBController.php';
require_once '../../Models/donor.php';
require_once '../../Models/donation.php';
require_once '../../Models/payment.php';

class UserController{
    protected $db;

    public function __construct()
    {
        $this->db = new DBController();
    }


    public function getVolunteer()
    {}

    public function addDonor(Donor $donor)
    {
        try {
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }
            
            $query = "INSERT INTO donor (name, email, city, phone, location, postalCode) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->getConnection()->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }
            
            // Bind parameters
            $name = $donor->getName(); 
            $email = $donor->getEmail();
            $city = $donor->getCity();
            $phone = $donor->getPhone();
            $location = $donor->getLocation();
            $postalCode = $donor->getPostalCode();
            
            $stmt->bind_param("ssssss", $name, $email, $city, $phone, $location, $postalCode);
            
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

    public function addDonation(Donation $donation)
    {
        try {
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }
            
            $query = "INSERT INTO donation (donorId, amount) VALUES (?, ?)";
            $stmt = $this->db->getConnection()->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }
            
            // Bind parameters
            $donorId = $donation->getDonorId();
            $amount = $donation->getAmoun();
            
            $stmt->bind_param("ss", $donorId, $amount);
            
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

    public function addpayment(Payment $payment)
    {
        try {
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }
            
            $query = "INSERT INTO payment (donorId, paypalEmail, paypalPassord, creaditCard, expirtDate, CCV) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->getConnection()->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }
            
            // Bind parameters
            $donorId = $payment->getDonorId();
            $paypalEmail = $payment->getPaypalEmail();
            $paypalPassord = $payment->getPaypalPassord();
            $creaditCard = $payment->getCreaditCard();
            $expirtDate = $payment->getExpirtDate();
            $CCV = $payment->getCCV();
            
            $stmt->bind_param("ssssss", $donorId, $paypalEmail, $paypalPassord, $creaditCard, $expirtDate, $CCV);
            
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