<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Sipariş Listesi</h1>
 </div>
<?php include "../footer.php"; ?>
<script type='text/javascript'>
 function silme_onay( id ){

 var cevap = confirm('Kaydı silmek istiyor musunuz?');
 if (cevap){

 
 window.location = 'siparis_sil.php?id=' + id;
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
 $kadi=$_SESSION["loginkey"];
 echo $kadi;
 $sorgu = "select * from iste_siparisler WHERE kadi='$kadi'";
 $stmt = $con->prepare($sorgu);
 $stmt->execute();


 $sayi = $stmt->rowCount();
 if($sayi>0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
     echo "<tr>";
     echo "<th>ID</th>";
     echo "<th>Sipariş adı</th>";
     echo "<th>Açıklama</th>";
     echo "<th>İşlem</th>";
     echo "</tr>";
    
     
 while ($kayit = $stmt->fetch(PDO::FETCH_ASSOC)){
   
    extract($kayit);
   
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$isim}</td>";
    echo "<td>{$aciklama}</td>";
    echo "<td>";
    echo "<a href='siparis_detay.php?id={$id}' class='btn btn-info m-r1em'>Detay</a>";
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