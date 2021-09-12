<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Ürün Listesi</h1>
 </div>
 <?php
 include '../../config/iste_vtabani.php';
 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Id bilgisi bulunamadı.');

 $sorgu = "SELECT id, urunadi, aciklama, fiyat FROM iste_urunler WHERE kategori_id = ?
ORDER BY id DESC";
 $stmt = $con->prepare($sorgu);
 $stmt->bindParam(1,$id);
 $stmt->execute();
 $sayi = $stmt->rowCount();
 echo "<a href='kategori_liste.php' class='btn btn-danger m-b-1em'>Kategori listesi</a>";
 if($sayi>0){
 echo "<table class='table table-hover table-responsive table-bordered'>";

 echo "<tr>";
 echo "<th>ID</th>";
 echo "<th>Ürün adı</th>";
 echo "<th>Açıklama</th>";
 echo "<th>Fiyat</th>";
 echo "</tr>";

 
 while ($kayit = $stmt->fetch(PDO::FETCH_ASSOC)){
  
   
   extract($kayit);
   echo "<tr>";
   echo "<td>{$id}</td>";
   echo "<td>{$urunadi}</td>";
   echo "<td>{$aciklama}</td>";
   echo "<td>{$fiyat} &#8378;</td>"; 
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