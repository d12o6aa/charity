<?php

class Contact
{
    private $id;
    private $fname;
    private $lname;
    private $email;
    private $message;

    public function __construct($id = null, $fname = null, $lname = null, $email = null, $message = null)
    {
        if($id !== null && $fname !== null && $lname !== null && $email !== null && $message !== null)
        {
            $this->id = $id;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
            $this->message = $message;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFname()
    {
        return $this->fname;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMessage()
    {
        return $this->message;
    }


    // setter 

    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
    
}



?>