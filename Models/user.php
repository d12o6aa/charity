<?php
class User
{
    private $id;
    private $email;
    private $password;

    public function __construct($id = null, $email = null, $password = null)
    {
        // If all arguments are provided, initialize the object with them
        if ($id !== null && $email !== null && $password !== null) {
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
        }
    }

    // Getter methods
    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    // Setter methods
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    // You can add other methods as needed, such as validation methods, etc.
}

?>