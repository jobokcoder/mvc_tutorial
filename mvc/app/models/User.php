<?php

class User
{
    public $name;
    
    public function connect($name)
    {
        $pg_db_host = 'localhost';
        $pg_db_username = 'postgres';
        $pg_db_name = 'postgres';
        $pg_db_password = 'sample241';
        
        try {
            $dsn = "pgsql:host=$pg_db_host;dbname=$pg_db_name;port=5555";
            $pdo = new PDO($dsn, $pg_db_username, $pg_db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare("INSERT INTO test (id, name) VALUES (7, ?)");
            $success = $stmt->execute([$name]);
        } catch (PDOException $pe) {
            die('PDOException : '. $pe->getMessage());
        } catch (Exception $e) {
            echo "Exception : $e";
        }
        
    }
}

?>