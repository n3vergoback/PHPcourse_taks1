<?php
class User {
    private Database $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function isUniqueUser(string $email): bool{
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
