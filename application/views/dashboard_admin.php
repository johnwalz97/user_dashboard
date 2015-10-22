<?php
$this->load->view('partials/head', ['title' => 'Admin Dashboard']);
$this->load->view('partials/nav');
$this->load->view('partials/foot');
?>
<div class="container">
	<h1>Manage Users</h1>
	<a href="/users/add">Add New</a>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Created At</th>
			<th>User Level</th>
			<th>Actions</th>
		</tr>
	<?php
		foreach($users as $user){?>
			<tr>
				<td><?=$user['id']?></td>
				<td><a href="/users/show/<?=$user['id']?>"><?=$user['first_name']?> <?=$user['last_name']?></a></td>
				<td><?=$user['email']?></td>
				<td><?=$user['created_at']?></td>
				<td><?=$user['user_level']?></td>
				<td><a href="/users/edit/<?=$user['id']?>">Edit | </a>  <a class="btn btn-danger" href="#">Remove</a> </td>
			</tr>
		<div class="confirmation" style="display: none;">
			<h1>Are you sure that you want to delete this user?</h1>
			<p>Name: <?=$user['first_name']?> <?=$user['last_name']?></p>
			<p>Email: <?=$user['email']?></p>
			<form action="/users/delete" method="post">
				<input type="hidden" name="id" value="<?=$user['id']?>">
				<input type="submit" value="Yes.">
				<a href="/users/">No. Go Back</a>
			</form>
		</div>
	<?php } ?>
	</table>
</div>