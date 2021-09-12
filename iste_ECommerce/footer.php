
<div class="p-3 mb-2 bg-primary text-white">
 <div class="container pt-4">
 <div class="row">
 <div class="col-md-4">
 <h4 class="text-white">Yardım</h4>
 <a href="#" class="link1">Ödeme</a><br>
 <a href="#" class="link1">İade ve Değişim</a><br>
 <a href="#" class="link1">Kariyer Fırsatları</a><br>
 <a href="#" class="link1">Sık Sorulan Sorular</a><br>
 <a href="#" class="link1">Kampanyalar</a>
 </div>
 <div class="col-md-4">
 <h4 class="text-white">Fırsat Ürünleri</h4>
 <?php
 include 'config/iste_vtabani.php';
 $sorgu='select id, urunadi, aciklama, fiyat, resim from iste_urunler order by fiyat
limit 0,3';
 $stmt = $con->prepare($sorgu); 
 $stmt->execute(); 
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 foreach ($veri as $kayit) { ?>
 <div class="row mb-3">
 <div class="col-md-3">
 <img src="content/images/<?php echo $kayit['resim']?>" class="img-fluid
img-thumbnail">
 </div>
 <div class="col-md-9">
 <a href="urundetay.php?id=<?php echo $kayit['id']?>" class="link1">
 <p class="firsat"><?php echo $kayit['urunadi']?></p>
 </a>
 <span class="badge badge-success p-1"><?php echo $kayit['fiyat']?>
&#8378;</span>
 </div>
 </div>
 <?php }
?>

 <?php
 include 'config/iste_vtabani.php';
 $sorgu='select id, urunadi, aciklama, fiyat, resim from iste_urunler order by fiyat
limit 0,3';
 $stmt = $con->prepare($sorgu); 
 $stmt->execute(); 
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 foreach ($veri as $kayit) { ?>
 <div class="row mb-3">
 <div class="col-md-3">
 <img src="content/images/<?php echo $kayit['resim']?>" class="img-fluid
img-thumbnail">
 </div>
 <div class="col-md-9">
 <a href="urundetay.php?id=<?php echo $kayit['id']?>" class="link1">
 <p class="firsat"><?php echo $kayit['urunadi']?></p>
 </a>
 <span class="badge badge-success p-1"><?php echo $kayit['fiyat']?>
&#8378;</span>
 </div>
 </div>
 <?php }
?>

 </div>
 <div class="col-md-4">
 <h4 class="text-white">İletişim</h4>
 <p class="text-light">Adres: <br>İskenderun Teknik Üniversitesi Merkez Kampüs, 31200
<br>İskenderun/Hatay <br>Telefon:  (0326) 613 56 00 <br>Web: https://iste.edu.tr/</p>
 </div>
 </div>
 </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
 $(document).ready(function(){
$('.sepete-ekle').on('click', function(){
 var id = $(this).attr('id');
 var sayi = parseInt(document.getElementById('urun-sayisi').innerHTML);
 if (document.getElementById('urun_'+id) !== null) {
 var adet=document.getElementById('urun_'+id).value;
 }
 else {
 var adet=1;
 }

 $.ajax ({
 cache: false,
 type: 'POST',
 url: 'sepete_ekle.php',
 data: {id:id, adet:adet},
 success: function(sonuc){
 if(sonuc=="true"){
 swal("Ürün sepete eklendi!", {
 icon: "success",
 buttons: false,
 timer: 2000,
 });

 $("#urun-sayisi").text(sayi + 1);
 }
 else{
 swal("Ürün daha önce sepete eklenmiş!", {
 icon: "warning",
 buttons: false,
 timer: 2000,
 });
 }
 },
 error: function(jqXHR, textStatus, errorThrown){
 alert(textStatus + errorThrown);
 }
 });
 return false;
});

 
$('.urun-guncelle').on('click', function(){
 var id = $(this).attr('id');
 var adet = document.getElementById('urun_'+id).value;
 
 $.ajax ({
 cache: false,
 type: 'POST',
 url: 'sepeti_guncelle.php',
 data: {id:id, adet:adet},
 success: function(){
 swal("Ürün adedi güncellendi!", {
 icon: "success",
 buttons: false,
 timer: 2000,
 }).then(function() {
 window.location.href="sepetim.php";
 });
 },
 error: function(jqXHR, textStatus, errorThrown){
 alert(textStatus + errorThrown);
 }
 });
 return false;
});

$('.urun-sil').on('click', function(){
 var id = $(this).attr('id');
 $.ajax ({
 cache: false,
 type: 'POST',
 url: 'sepeti_guncelle.php',
 data: {id:id},
 success: function(){
 swal("Ürün sepetten çıkarıldı!", {
 icon: "success",
 buttons: false,
 timer: 2000,
 }).then(function() {
 window.location.href="sepetim.php";
 });
 },
 error: function(jqXHR, textStatus, errorThrown){
 alert(textStatus + errorThrown);
 }
 });
 return false;
});

 });
</script>

</body>
</html>
 </body>
</html>