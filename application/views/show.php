<?php
$this->load->view('partials/head');
$this->load->view('partials/nav', ['title' => 'View User']);
$this->load->view('partials/foot');
//var_dump($user);
//var_dump($this->session->userdata());
?>
<div class="container">
<?php if($this->session->userdata('user')['id'] != $user['id']){ ?>
	<div class="row">
		<form class="form-horizontal col-md-8 col-md-offset-2" action="/messages/add_message/<?=$user['id']?>" method="post">
			<h1>Post a Message for <?=$user['first_name']?></h2>
			<textarea class="col-md-12" name="message"></textarea>
			<input class="btn btn-primary" type="submit" value="Post Message">
		</form>
	</div>
<div class="row col-md-8 col-md-offset-2" style="margin-top: 30px">
<?php }
foreach ($messages as $message){ ?>
		<div class="container col-md-12" style="padding-bottom: 30px; border-bottom: solid thin black">
			<h2><span><?=$message['first_name']?> <?=$message['last_name']?></span> wrote:</h2>
			<h4><?=$message['message']?></h4>
			<div class="col-md-8 col-md-offset-3">
			<?php
			$comments = $this->message->get_comments($message['id']);
			foreach ($comments as $comment){  ?>
					<h4><span><?=$comment['first_name']?> <?=$comment['last_name']?></span> replied:</h4>
					<h5><?=$comment['comment']?></h5>
		<?php } ?>
				<form action="/messages/add_comment/<?=$message['id']?>" method="post">
					<h2>Post a Comment</h2>
					<textarea class="col-md-12" name="comment"></textarea>
					<input type="hidden" name="id" value="<?=$user['id']?>">
					<input class="btn btn-info btn-small" type="submit" value="Post Comment">
				</form>
			</div>
		</div>
	<?php } ?>
	</div>
</div>