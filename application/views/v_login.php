<html>

<head>
    <title>Login Berteman</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/style.css">
    <style> body {background-image: url("<?php echo base_url() ?>/assets/img/rain_bokeh.png");}</style>
</head>

<body>
    <div class="header">
        <a href="<?php echo base_url() ?>" class="logo">berteman</a>
        <div class="header-right">
            <a href="<?php echo base_url() ?>">Home</a>
            <a href="<?php echo base_url() ?>index.php/about">About</a>
            <a class="active" href="<?php echo base_url() ?>index.php/login">Sign-in</a>
            <a href="<?php echo base_url() ?>index.php/register">Sign-up</a>
        </div>
    </div>
    <div>
        <?php echo (isset($error) ? $error : (isset($success) ? $success : '')); ?>
        <div class="account-wall">
            <h1 style="text-align: center;">Silahkan Login</h1>
            <br>
            <form class="form-signin" method="POST" action="<?php echo base_url() ?>index.php/login">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <?php echo form_error('username'); ?>
                <?php echo form_error('password'); ?>
                <button class="btn btn-lg btn-primary btn-block" name="btn-login" id="btn-login" type="submit">Masuk</button>

                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">Ingat Saya</input>
                </label>
                <a href="<?php echo base_url() ?>index.php/register" class="pull-right new-account">Buat Akun</a>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/script.js"></script>
</body>

</html>