<?php 
include'header.php';

?>

<?php
 if($_POST){
 include '../config/iste_vtabani.php';
 try{
 $sorgu = "INSERT INTO iste_uyeler SET adsoyad=:adsoyad, kadi=:kadi,
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
<div class="container ">
 <form name="form" method="post" action="bilgiguncellendi.php">
 <div class="row">
 <div class="col-sm-">
 <div class="baslik">
 <h3>Teslimat Adresi</h3>
 <hr>
 </div>
 <div > <h3>Profil Bilgilerim </h3></div>
 <div class="row">
 <div class="col-sm-6">
 <div class="form-group">
 <label for="isim">İsim*</label>
 <input type="text" id="isim" class="form-control"
placeholder="Adınız">
 </div>
 </div>
 <div class="col-sm-6">
 <div class="form-group">
 <label for="soyisim">Soyisim*</label>
 <input type="text" id="soyisim" class="form-control"
placeholder="Soyadınız">
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-6">
 <div class="form-group">
 <label for="ilce">İl</label>
 <input type="text" id="il" class="form-control"
placeholder="İl Adı Giriniz">
 </div>
 </div>
 <div class="col-sm-6">
 <div class="form-group">
 <label for="ilce">İlçe</label>
 <input type="text" id="ilce" class="form-control"
placeholder="İlçe Adı Giriniz">
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-12">
 <div class="form-group">
 <label for="adres">Adres*</label>
 <textarea id="adres" class="form-control" placeholder="Mahalle,
Cadde/Sokak, Kapı no..."></textarea>
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-6">
 <div class="form-group">
 <label for="kurum">Kurum/Şirket</label>
 <input type="text" id="kurum" class="form-control"
placeholder="Kurum veya Şirket adı">
 </div>
 </div>
 <div class="col-sm-6">
 <div class="form-group">
 <label for="postakodu">Posta Kodu</label>
 <input type="text" id="postakodu" class="form-control"
placeholder="Beş haneli posta kodu">
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-6">
 <div class="form-group">
 <label for="eposta">E-posta Adresi*</label>
 <input type="email" id="eposta" class="form-control"
placeholder="aaa@bbb.ccc">
 </div>
 </div>
 <div class="col-sm-6">
 <div class="form-group">
 <label for="telefon">Telefon Numarası*</label>
 <input type="text" id="telefon" class="form-control"
placeholder="0111 222 33 44">
 </div>
 </div>
 </div>

 </div>
 <div class="col-sm-5">
 <div>
 
 <hr>
 <button type="submit" class="btn btn-primary btn-lg btn-block">
 Bilgilerimi Güncelle
 </button>
 
 </div>
 </div>
 </div>
 </div>
 </form>
</div>

<?php 
include'footer.php';
?>
