<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index(){
		$users = $this->user->get_all_users();
		if(!empty($this->session->userdata('user'))){
			if ($this->session->userdata('user')['user_level'] == 1){
				$this->load->view('dashboard', ['users' => $users]);
			}
			else{
				$this->load->view('dashboard_admin', ['users' => $users]);
			}
		}
		else{
			redirect("/welcome/signin_page");
		}
	}
	
	public function add(){
		if(!empty($this->session->userdata('user'))){
			$this->load->view('new');
		}
		else{
			redirect("/welcome/signin_page");
		}
	}
	
	public function create(){
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Confirm Password', 'required');
		if ($this->form_validation->run() == FALSE){
			redirect("/users/add");
		}
		else{
			$this->user->register_user($this->input->post('email'), $this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('password'));
			redirect("/users/");			
		}
	}
	
	public function edit_profile(){
		if(!empty($this->session->userdata('user'))){
			$user = $this->user->get_user_by_id($this->session->userdata('user')['id']);
			$this->load->view('edit', ['user' => $user]);
		}
	}
	
	public function edit($id){
		if(!empty($this->session->userdata('user'))){
			if ($this->session->userdata('user')['user_level'] == 1){
				$user = $this->users->get_user_by_id($id);
				$this->load->view('edit', ['user' => $user]);
			}
			else{
				$user = $this->user->get_user_by_id($id);
				$this->load->view('edit_admin', ['user' => $user]);
			}
		}
		else{
			redirect("/welcome/signin_page");
		}
	}
	public function update($id){
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if ($this->form_validation->run() == FALSE){
			$referred_from = $this->session->userdata('referred_from');
			redirect($referred_from, 'refresh');
		}
		else{
			$user = $this->user->update_user($this->input->post('email'), $this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('user_level'), $id);
			if($this->session->userdata('user')['id'] == $user['id']){
				$this->session->set_userdata('user', $user);
			}
			redirect("/users/");			
		}		
	}
	public function show($id){
		if(!empty($this->session->userdata('user'))){
			$user = $this->user->get_user_by_id($id);
			$messages = $this->message->get_messages($id);
			$this->load->view('show', ['user' => $user, 'messages' => $messages]);
		}
		else{
			redirect("/welcome/signin_page");
		}
	}
	public function update_password($id){
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Confirm Password', 'required');
		if ($this->form_validation->run() == FALSE){
			$referred_from = $this->session->userdata('referred_from');
			$this->session->set_flashdata('errors', validation_errors());
			redirect($referred_from, 'refresh');
		}
		else{
			$user = $this->user->update_password($this->input->post('password'), $id);
			redirect("/users/");			
		}	
	}
}