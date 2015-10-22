<?php
$this->load->view('partials/head', ['title' => 'Register']);
$this->load->view('partials/nav');
$this->load->view('partials/foot');
if(!empty(validation_errors())){
	$display = '';
} else {
	$display = 'none';
}
?>
<div class="container">
	<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Register</div>
			</div>  
			<div class="panel-body" >
				<form id="signupform" class="form-horizontal" role="form" action="/welcome/register" method="post">
					<div id="signupalert" style="display:<?=$display?>" class="alert alert-danger">
						<p><?=validation_errors()?></p>
						<span></span>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-3 control-label">Email</label>
						<div class="col-md-9">
							<input type="email" class="form-control" name="email" placeholder="Email Address">
						</div>
					</div>
					<div class="form-group">
						<label for="firstname" class="col-md-3 control-label">First Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="first_name" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="lastname" class="col-md-3 control-label">Last Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="last_name" placeholder="Last Name">
						</div>
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
							<input id="btn-signup" type="submit" class="btn btn-info" value="Sign Up">
						</div>
					</div>
				</form>
			</div>
		</div>
		<p><a href="/welcome/signin_page">Already have an account? Login!</a></p>
	</div>
</div>