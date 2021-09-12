<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Ürün Listesi</h1>
 </div>

 <?php

$sayfa = isset($_GET['sayfa']) ? $_GET['sayfa'] : 1;
$sayfa_kayit_sayisi = 5;
$ilk_kayit_no = ($sayfa_kayit_sayisi * $sayfa) - $sayfa_kayit_sayisi;
 include '../../config/iste_vtabani.php';


 $islem = isset($_GET['islem']) ? $_GET['islem'] : "";
 if($islem=='silindi'){
 echo "<div class='alert alert-success'>Kayıt silindi.</div>";
 }
 else if($islem=='silinemedi'){
 echo "<div class='alert alert-danger'>Kayıt silinemedi.</div>";
 }
 $aranan = isset($_GET['aranan']) ? $_GET['aranan'] : "";
 $arama_sarti = isset($_GET['aranan']) ? "%".$_GET['aranan']."%" : "%";
 $sorgu = "SELECT iste_urunler.id, iste_urunler.urunadi, iste_urunler.aciklama, iste_urunler.fiyat,
iste_kategoriler.kategoriadi FROM iste_urunler LEFT JOIN iste_kategoriler ON iste_urunler.kategori_id
= iste_kategoriler.id WHERE iste_urunler.urunadi LIKE :aranan ORDER BY iste_urunler.id DESC LIMIT
:ilk_kayit_no, :sayfa_kayit_sayisi";
 $stmt = $con->prepare($sorgu);
 $stmt->bindParam(":ilk_kayit_no", $ilk_kayit_no, PDO::PARAM_INT);
 $stmt->bindParam(":sayfa_kayit_sayisi", $sayfa_kayit_sayisi, PDO::PARAM_INT);
 $stmt->bindParam(":aranan", $arama_sarti);
 $stmt->execute();
 $sayi = $stmt->rowCount();
 echo "<a href='UrunEkle.php' class='btn btn-primary m-b-1em'>Ürün Ekle</a>";
 ?>

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
method="get">
 <div class="row">
 <div class="col-xs-6 col-md-4 pull-right">
 <div class="input-group">
 <input type="text" class="form-control" placeholder="Ürün ara"
name="aranan" value="<?php echo isset($_GET['aranan']) ? $_GET['aranan'] : ""; ?>"
/>
 <div class="input-group-btn">
 <button class="btn btn-primary" type="submit">
 <span class="glyphicon glyphicon-search"></span>
 </button>
 </div>
 </div>
 </div>
 </div>
 </form>
 <?php

 if($sayi>0){
 echo "<table class='table table-hover table-responsive table-bordered'>";

 echo "<tr>";
 echo "<th>ID</th>";
 echo "<th>Ürün adı</th>";
 echo "<th>Açıklama</th>";
 echo "<th>Fiyat</th>";
 echo "<th>Kategori</th>";


 echo "<th>İşlem</th>";
 echo "</tr>";


while ($kayit = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($kayit);
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$urunadi}</td>";
    echo "<td>{$aciklama}</td>";
    echo "<td>{$fiyat} &#8378;</td>"; 
     echo "<td>{$kategoriadi}</td>";
    echo "<td>";
    echo "<a href='urundetay.php?id={$id}' class='btn btn-info m-r1em'>Detay</a>";
   echo "<a href='UrunGuncelle.php?id={$id}' class='btn btn-primary m-r1em'>Güncelle</a>";
   echo "<a href='#' onclick='silme_onay({$id});' class='btn btn-danger'>Sil</a>";
    echo "</td>";
    echo "</tr>";
    }
   
 echo "</table>"; 
 
 $sorgu = "SELECT COUNT(*) as kayit_sayisi FROM iste_urunler WHERE urunadi LIKE
:aranan";
$stmt = $con->prepare($sorgu);
$stmt->bindParam(":aranan", $arama_sarti);


 $stmt->execute();
 $kayit = $stmt->fetch(PDO::FETCH_ASSOC);
 $kayit_sayisi = $kayit['kayit_sayisi'];
 $sayfa_url="liste.php";

 include_once "../UrunSayfalama.php";

 }
 else{
 echo "<div class='alert alert-danger'>Listelenecek kayıt
bulunamadı.</div>";
 }
 ?>
</div> 
<?php include "../footer.php"; ?>
<script type='text/javascript'>
 function silme_onay( id ){

 var cevap = confirm('Kaydı silmek istiyor musunuz?');
 if (cevap){

 window.location = 'UrunSil.php?id=' + id;
 }
 }
</script>