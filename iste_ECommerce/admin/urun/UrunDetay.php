<?php include "../header.php"; ?>

 <div class="container">
 <div class="page-header">
 <h1>Ürün Bilgisi</h1>
 </div>
 <?php

 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Kayıt bulunamadı.');
 include '../../config/iste_vtabani.php';
 try {
    $sorgu = "SELECT iste_urunler.id, iste_urunler.urunadi, iste_urunler.aciklama, iste_urunler.fiyat,
iste_urunler.resim, iste_kategoriler.kategoriadi FROM iste_urunler LEFT JOIN iste_kategoriler ON
iste_urunler.kategori_id = iste_kategoriler.id WHERE iste_urunler.id = ? LIMIT 0,1";

$stmt = $con->prepare( $sorgu );
$stmt->bindParam(1, $id);
$stmt->execute();
$kayit = $stmt->fetch(PDO::FETCH_ASSOC);
$urunadi = $kayit['urunadi'];
$aciklama = $kayit['aciklama'];
$fiyat = $kayit['fiyat'];
$resim = $kayit['resim'];
$kategoriadi = $kayit['kategoriadi'];


    }
   

    catch(PDOException $exception){
    die('HATA: ' . $exception->getMessage());
    }
    ?>

 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Ürün adı</td>
 <td><?php echo htmlspecialchars($urunadi, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td>Açıklama</td>
 <td><?php echo htmlspecialchars($aciklama, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td>Fiyat</td>
 <td><?php echo htmlspecialchars($fiyat, ENT_QUOTES); ?> &#8378;</td>
 </tr>
 <tr>
 <td>Kategori</td>
 <td><?php echo htmlspecialchars($kategoriadi, ENT_QUOTES); ?></td>
</tr>
 <tr>
 <tr>
 <td>Resim</td>
 <td><?php echo $resim ? "<img src='../../content/images/{$resim}'
style='width:300px;' />" : "Ürün görseli yok."; ?></td>
 </tr>

 <td></td>
 <td>
 <a href='liste.php' class='btn btn-danger'>Ürün listesi</a>
 </td>
 </tr>
 </table>

 
 </div> 

 <?php include "../footer.php"; ?>