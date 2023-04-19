<?php
class Database {
    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $pass = DB_PASSWORD;
    private string $dbName = DB_NAME;

    private PDO $dbHandler;
    private PDOStatement $statement;
    private string $error;

    public function __construct(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
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

    public function query(string $sql): void{
        $this->statement = $this->dbHandler->prepare($sql);
    }

    public function bind(string $param, mixed $value, mixed $type = null): void
    {
        if (is_null($type)) {
            $type = match (true) {
                is_int($value) => PDO::PARAM_INT,
                is_bool($value) => PDO::PARAM_BOOL,
                is_null($value) => PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };
        }

        $this->statement->bindValue($param, $value, $type);
    }
    public function execute(): bool{
        return $this->statement->execute();
    }

    public function resultSet(): array{
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function singleResultSet(): object | bool{
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    public function rowsCount(): int{
        return $this->statement->rowCount();
    }
}