<?php 

class DBController
{
    public $dbHost = "localhost";
    public $dbUser = "root";
    public $dbPassword = "";
    public $dbName = "";
    public $connection;

    public function openConnection()
    {
        $this->connection = new mysqli($this->dbHost,$this->dbUser,$this->dbPassword,$this->Name);
        if ($this->connection->connect_error)
        {
            echo "error in connection".$this->connection->connect_error;
            return false;
        }
        else 
        {
            return true;
        }
    }


    public function closeConnection()
    {

        if ($this->connection)
        {
            $this->connection->close();

        }
        else 
        {
            echo " ";
        }
    }

}

?>