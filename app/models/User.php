<?php
class User {
    private Database $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function userRegister(array $data): bool{
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function userLogin(string $email, string $password): object | bool{
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->singleResultSet();
        $dbPassword = $row->password;
        if(password_verify($password, $dbPassword)){
            return $row;
        } else {
            return false;
        }
    }


    public function findUserByEmail(string $email): bool{
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->singleResultSet();

        if($this->db->rowsCount() > 0){
            return true;
        } else {
            return false;
        }
    }
}
