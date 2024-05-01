<?php
class News
{
    private $id;
    private $categories;
    private $date;
    private $title;
    private $newsDesc;
    private $img;

    public function __construct($id = null, $categories = null, $date = null, $title = null, $newsDesc = null, $img = null)
    {
        // If all arguments are provided, initialize the object with them
        if ($id !== null && $categories !== null && $date !== null && $title !== null && $newsDesc !== null && $img !== null) {
            $this->id = $id;
            $this->categories = $categories;
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

    public function getCategories()
    {
        return $this->categories;
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

    public function setCategories($categories)
    {
        $this->categories = $categories;
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