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


    public function addVolunteer(Volunteer $volunteer)
    {
        try {
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }
            
            $query = "INSERT INTO volunteer (name, email, subject, comment, phone, location) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->getConnection()->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }
            
            // Bind parameters
            // $donorId = $payment->getDonorId();
            $name = $volunteer->getName();
            $email = $volunteer->getEmail();
            $subject = $volunteer->getSubject();
            $comment = $volunteer->getComment();
            $phone = $volunteer->getPhone();
            $location = $volunteer->getLocation();
            
            $stmt->bind_param("ssssss", $name, $email, $subject, $comment, $phone, $location);
            
            // Execute the statement
            $result = $stmt->execute();
            
            // Check if the query executed successfully
            if ($result) {
                return true;
            } else {
                throw new Exception("in Payment Error in executing statement: " . $stmt->error);
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

    public function addDonor(Donor $donor)
    {
        try {
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }
            
            $query = "INSERT INTO donor (name, email, city, phone, location, postalCode, paypalEmail, paypalPassord, creaditCard, expirtDate, CCV, amount, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
            $paypalEmail = $donor->getPaypalEmail();
            $paypalPassord = $donor->getPaypalPassord();
            $creaditCard = $donor->getCreaditCard();
            $expirtDate = $donor->getExpirtDate();
            $CCV = $donor->getCCV();
            $amount = $donor->getAmoun();
            $date = $donor->getDate();
            
            $stmt->bind_param("sssssssssssss", $name, $email, $city, $phone, $location, $postalCode, $paypalEmail, $paypalPassord, $creaditCard, $expirtDate, $CCV, $amount, $date);
            
            // Execute the statement
            $result = $stmt->execute();
            
            // Check if the query executed successfully
            if ($result) {
                return true;
            } else {
                throw new Exception("in Donor Error in executing statement: " . $stmt->error);
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

    // public function addDonation(Donation $donation)
    // {
    //     try {
    //         if (!$this->db->openConnection()) {
    //             throw new Exception("Error: Database connection failed");
    //         }
            
    //         $query = "INSERT INTO donation (amount) VALUES (?)";
    //         $stmt = $this->db->getConnection()->prepare($query);
            
    //         if (!$stmt) {
    //             throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
    //         }
            
    //         // Bind parameters
    //         // $donorId = $donation->getDonorId();
    //         $amount = $donation->getAmoun();
            
    //         $stmt->bind_param("s", $amount);
            
    //         // Execute the statement
    //         $result = $stmt->execute();
            
    //         // Check if the query executed successfully
    //         if ($result) {
    //             return true;
    //         } else {
    //             throw new Exception("in Donation Error in executing statement: " . $stmt->error);
    //         }
    //     } catch (Exception $e) {
    //         // Handle or log the error appropriately
    //         echo "Error: " . $e->getMessage();
    //         return false;
    //     } finally {
    //         $stmt->close(); // Close the statement
    //         $this->db->closeConnection(); // Ensure connection is always closed
    //     }
    // }

    // public function addpayment(Payment $payment)
    // {
    //     try {
    //         if (!$this->db->openConnection()) {
    //             throw new Exception("Error: Database connection failed");
    //         }
            
    //         $query = "INSERT INTO payment (paypalEmail, paypalPassord, creaditCard, expirtDate, CCV) VALUES (?, ?, ?, ?, ?)";
    //         $stmt = $this->db->getConnection()->prepare($query);
            
    //         if (!$stmt) {
    //             throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
    //         }
            
    //         // Bind parameters
    //         // $donorId = $payment->getDonorId();
    //         $paypalEmail = $payment->getPaypalEmail();
    //         $paypalPassord = $payment->getPaypalPassord();
    //         $creaditCard = $payment->getCreaditCard();
    //         $expirtDate = $payment->getExpirtDate();
    //         $CCV = $payment->getCCV();
            
    //         $stmt->bind_param("sssss", $paypalEmail, $paypalPassord, $creaditCard, $expirtDate, $CCV);
            
    //         // Execute the statement
    //         $result = $stmt->execute();
            
    //         // Check if the query executed successfully
    //         if ($result) {
    //             return true;
    //         } else {
    //             throw new Exception("in Payment Error in executing statement: " . $stmt->error);
    //         }
    //     } catch (Exception $e) {
    //         // Handle or log the error appropriately
    //         echo "Error: " . $e->getMessage();
    //         return false;
    //     } finally {
    //         $stmt->close(); // Close the statement
    //         $this->db->closeConnection(); // Ensure connection is always closed
    //     }
    // }

    public function getVolunteer()
    {
        if ($this->db->openConnection())
        {
            $query = "SELECT * FROM volunteer";
            $result = $this->db->select($query);
            $this->db->closeConnection(); 
            return $result;
        }
        else
        {
            echo "Error in database connection";
            return false;
        }
    }

    public function getDonor()
    {
        if ($this->db->openConnection())
        {
            $query = "SELECT * FROM donor";
            $result = $this->db->select($query);
            $this->db->closeConnection(); 
            return $result;
        }
        else
        {
            echo "Error in database connection";
            return false;
        }
    }
}

?>