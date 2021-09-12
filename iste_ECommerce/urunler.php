<?php include "header.php"; ?>
<div class="container mt-4">
 <div class="row">
 <div class="col-md-3">
 <div><!--iste_kategoriler-->
 <h4 class="baslik">Kategoriler</h4>
 <ul class="list-group list-group-flush">
 <?php
 $aranan=isset($_GET["aranan"]) ? $_GET["aranan"]:"";
 $kategori=isset($_GET["id"]) ? $_GET["id"]:"";
 $siralama=isset($_GET["siralama"]) ? $_GET["siralama"]:"akilli";
 $fiyat=isset($_GET["fiyat"]) ? $_GET["fiyat"]:"0";
 $parametre="&aranan=$aranan&siralama=$siralama&fiyat=$fiyat";
 include 'config/iste_vtabani.php';
 $sorgu='SELECT iste_kategoriler.*, COUNT(iste_urunler.id) AS adet FROM iste_kategoriler LEFT
JOIN iste_urunler ON iste_kategoriler.id=iste_urunler.kategori_id GROUP BY iste_kategoriler.id ORDER
BY iste_kategoriler.kategoriadi';
 $stmt = $con->prepare($sorgu); 
 $stmt->execute(); 
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 $toplam=0;
 foreach ($veri as $kayit) { ?>
 <a href="urunler.php?id=<?php echo $kayit["id"];echo $parametre ?>"
class="list-group-item d-flex justify-content-between align-items-center listgroup-item-action<?php echo $kategori==$kayit["id"] ? "active":""; ?>"><?php echo
$kayit["kategoriadi"] ?>
 <span class="badge badge-success badge-pill"><?php echo $kayit["adet"]
?></span>
 </a>
 <?php $toplam+=$kayit["adet"]; } ?>
 <a href="urunler.php?id=<?php echo $parametre ?>" class="list-group-item dflex justify-content-between align-items-center list-group-item-action<?php echo
$kategori=="" ? "active":""; ?>">Hepsi
 <span class="badge badge-success badge-pill"><?php echo $toplam ?></span>
 </a>
 </ul>
</div><!--/iste_kategoriler-->
 <div class="pt-4"><!--sıralama-->
 <h4 class="baslik">Sıralama</h4>
 <div class="list-group list-group-flush">
 <?php $parametre="&aranan=$aranan&id=$kategori&fiyat=$fiyat"; ?>

 <a href="urunler.php?siralama=akilli<?php echo $parametre ?>" class="listgroup-item list-group-item-action<?php echo $siralama=="akilli" ? "active":"";
?>">Akıllı sıralama</a>
 <a href="urunler.php?siralama=yeni<?php echo $parametre ?>" class="list-groupitem list-group-item-action<?php echo $siralama=="yeni" ? "active":""; ?>">Yeni
ürünler</a> 
<a href="urunler.php?siralama=artan<?php echo $parametre ?>" class="listgroup-item list-group-item-action<?php echo $siralama=="artan" ? "active":"";
?>">Artan fiyat</a>
 <a href="urunler.php?siralama=azalan<?php echo $parametre ?>" class="listgroup-item list-group-item-action<?php echo $siralama=="azalan" ? "active":"";
?>">Azalan fiyat</a>
 </div>
</div>
 <div class="pt-4">
 <h4 class="baslik">Fiyat Aralığı</h4>
 <div class="list-group list-group-flush">
 <?php $parametre="&aranan=$aranan&id=$kategori&siralama=$siralama"; ?>
 <a href="urunler.php?fiyat=0<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="0" ? "active":""; ?>">Yok</a>
 <a href="urunler.php?fiyat=1<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="1" ? "active":""; ?>">0 - 25 &#8378;</a>
 <a href="urunler.php?fiyat=2<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="2" ? "active":""; ?>">25 - 50
&#8378;</a>
 <a href="urunler.php?fiyat=3<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="3" ? "active":""; ?>">50 - 100
&#8378;</a>
 <a href="urunler.php?fiyat=4<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="4" ? "active":""; ?>">100 - 250
&#8378;</a>
 <a href="urunler.php?fiyat=5<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="5" ? "active":""; ?>">250 - 500
&#8378;</a>
 <a href="urunler.php?fiyat=6<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="6" ? "active":""; ?>">500 - 1000
&#8378;</a>
 </div></div>
 </div>
 <div class="col-md-9">
 <div class="row">
 <?php
 switch($siralama){
 case 'yeni': $orderby="giris_tarihi desc";break;
 case 'artan': $orderby="fiyat";break;
 case 'azalan':$orderby="fiyat desc";break;
 default: $orderby="dzltm_tarihi desc";
 }
 switch($fiyat){
 case '1': $where1="fiyat between 0 and 25";break;
 case '2': $where1="fiyat between 25 and 50";break;
 case '3': $where1="fiyat between 50 and 100";break;
 case '4': $where1="fiyat between 100 and 250";break;
 case '5': $where1="fiyat between 250 and 500";break;
 case '6': $where1="fiyat between 500 and 1000";break;
 }
 if($kategori!="") $where2="kategori_id=$kategori";
 if($aranan!="") $where3="urunadi like '%$aranan%'"; else $where3="urunadi like
'%'";
 if(isset($where1) && isset($where2)) $where="(".$where1.") and (".$where2.") and
(".$where3.")";
 elseif(isset($where1)) $where="(".$where1.") and (".$where3.")";
 elseif(isset($where2)) $where="(".$where2.") and (".$where3.")";
 else $where=$where3;
 include 'config/iste_vtabani.php';
 $sorgu="select id, urunadi, aciklama, fiyat, resim from iste_urunler where $where
order by $orderby";
 $stmt = $con->prepare($sorgu); 
 $stmt->execute(); 
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 foreach ($veri as $kayit) { ?>
 <div class="col-md-4 mb-4">
 <div class="card mincard">
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
$kayit['id']?>"><i class="fa fa-cart-plus fa-2x"></i>Sepete Ekle</a>
 <span class="badge badge-success p-2 float-right"><?php echo
$kayit['fiyat']?>&#8378;</span>
 </div>
 </div>
 </div>
 <?php } ?>
</div>
 </div>
 </div>
 </div>
<?php include "footer.php"; ?>