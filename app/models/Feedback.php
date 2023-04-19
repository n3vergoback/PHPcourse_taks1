<?php
class Feedback{
    private Database $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function addFeedback(array $data): bool
    {
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}