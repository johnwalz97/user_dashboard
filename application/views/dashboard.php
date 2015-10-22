<?php
$this->load->view('partials/head', ['title' => 'User Dashboard']);
$this->load->view('partials/nav');
$this->load->view('partials/foot');
?>
<div class="container">
	<h1>All Users</h1>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Created At</th>
			<th>User Level</th>
		</tr>
	<?php
		foreach($users as $user){?>
			<tr>
				<td><?=$user['id']?></td>
				<td><a href="/users/show/<?=$user['id']?>"><?=$user['first_name']?> <?=$user['last_name']?></a></td>
				<td><?=$user['email']?></td>
				<td><?=$user['created_at']?></td>
				<td><?=$user['user_level']?></td>
			</tr>
	<?php } ?>
	</table>
</div>