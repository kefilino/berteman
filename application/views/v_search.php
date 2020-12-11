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
					<a href="<?php echo base_url() . 'user/myprofile'; ?>">Profile Saya</a>
					<a href="<?php echo base_url() . 'home/logout'; ?>">Log Out</a>
				</div>
			</div>
		</div>
	</div>
	<div class="account-wall feeds">
		<h1><?php echo (empty($records) ? $error : ''); ?></h1>
		<?php foreach ((array) $records as $user) { ?>
			<div class="user-detail">
				<img src="<?php echo base_url() . (($user->image) ?: "/assets/img/usr/default.jpg"); ?>" alt="<?php echo $user->fullname; ?>">
				<h3><a class="fullname" href="#"><?php echo $user->fullname; ?></a></h3>
				<a href="<?php echo base_url('index.php/user/add_friend/') . $user->username; ?>">tambahkan sebagai teman</a>
				<span class="dot"></span>
				<a href="#">lihat profil</a>
			</div>
		<?php }?>
	</div>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/script.js"></script>
</body>

</html>