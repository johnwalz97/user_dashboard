<?php
if(!empty($this->session->userdata('user'))){
	$button = 'Log Out';
    $profile = '<li><a href="/users/edit_profile">Profile</a></li>';
    $message = "<li><a href='/users/show/".$this->session->userdata('user')['id']."'>Messages</a></li>";
}
else {
	$button = 'Sign In';
    $profile = '';
    $message = '';
}
?>
<nav class="navbar navbar-default" style="border-bottom: solid thin black;">
    <div class="container">
        <div class="navbar-header">
            <a class="active navbar-brand" href="/">User Dashboard</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="/users/">Home</a></li>
            <?=$profile?>
            <?=$message?>
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li class="pull-right"><a href="/welcome/signin_page"><?=$button?></a></li>
        </ul>
    </div>
</nav>