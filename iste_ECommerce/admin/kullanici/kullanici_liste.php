<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Admin Listesi</h1>
 </div>
 <?php
 
 include '../../config/iste_vtabani.php';
 $islem = isset($_GET['islem']) ? $_GET['islem'] : "";
 if($islem=='silindi'){
 echo "<div class='alert alert-success'>Kayıt silindi.</div>";
 }
 else if($islem=='silinemedi'){
 echo "<div class='alert alert-danger'>Kayıt silinemedi.</div>";
 }

 $sorgu = "SELECT id, adsoyad, kadi FROM iste_kullanicilar ORDER BY id DESC";
 $stmt = $con->prepare($sorgu);
 $stmt->execute();
 $sayi = $stmt->rowCount();
 echo "<a href='kullanici_ekle.php' class='btn btn-primary m-b-1em'>Yeni Admin</a>";

 if($sayi>0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
     echo "<tr>";
     echo "<th>ID</th>";
     echo "<th>Ad ve Soyad</th>";
     echo "<th>Kullanıcı adı</th>";
     echo "<th>İşlem</th>";
     echo "</tr>";
    
while ($kayit = $stmt->fetch(PDO::FETCH_ASSOC)){
 
    extract($kayit);
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$adsoyad}</td>";
    echo "<td>{$kadi}</td>";
    echo "<td>";
    echo "<a href='kullanici_duzelt.php?id={$id}' class='btn btn-primary m-r1em'>Düzelt</a>";

    echo "<a href='#' onclick='silme_onay({$id});' class='btn btndanger'>Sil</a>";
    echo "</td>";
    echo "</tr>";
    }
    
     echo "</table>";

 }
 else{
 echo "<div class='alert alert-danger'>Listelenecek kayıt bulunamadı.</div>";
 }
?>
 </div> 
<?php include "../footer.php"; ?>
<script type='text/javascript'>
 
 function silme_onay( id ){

 var cevap = confirm('Kaydı silmek istiyor musunuz?');
 if (cevap){

 window.location = 'kullanici_sil.php?id=' + id;
 }
 }
</script>
