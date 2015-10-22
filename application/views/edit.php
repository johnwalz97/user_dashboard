<?php
$this->load->view('partials/head', ['title' => 'Edit Profile']);
$this->load->view('partials/nav');
$this->load->view('partials/foot');
$this->session->set_userdata('referred_from', current_url());
if(!empty(validation_errors())){
	$display = '';
} else {
	$display = 'none';
}
if(!empty($this->session->flashdata('errors'))){
	$display = '';
} else {
	$display = 'none';
}
?>
<div class="container">
	<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Edit User Profile</div>
			</div>  
			<div class="panel-body" >
				<form id="signupform" class="form-horizontal" role="form" action="/users/update/<?=$user['id']?>" method="post">
					<input type="hidden" name="user_level" value="<?=$this->session->userdata('user')['user_level']?>">
					<div id="signupalert" style="display:<?=$display?>" class="alert alert-danger">
						<p><?=validation_errors()?></p>
						<span></span>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-3 control-label">Email Address</label>
						<div class="col-md-9">
							<input type="email" class="form-control" name="email" value="<?=$user['email']?>">
						</div>
					</div>
					<div class="form-group">
						<label for="firstname" class="col-md-3 control-label">First Name:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="first_name" value="<?=$user['first_name']?>">
						</div>
					</div>
					<div class="form-group">
						<label for="lastname" class="col-md-3 control-label">Last Name:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="last_name" value="<?=$user['last_name']?>">
						</div>
					</div>
					<div class="form-group">
						<!-- Button -->                                        
						<div class="col-md-offset-3 col-md-9">
							<input id="btn-signup" type="submit" class="btn btn-info" value="Save">
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
		<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">Change Password</div>
				</div>  
				<div class="panel-body" >
					<form class="form-horizontal" role="form" action="/users/update_password/<?=$user['id']?>" method="post">
						<div id="signupalert" style="display:<?=$display?>" class="alert alert-danger">
							<p><?=$this->session->flashdata('errors')?></p>
							<span></span> 
						</div>
						<div class="form-group">
							<label for="password" class="col-md-3 control-label">Password</label>
							<div class="col-md-9">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-md-3 control-label">Confirm Password</label>
							<div class="col-md-9">
								<input type="password" class="form-control" name="passconf" placeholder="Confirm Password">
							</div>
						</div>
						<div class="form-group">
							<!-- Button -->                                        
							<div class="col-md-offset-3 col-md-9">
								<input id="btn-signup" class="btn btn-info" type="submit" value="Update Password">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
