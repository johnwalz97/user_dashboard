<?php
$this->load->view('partials/head', ['title' => 'Welcome']);
$this->load->view('partials/nav');
$this->load->view('partials/foot');
?>
<div class="container">
	<div class="jumbotron">
		<h1>Welcome to the User Dashboard</h1>
		<p>We're going to build a cool application using a MVC framework! This application was built with Bootstrap and Code Igniter Framework!</p>
		<a href="/users/" class="btn btn-primary btn-lg">Start</a>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				 <div class="panel-heading">
					<h3>Manage Users</h1>
				</div>
				<div class="panel-body">
					<p>Using this application, users can be added, edited, given different priveleges, and removed.</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Leave messages</h1>
				</div>
				<div class="panel-body">
					<p>Users can leave messages to other users and comment on other people's messages.</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Edit User Information</h1>
				</div>	
				<div class="panel-body">	
					<p>Admins can edit other user's information (email address, first name, last name, etc.).</p>
				</div>
			</div>
		</div>
	</div>
</div>