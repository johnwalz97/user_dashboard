<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {	
	public function add_message($id){
		$this->message->add_message($id, $this->input->post('message'), $this->session->userdata('user')['id']);
		redirect("/users/show/$id");
	}
	
	public function add_comment($id){
		$goback = $this->input->post('id');
		$this->message->add_comment($id, $this->session->userdata('user')['id'], $this->input->post('comment'));
		redirect("/users/show/$goback");
	}
}