<?php
class Feedback{
    private Database $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function addFeedback(array $data): bool
    {
        $this->db->query('INSERT INTO feedbacks (name, email, source, skills, message, rate) VALUES (:name, :email, :source,:skills, :message, :rate)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':source', $data['source']);
        $this->db->bind(':skills', $data['skills']);
        $this->db->bind(':message', $data['message']);
        $this->db->bind(':rate', $data['rate']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}