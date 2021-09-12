<?php
 session_start();


 $_SESSION['sepet']=isset($_SESSION['sepet']) ? $_SESSION['sepet'] : array();
?>

<!doctype html>
<html lang="tr">
 <head>
 <link rel="stylesheet" href="https://
cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no">
 <title class="text-center baslik pt-4 pb-3">İSTE E-TİCARET PROJESİ</title>
 <link rel="stylesheet" href="https://
cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="content/css/style.css">
 <script type="text/javascript" src="content/js/jquery-3.3.1.min.js"></script>
 <script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 </head>
 <body>
 <div class="container-fluid bg-primary text-white">
 <div class="container">
 <div class="row p-2">
 <div class="col-md-8">
 <span class="text-white">Bu proje Osman Arat Tarafından Hazırlanmıştır</span>
 </div>
 
 <div class="col-md-4 text-right text-white">
 
 <?php
 $girisyapildi=0;
 if(isset($_SESSION["loginkey"])){
    $kadi=$_SESSION["loginkey"];
     
     include'sepetibastir.php';
    
     $urun_sayisi=count($_SESSION['sepet']);
     echo $urun_sayisi;
     $girisyapildi=1;
     }
 else{
   echo'<span> <a  href="uye/giris.php" class="btn btn-secondary btn-lg " tabindex="-1" role="button" aria-disabled="true">Giriş Yap</a></span>';
 }
 ?>
 </div>
 </div>
 </div>
</div>
<?php
if($girisyapildi==1){
include 'usermenu.php';

}

              else{
                
              }?>
<span>

 <div class="container">

 <a class="navbar-brand  baslik" href="index.php">İSTE E-TİCARET</a>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
    <form class="form-inline my-2 my-lg-0" action="urunler.php" method="get"
name="form_ara">
 <input class="form-control mr-sm-2" type="search" placeholder="Ürün
ara..." aria-label="Ara" name="aranan">
 <button class="btn btn-outline-success my-2 my-sm-0"
type="submit">Ara</button>
 </form>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
     
 <a class="nav-link mi" href="index.php">Anasayfa </span></a>      </li>
      <li class="nav-item">
      <a class="nav-link  mi" href="urunler.php">Ürünler</a>
      </li>
      
      <li class="nav-item dropdown  mi">
 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 Kategoriler
 </a>
 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
 <?php
 
 include 'config/iste_vtabani.php';

 $sorgu='select id, kategoriadi from iste_kategoriler order by kategoriadi';
 $stmt = $con->prepare($sorgu); 
 $stmt->execute(); 
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 foreach ($veri as $kayit) { 
 echo "<a class='dropdown-item'
href='urunler.php?id={$kayit["id"]}'>{$kayit["kategoriadi"]}</a>";
 }
?>

 </div>
 </li>
 <li class="nav-item  mi">
 <a class="nav-link" href="hakkimizda.php">Hakkımızda</a>
 </li>

    </ul>
  </div>
</nav>

 
</div>

