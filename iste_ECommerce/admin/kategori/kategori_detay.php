<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Kategori Bilgisi</h1>
 </div>
 <?php

 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Kayıt bulunamadı.');

 include '../../config/iste_vtabani.php';


 try {
 $sorgu = "SELECT id, isim, aciklama FROM iste_siparisler WHERE id = ?
LIMIT 0,1";
 $stmt = $con->prepare( $sorgu );
 $stmt->bindParam(1, $id);
 $stmt->execute();
 $kayit = $stmt->fetch(PDO::FETCH_ASSOC);
 $kategoriadi = $kayit['isim'];
 $aciklama = $kayit['aciklama'];
 }
 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
 ?>
 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Sipariş adı</td>
 <td><?php echo htmlspecialchars($kategoriadi, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td>Açıklama</td>
 <td><?php echo htmlspecialchars($aciklama, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td></td>
 <td>
 <a href='kategori_liste.php' class='btn btn-danger'>Kategori listesi</a>
 </td>
 </tr>
 </table>

</div> 
<?php include "../footer.php"; ?>