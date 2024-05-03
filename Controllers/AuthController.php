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

    public function getVolunteer()
    {}

    public function makeDonation()
    {
    }

}


?>
