<?php
class Database {
    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $pass = DB_PASSWORD;
    private string $dbName = DB_NAME;

    private $dbHandler;
    private string $statement;
    private string $error;

    public function __construct(){
        $dsn = 'mysqli:host=' . $this->host . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try{
            $this->dbHandler = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
}