<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Kullanıcı Ekle</h1>
 </div>
 
 <?php
 if($_POST){
 
 include '../../config/iste_vtabani.php';
 try{
 $sorgu = "INSERT INTO iste_kullanicilar SET adsoyad=:adsoyad, kadi=:kadi,
sifre=:sifre";
 $stmt = $con->prepare($sorgu);
 $adsoyad=htmlspecialchars(strip_tags($_POST['adsoyad']));
 $kadi=htmlspecialchars(strip_tags($_POST['kadi']));
 $sifre=htmlspecialchars(strip_tags($_POST['sifre']));
 $stmt->bindParam(':adsoyad', $adsoyad);
 $stmt->bindParam(':kadi', $kadi);
 $stmt->bindParam(':sifre', $sifre);

 if($stmt->execute()){
 echo "<div class='alert alert-success'>Kullanıcı kaydedildi.</div>";
 }else{
 echo "<div class='alert alert-danger'>Kullanıcı kaydedilemedi.</div>";
 }
 }

 catch(PDOException $exception){
 die('ERROR: ' . $exception->getMessage());
 }
 }
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Ad ve Soyad</td>
 <td><input type='text' name='adsoyad' class='form-control' /></td>
 </tr>
 <tr>
 <td>Kullanıcı adı</td>
 <td><input type='text' name='kadi' class='form-control' /></td>
 </tr>
 <tr>
 <td>Şifre</td>
 <td><input type='password' name='sifre' class='form-control' /></td>
 </tr>
 <tr>
 <td></td>
 <td>
 <input type='submit' value='Kaydet' class='btn btn-primary' />
 <a href='kullanici_liste.php' class='btn btn-danger'>Kullanıcı listesi</a>
 </td>
 </tr>
 </table>
</form>
</div> 
<?php include "../footer.php"; ?>