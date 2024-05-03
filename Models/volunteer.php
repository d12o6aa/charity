<?php

class Volunteer
{
    private $id;
    private $name;
    private $email;
    private $subject;
    private $comment;
    private $phone;
    private $location;

    function __construct($id = null, $name = null, $email = null, $subject = null, $comment = null, $phone = null, $location = null)
    {
        $this->id =$id;
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->comment = $comment;
        $this->phone = $phone;
        $this->location = $location;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getLocation()
    {
        return $this->location;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }
}

?>