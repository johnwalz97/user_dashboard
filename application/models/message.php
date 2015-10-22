<?php
class Message extends CI_Model{
    public function get_messages($id){
        $query = "SELECT messages.id, messages.user_id, messages.message, messages.created_at, users.first_name, users.last_name FROM messages LEFT JOIN users ON messages.author_id = users.id WHERE messages.user_id = ? ORDER BY messages.id DESC";
        return $this->db->query($query, $id)->result_array();
    }
    public function get_comments($message_id){
        $query = "SELECT comments.comment, users.first_name, users.last_name, comments.created_at FROM comments LEFT JOIN users ON comments.user_id = users.id WHERE comments.message_id = ?";
        return $this->db->query($query, $message_id)->result_array();
    }
    
    public function add_message($id, $message, $author){
        $query = "INSERT INTO messages (message, created_at, user_id, author_id) VALUES (?, NOW(), ?, ?)";
        $values = array($message, $id, $author);
        $this->db->query($query, $values);
    }
    public function add_comment($id, $author, $comment){
        $query = "INSERT INTO comments (comment, created_at, message_id, user_id) VALUES (?, NOW(), ?, ?)";
        $values = array($comment, $id, $author);
        $this->db->query($query, $values);
    }
}
?>