<!doctype html>
<html lang="tr">
<head>
<?php
 session_start();
 if ($_SESSION["loginkey"] == "") {
 header("Location: /iste_eticaret/uye/giris.php");
 }
?>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>İSTE E-TİCARET PROJESİ</title>

 <link rel="stylesheet" href="/iste_eticaret/content/css/bootstrap.min.css" />
 <link rel="stylesheet" href="/iste_eticaret/content/css/style.css" />
</head>
<body class="uye">
  <nav class="navbar navbar-default navbar-fixed-top">
 <div class="container ">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" datatoggle="collapse" data-target="#navbar" aria-expanded="false" ariacontrols="navbar">
 <span class="sr-only">Navigasyon bar</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 </div>
 </div>
 <div id="navbar" class="navbar-collapse collapse">
     <a class="navbar-brand  baslik" href="index.php">İSTE E-TİCARET</a>
 <ul class="nav navbar-nav">

 <?php $aktif_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
 <li <?php echo((strpos($aktif_link, 'index') !== false) ?
'class="active"' : ''); ?>><a href="/iste_eticaret/index.php">Anasayfa</a></li>
<li <?php echo((strpos($aktif_link, 'siparisler/') !== false) ?
'class="active"' : ''); ?>><a href="/iste_eticaret/uye/profilim.php">Profilim</a></li>
<li <?php echo((strpos($aktif_link, 'siparisler/') !== false) ?
'class="active"' : ''); ?>><a href="/iste_eticaret/uye/siparisler/siparislistesi.php">Siparişler</a></li>
 <ul class="nav navbar-nav navbar-right">
 <li><a href="/iste_eticaret/uye/giris.php?cikis=1">Oturumu kapat</a></li>
 </ul>
 </div>
 </div>
 </nav>
