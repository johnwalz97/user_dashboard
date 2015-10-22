<?php
class User extends CI_Model{
    public function login_user($email, $password){
        $query = "SELECT email, first_name, last_name, user_level, id FROM users WHERE email = ? && password = ?";
        $values = array($email, $password);
        return $this->db->query($query, $values)->row_array();
    }

    public function register_user($email, $first_name, $last_name, $password){
        $query = "INSERT INTO users (email, first_name, last_name, password, created_at, updated_at, user_level) VALUES (?, ?, ?, ?, NOW(), NOW(), 1)";
        $values =  array($email, $first_name, $last_name, $password);
        $this->db->query($query, $values);
        $query = "SELECT first_name, last_name, email, user_level, id FROM users WHERE email = ?";
        return $this->db->query($query, $email)->row_array();
    }
    public function get_user_by_id($id){
        $query = "SELECT email, first_name, last_name, password, user_level, id FROM users WHERE id = ?";
        return $this->db->query($query, $id)->row_array();
    }
    public function get_all_users(){
        $query = "SELECT * FROM users";
        return $this->db->query($query)->result_array();
    }
    public function update_user($email, $first_name, $last_name, $user_level, $id){
        $query = "UPDATE users SET email=?, first_name=?, last_name=?, updated_at=NOW(), user_level=? WHERE id=?";
        $values =  array($email, $first_name, $last_name, $user_level, $id);
        $this->db->query($query, $values);
        $query = "SELECT first_name, last_name, email, user_level, id FROM users WHERE email = ?";
        return $this->db->query($query, $email)->row_array();
    }
    public function update_password($password, $id){
        $query = "UPDATE users SET password=? WHERE id=?";
        $values = array($password, $id);
        $this->db->query($query, $values);
    }
}
?>