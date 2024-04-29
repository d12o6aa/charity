<?php

class DBController
{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "charity";
    private $connection;

    public function openConnection()
    {
        $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        if ($this->connection->connect_error)
        {
            echo "Error in connection: " . $this->connection->connect_error;
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
            echo "Error: No active connection to close";
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function select($qry, $params = array())
    {
        $stmt = $this->connection->prepare($qry);
        if (!$stmt) {
            echo "Error in preparing statement: " . $this->connection->error;
            return false;
        }

        // Bind parameters if provided
        if (!empty($params)) {
            $types = str_repeat('s', count($params)); // Assuming all parameters are strings
            $stmt->bind_param($types, ...$params);
        }

        // Execute the statement
        $result = $stmt->execute();

        if (!$result) {
            echo "Error in executing statement: " . $stmt->error;
            $stmt->close();
            return false;
        }

        // Get the result set
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Close statement and return result
        $stmt->close();
        return $data;
    }

    public function insert($qry, $params = array())
    {
        $stmt = $this->connection->prepare($qry);
        if (!$stmt) {
            echo "Error in preparing statement: " . $this->connection->error;
            return false;
        }

        // Bind parameters if provided
        if (!empty($params)) {
            $types = str_repeat('s', count($params)); // Assuming all parameters are strings
            $stmt->bind_param($types, ...$params);
        }

        // Execute the statement
        $result = $stmt->execute();

        if (!$result) {
            echo "Error in executing statement: " . $stmt->error;
            $stmt->close();
            return false;
        }

        // Close statement and return success
        $stmt->close();
        return true;
    }



}

?>
