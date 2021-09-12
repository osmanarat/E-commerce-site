<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Sipariş Bilgisi</h1>
 </div>
 <?php
 
 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Kayıt bulunamadı.');
 include '../../config/iste_vtabani.php';

 try {
 $sorgu = "SELECT id, isim,soyisim,aciklama,il,ilce,adres,kurum,postakodu,email,tel FROM iste_siparisler WHERE id = ?
LIMIT 0,1";
 $stmt = $con->prepare( $sorgu );
 $stmt->bindParam(1, $id);
 $stmt->execute();
 $kayit = $stmt->fetch(PDO::FETCH_ASSOC);
 $isim = $kayit['isim'];
 $aciklama = $kayit['aciklama'];
 $soyisim = $kayit['soyisim'];
 $il = $kayit['il'];
 $ilce = $kayit['ilce'];
 $adres = $kayit['adres'];
 $kurum = $kayit['kurum'];
 $postakodu = $kayit['postakodu'];
 $email = $kayit['email'];
 $tel = $kayit['tel'];
 }

 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
 ?>
 
 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Sipariş adı</td>
 <td><?php echo htmlspecialchars($isim, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td>Soyisim</td>
 <td><?php echo htmlspecialchars($soyisim, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td>İl</td>
 <td><?php echo htmlspecialchars($il, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <tr>
 <td>ilçe</td>
 <td><?php echo htmlspecialchars($ilce, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <tr>
 <td>adres</td>
 <td><?php echo htmlspecialchars($adres, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <tr>
 <td>Kurum</td>
 <td><?php echo htmlspecialchars($kurum, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <tr>
 <td>Posta Kodu</td>
 <td><?php echo htmlspecialchars($aciklama, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <tr>
 <td>E-Mail</td>
 <td><?php echo htmlspecialchars($email, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <tr>
 <td>Telefon</td>
 <td><?php echo htmlspecialchars($tel, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td></td>
 <td>
 <a href='siparislistesi.php' class='btn btn-danger'>Sipariş listesi</a>
 </td>
 </tr>
 </table>

</div> 
<?php include "../footer.php"; ?>