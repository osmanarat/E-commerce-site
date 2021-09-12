<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Kategori Listesi</h1>
 </div>
 
<?php include "../footer.php"; ?>
<script type='text/javascript'>
 function silme_onay( id ){

 var cevap = confirm('Kaydı silmek istiyor musunuz?');
 if (cevap){
 
 window.location = 'kategori_sil.php?id=' + id;
 }
 }
</script>
<?php
 include '../../config/iste_vtabani.php';

 $islem = isset($_GET['islem']) ? $_GET['islem'] : "";
 if($islem=='silindi'){
 echo "<div class='alert alert-success'>Kayıt silindi.</div>";
 }
 else if($islem=='silinemedi'){
 echo "<div class='alert alert-danger'>Kayıt silinemedi.</div>";
 }

 $sorgu = "SELECT id, kategoriadi, aciklama FROM iste_kategoriler ORDER BY id DESC";
 $stmt = $con->prepare($sorgu);
 $stmt->execute();
 $sayi = $stmt->rowCount();
 echo "<a href='kategori_ekle.php' class='btn btn-primary m-b-1em'>Yeni Kategori</a>";
 if($sayi>0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
     echo "<tr>";
     echo "<th>ID</th>";
     echo "<th>Kategori adı</th>";
     echo "<th>Açıklama</th>";
     echo "<th>İşlem</th>";
     echo "</tr>";
  
 while ($kayit = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($kayit);
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$kategoriadi}</td>";
    echo "<td>{$aciklama}</td>";
    echo "<td>";
     echo "<a href='kategori_urunler.php?id={$id}' class='btn btn-warning m-r-1em'>Ürünler</a>";

    echo "<a href='kategori_detay.php?id={$id}' class='btn btn-info m-r1em'>Detay</a>";
    echo "<a href='kategori_güncelle.php?id={$id}' class='btn btn-primary m-r1em'>Güncelle</a>";
    echo "<a href='#' onclick='silme_onay({$id});' class='btn btndanger'>Sil</a>";
    echo "</td>";
    echo "</tr>";
    }
    
     echo "</table>"; 
    

 }
 else{
 echo "<div class='alert alert-danger'>Listelenecek kayıt
bulunamadı.</div>";
}

?>
</div>