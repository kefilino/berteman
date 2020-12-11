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
    
    <?php echo (isset($success) ? $success : (isset($error) ? $error : '')); ?>

    <div style="margin-top: 30 px">
        <div class="account-wall" style="width: 40%">
            <h1 style="text-align: center">Edit Profil</h1>
            <form class="form-edit" method="POST" action="<?php echo base_url('index.php/user/edit'); ?>">
                <div class="form-group">
                    <label for="fullname">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user->username; ?>">
                    <?php echo form_error('username'); ?>
                </div>

                <div class="form-group">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" value="<?php echo $user->fullname; ?>">
                    <?php echo form_error('fullname'); ?>
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" class="form-control" name="address" placeholder="Alamat" value="<?php echo $user->address; ?>">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <?php echo form_error('password'); ?>
                </div>

                <div class="form-group">
                    <label for="passconf">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="passconf" placeholder="Konfirmasi password">
                    <?php echo form_error('passconf'); ?>
                </div>

                <button type="submit" class="btn btn-outline-primary">Update Profil</button>
                <button type="submit" class="btn btn-outline-primary" style="background-color: red">Hapus Akun</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/script.js"></script>
</body>
</html>