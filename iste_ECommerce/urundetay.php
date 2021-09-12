<?php include "header.php"; ?>
 <?php
 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Kayıt bulunamadı.');

 include 'config/iste_vtabani.php';

 
 try {
 
 $sorgu = "SELECT iste_urunler.*, iste_kategoriler.kategoriadi FROM iste_urunler LEFT JOIN
iste_kategoriler ON iste_urunler.kategori_id = iste_kategoriler.id WHERE iste_urunler.id = ?";
 $stmt = $con->prepare( $sorgu ); 
 $stmt->bindParam(1, $id); 
 $stmt->execute();
 $kayit = $stmt->fetch(PDO::FETCH_ASSOC); 
 extract($kayit);
 }
 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
?>
 <div class="container mt-4 mb-4">
 <div class="row">
 <div class="col-md-6">
 <?php echo $resim ? "<img src='content/images/{$resim}' alt='{$urunadi}'
class='img-fluid rounded' />":"Ürün görseli yok."; ?>

 </div>
 <div class="col-md-6">
 <h2 class="baslik"><?php echo $urunadi ?></h2>
<h5 class="text-success"><?php echo $fiyat ?>&#8378;</h2><hr>
<p class="mb-5"><?php echo $aciklama ?></p>
<h6 class="text-info">Ürünün stoklarımıza girişi: <?php echo date("d-m-Y",
strtotime($giris_tarihi)) ?></h6>
<h6 class="text-warning">En son bilgi güncelleme: <?php echo date("d-m-Y",
strtotime($dzltm_tarihi)) ?></h6>
<hr><h5>
 <div class="col-md-6 input-group">
 <div class="input-group-prepend">
 <div class="input-group-text">
 <?php
 $girisyapildi=0;
 if(isset($_SESSION["loginkey"])){
     include 'urunbuton.php';
    
     $girisyapildi=1;
     }
 else{
    echo'<span> <a  href="uye/giris.php" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">Satın Almak İçin Giriş Yapınız</a></span>';
 }
 ?>
 
 </div>
 </div>
 
 </div>
</h5><hr>
<p><a href="urunler.php?id=<?php echo $kategori_id ?>" class="btn btn-dark p3"><?php echo $kategoriadi ?> kategorisindeki diğer ürünler</a></p>

 
 </div>
 </div>
 <h4 class="baslik mt-5">Diğer Ürünler</h2>
<div class="row">
 <?php
 include 'config/iste_vtabani.php';
 $sorgu='select id, urunadi, aciklama, fiyat, resim from iste_urunler limit 0,4';
 $stmt = $con->prepare($sorgu); 
 $stmt->execute(); 
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 foreach ($veri as $kayit) { ?>
 <div class="col-md-3 mb-3">
 <div class="card">
 <a href="urundetay.php?id=<?php echo $kayit['id']?>">
 <img class="card-img-top" src="content/images/<?php echo
$kayit['resim']?>" alt="<?php echo $kayit['urunadi']?>">
</a>
 <div class="card-body">
 <h4 class="card-title"><?php echo $kayit['urunadi']?></h4>
 <p class="card-text"><?php echo $kayit['aciklama']?></p>
 </div>
 <div class="card-footer text-muted">
 <a href="#" class="text-secondary float-left sepete-ekle" id="<?php echo
$kayit['id']?>"><i class="fa fa-cart-plus fa-2x"></i></a>
 <span class="badge badge-success p-2 float-right"><?php echo
$kayit['fiyat']?>&#8378;</span>
 </div>
 </div>
 </div>
 <?php } ?>
</div>

 </div>
<?php include "footer.php"; ?>
