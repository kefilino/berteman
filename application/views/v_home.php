<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<title>Beranda Berteman</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css">
	<style>body { background-image: url("<?php echo base_url(); ?>/assets/img/rain_bokeh.png"); }</style>
</head>

<body>
	<div class="header">
		<a href="<?php echo base_url(); ?>" class="logo">berteman</a>
		<?php echo form_open("user/search_user"); ?>
		<input type="text" name="search" placeholder="Cari..">
		<?php echo form_close(); ?>
		<div class="header-right">
			<a href="<?php echo base_url(); ?>">Home</a>
			<a href="<?php echo base_url(); ?>">Notifikasi</a>
			<div class="dropdown">
				<a class="dropbtn" href="#"><?php echo $this->session->userdata('username'); ?></a>
				<div class="dropdown-content">
					<a href="<?php echo base_url('index.php/user/myprofile'); ?>">Profile Saya</a>
					<a href="<?php echo base_url('index.php/home/logout'); ?>">Log Out</a>
				</div>
			</div>
		</div>
	</div>
	<div class="account-wall feeds">
		<form method="POST" action="<?php echo base_url(); ?>index.php/post/add">
			<div class="create-post">
				<label for="text"><h3>Buat Post</h3></label>
				<textarea name="text" id="new-post-text" cols="50" rows="10" placeholder="Apa yang sedang anda pikirkan?"></textarea>
				<button class="btn btn-post" name="btn-post" id="btn-post" type="submit">Kirim</button>
                <?php echo form_error('text'); ?>
			</div>
		</form>
		<?php foreach ((array) $posts as $post) { ?>
			<div class="post">
				<div class="user-detail">
					<img src="<?php echo base_url() . (($post->image) ?: "/assets/img/usr/default.jpg"); ?>" alt="<?php echo $post->author; ?>">
					<h3>
						<a class="fullname" href="<?php echo base_url('index.php/user/')
						 . ($post->author == $this->session->userdata('username') ? 'myprofile' : 'profile/' . $post->author); ?>">
						<?php echo $post->fullname; ?></a>
					</h3>
					<a class="date" href="#"><?php echo $post->date; ?></a>
				</div>
				<div class="post-content">
					<p id="post-text"><?php echo $post->text?></p>
					<div id="<?php echo $post->post_id?>" class="edit-post">
						<form method="POST" action="<?php echo base_url('index.php/post/edit/') . $post->post_id; ?>">
							<textarea name="text" id="new-post-text" cols="50" rows="5"><?php echo $post->text?></textarea>
							<button class="btn" name="btn-edit" id="btn-edit" type="submit">Edit</button>
							<?php echo form_error('text'); ?>
						</form>
					</div>
					<a href="#">like</a>
					<span class="dot"></span>
					<a href="#">comment</a>
					<?php echo (($user['username'] == $post->author || $user['username'] == 'admin') ? '<span class="dot"></span>' : '' ); ?>
					<a href="#" id="post-edit">
						<?php echo (($user['username'] == $post->author) ? 'edit' : '' ); ?>
					</a>
					<?php echo (($user['username'] == $post->author) ? '<span class="dot"></span>' : '' ); ?>
					<a href="<?php echo base_url('index.php/post/delete/') . $post->post_id; ?>">
						<?php echo (($user['username'] == $post->author || $user['username'] == 'admin') ? 'delete' : '' ); ?>
					</a>
				</div>
			</div>
		<?php }?>
	</div>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/script.js"></script>
</body>

</html>