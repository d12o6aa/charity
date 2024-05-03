<?php

require_once '../../Controllers/DBController.php';
require_once '../../Models/user.php';


class AuthController
{
    protected $db;

    public function login(User $user)
    {
        $this->db = new DBController;
        if ($this->db->openConnection())
        {
            $query = "SELECT * FROM user WHERE email = ? AND password = ?";
            $params = array($user->getEmail(), $user->getPassword());
            $result = $this->db->select($query, $params);
            
            if ($result === false)
            {
                echo "error in query";
                return false;
            }
            else
            {
                if(count($result) == 0)
                {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    
                    $_SESSION["errMsg"]="You have entered wrong email or password";
                    return false;
                }
                else 
                {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    
                    $_SESSION["userId"]=$result[0]["id"];
                    $_SESSION["userEmail"]=$result[0]["email"];
                    return true;
                }
            }
        }
        else
        {
            echo "error in Database connection";
            return false;
        }
    }

    // Inside your AuthController class
    public function getUserById($userId)
    {
        try {
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }

            $query = "SELECT * FROM user WHERE id = ?";
            $stmt = $this->db->getConnection()->prepare($query);

            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }

            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_object("User");
                return $user;
            } else {
                throw new Exception("User not found");
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        } finally {
            $stmt->close(); 
            $this->db->closeConnection();
        }
    }



    public function edit($userId, User $user)
    {
        try {
            // Open database connection
            if (!$this->db->openConnection()) {
                throw new Exception("Error: Database connection failed");
            }

            // Prepare update query
            $query = "UPDATE user SET password = ? WHERE id = ?";
            $stmt = $this->db->getConnection()->prepare($query);

            // Check if the statement was prepared successfully
            if (!$stmt) {
                throw new Exception("Error in preparing statement: " . $this->db->getConnection()->error);
            }

            // Bind parameters
            $password = $user->getPassword();
            $stmt->bind_param("si", $password, $userId);

            // Execute the statement
            $result = $stmt->execute();

            // Check if the query executed successfully
            if ($result) {
                return true;
            } else {
                throw new Exception("Error in executing statement: " . $stmt->error);
            }
        } catch (Exception $e) {
            // Handle or log the error
            echo "Error: " . $e->getMessage();
            return false;
        } finally {
            // Close the statement and database connection
            if (isset($stmt)) {
                $stmt->close();
            }
            $this->db->closeConnection();
        }
    }



}


?>
