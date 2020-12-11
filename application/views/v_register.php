<!doctype html>

<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/style.css">
	<style> body {background-image: url("<?php echo base_url() ?>/assets/img/rain_bokeh.png");}</style>
</head>

<body>
	<div class="header">
		<a href="<?php echo base_url() ?>" class="logo">berteman</a>
		<div class="header-right">
			<a href="<?php echo base_url() ?>">Home</a>
			<a href="<?php echo base_url() ?>index.php/about">About</a>
			<a href="<?php echo base_url() ?>index.php/login">Sign-in</a>
			<a class="active" href="<?php echo base_url() ?>index.php/register">Sign-up</a>
		</div>
	</div>
	<div style="margin-top: 30px">
		<?php if (isset($error)) {
			echo $error;
		}; ?>
		<div class="account-wall" style="width: 40%">

			<h1 style="text-align: center;">Silahkan Daftar</h1>

			<form class="form-signup" method="POST" action="<?php echo base_url() ?>index.php/register/submit">

				<div class="form-group">
					<input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap"
					value="<?php echo ( isset( $_POST['fullname'] ) ? $_POST['fullname'] : '' ); ?>" autofocus>
					<?php echo form_error('fullname'); ?>
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="email" placeholder="Email"
					value="<?php echo ( isset( $_POST['email'] ) ? $_POST['email'] : '' ); ?>" autofocus>
					<?php echo form_error('email'); ?>
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="phone" placeholder="Nomor Telepon"
					value="<?php echo ( isset( $_POST['phone'] ) ? $_POST['phone'] : '' ); ?>" autofocus>
					<?php echo form_error('phone'); ?>
				</div>
				
				<div class="form-group">
					<input type="text" class="form-control" name="address" placeholder="Alamat"
					value="<?php echo ( isset( $_POST['address'] ) ? $_POST['address'] : '' ); ?>" autofocus>
					<?php echo form_error('address'); ?>
				</div>

				<?php echo form_open_multipart('upload/do_upload');?>
				<div class="form-group">
					<label for="profile_pic">Foto Profil</label>
					<input name="profile_pic" type="file" class="form-control-file">
				</div>

				<div class="from-group">
					<input type="text" class="form-control" name="username" placeholder="Username"
					value="<?php echo ( isset( $_POST['username'] ) ? $_POST['username'] : '' ); ?>" autofocus>
					<?php echo form_error('username'); ?>
				</div>

				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password">
					<?php echo form_error('password'); ?>
				</div>

				<div class="form-group">
					<input type="password" class="form-control" name="passconf" placeholder="Konfirmasi Password">
					<?php echo form_error('passconf'); ?>
				</div>

				<button type="submit" class="btn btn-outline-primary">Daftar Sekarang</button>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/script.js"></script>
</body>

</html>