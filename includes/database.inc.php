<?php
class Database
{

    public function get_connection()
    {
        try
        {
            $conn = new PDO("mysql:host=localhost;dbname=szantog82", "root" , "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed to db: " . $e->getMessage();
        }

        return $conn;
    }

}

?>