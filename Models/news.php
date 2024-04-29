<?php
class News
{
    private $id;
    private $userId;
    private $date;
    private $title;
    private $newsDesc;
    private $img;

    public function __construct($id = null, $userId = null, $date = null, $title = null, $newsDesc = null, $img = null)
    {
        // If all arguments are provided, initialize the object with them
        if ($id !== null && $userId !== null && $date !== null && $title !== null && $newsDesc !== null && $img !== null) {
            $this->id = $id;
            $this->userId = $userId;
            $this->date = $date;
            $this->title = $title;
            $this->newsDesc = $newsDesc;
            $this->img = $img;
        }
    }

    // Getter methods
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function getNewsDesc()
    {
        return $this->newsDesc;
    }

    public function getImg()
    {
        return $this->img;
    }


    // Setter methods

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setNewsDesc($newsDesc)
    {
        $this->newsDesc = $newsDesc;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }

    // You can add other methods as needed, such as validation methods, etc.
}

?>