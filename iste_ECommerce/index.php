<?php include "header.php"; ?>
 <div class="container pt">
 <h1 class="text-center baslik pt-4 pb-3">Yeni Ürünler</h1>
 <div class="row">
 <?php
 include 'config/iste_vtabani.php';
 $sorgu='select id, urunadi, aciklama, fiyat, resim from iste_urunler order
by giris_tarihi desc limit 0,6';
 $stmt = $con->prepare($sorgu); 
 $stmt->execute(); 
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 foreach ($veri as $kayit) { ?>
 <div class="col-md-4 mb-4">
 <div class="card  mincard">
 <a href="urundetay.php?id=<?php echo $kayit['id']?>">
 <img class="card-img-top" src="content/images/<?php echo
$kayit['resim']?>" alt="<?php echo $kayit['urunadi']?>">
 </a>
 <div class="card-body">
 <h4 class="card-title"><?php echo $kayit['urunadi']?></h4>
 <p class="card-text"><?php echo $kayit['aciklama']?></p>
 </div>
 <div class="card-footer text-muted">
 <span class="badge badge-success p-2 float-right"><?php echo
$kayit['fiyat']?>&#8378;</span>
 </div>
 </div>
 </div>
 <?php }
 ?>
 </div>

 </div>
<?php 

include "footer.php"; ?>
