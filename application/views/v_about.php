<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <title>About Berteman</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/style.css">
  <style>body { background-image: url("<?php echo base_url() ?>/assets/img/rain_bokeh.png"); }</style>
</head>

<body>
  <div class="header">
    <a href=<?php echo base_url() ?> class="logo">berteman</a>
    <div class="header-right">
      <a href="<?php echo base_url() ?>">Home</a>
      <a class="active" href="<?php echo base_url() ?>index.php/about">About</a>
      <a href="<?php echo base_url() ?>index.php/login">Sign-in</a>
      <a href="<?php echo base_url() ?>index.php/register">Sign-up</a>
    </div>
  </div>

  <div class="account-wall" style="width:90%">
    <h1>Tentang Berteman</h1>
    <p style="font-size:20px;">Berteman adalah situs jejaring sosial dimana anda bisa berinteraksi dengan teman, keluarga, atau orang yang anda kenal.<br>
      Berteman pertama kali dikembangkan pada tahun 2019 oleh mahasiswa Universitas Padjadjaran untuk memenuhi tugas praktikum <br>
      mata kuliah pemrograman website. Berteman adalah ide yang pertama kali muncul saat kami merancang ide untuk memenuhi tugas tersebut</p>
  </div>

  <div class="account-wall" style="width:90%">
    <h1 style="animation: fadein 1s;">Meet Our Team</h1>
    <div class="flex-container">
      <div style="animation: fadein 1s;">
        <img src="<?php echo base_url() ?>/assets/img/28.jpg" style="width:50%; border-radius: 5%;">
        <h4><b>Kefilino Khalifa Filardi</b></h4>
        <p>Front-End Developer, Back-End<br>
          Developer, UI/UX Designer</p>
      </div>

      <div style="animation: fadein 2s;">
        <img src="<?php echo base_url() ?>/assets/img/40.jpg" style="width:50%; border-radius: 5%;">
        <h4><b>Nurul Ma'arif</b></h4>
        <p>Front-End Developer, UI/UX Designer</p>
      </div>

      <div style="animation: fadein 3s;">
        <img src="<?php echo base_url() ?>/assets/img/64.jpg" style="width:50%; border-radius: 5%;">
        <h4><b>Muhammad Zulfikar Ali</b></h4>
        <p>Back-End Developer, UI/UX Designer</p>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/script.js"></script>
</body>

</html>