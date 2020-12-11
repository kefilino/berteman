<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<title>Beranda Berteman</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/style.css">
	<style>body { background-image: url("<?php echo base_url() ?>/assets/img/rain_bokeh.png"); }</style>
</head>

<body>
	<div class="header">
		<a href="<?php echo base_url() ?>" class="logo">berteman</a>
		<input type="text" placeholder="Cari..">
		<div class="header-right">
			<a href="<?php echo base_url() ?>">Home</a>
			<a href="<?php echo base_url() ?>">Notifikasi</a>
			<div class="dropdown">
				<a class="dropbtn" href="#"><?php echo $this->session->userdata('username'); ?></a>
				<div class="dropdown-content">
					<a href="<?php echo base_url('index.php/user/myprofile'); ?>">Profile Saya</a>
					<a href="<?php echo base_url('index.php/home/logout'); ?>">Log Out</a>
				</div>
			</div>
		</div>
	</div>
	<div class="account-wall" style="width: 50vw;">
			<div class="profile">
                <p><img src="<?php echo base_url() . $image?>"></p>
				<label for="title"><h3>Profile Saya</h3></label>
				<label for="username">Username : <?=$user->username?></label><br>
				<label for="fullname">Nama Lengkap : <?=$user->fullname?></label><br>
				<label for="email">Email : <?=$user->email?></label><br>
				<label for="phone">Phone : <?=$user->phone?></label><br>
				<label for="alamat">Alamat : <?=$user->address?></label><br>
			</div>
            <?php if(isset($myprofile)) {
				echo '<a class="btn" href="' .base_url('index.php/user/edit' . '">Edit</a>\'');
			}?>
	</div>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/script.js"></script>
</body>

</html>