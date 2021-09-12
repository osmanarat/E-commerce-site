<?php include "header.php"; ?>
<div class="container p-5">
 <?php
 $islem = isset($_GET['islem']) ? $_GET['islem'] : "";

 if($islem == 'tamam') {
 echo "<div class='alert alert-success'>Mesajınız başarıyla iletildi.</div>";
 }
 else if($islem == 'hata') {
 echo "<div class='alert alert-danger'>Mesajınız iletilemedi!</div>";
 }
?>

 <h1 class="text-center baslik">İSTE E-TİCARET PROJESİ</h1>
<p class="text-justify p-4">Bu proje Mersin üniversitesi Ecommerce dersi için Osman Arat tarafından geliştirilmiş bir E-TİCARET PROJESİDİR.</p><hr>
 
  <div class="row mt-4">
 <div class="col-md-4">
 <h2 class="baslik">İletişim Formu</h2>
 </div>
 <div class="col-md-8">
 <form action="email-gonder.php" method="post" name="iletisim">
 <div class="form-group">
 <label for="exampleInputText1">İsim</label>
 <input type="text" class="form-control" id="exampleInputText1"
placeholder="Adınızı girin" name="kimden">
 </div>
 <div class="form-group">
 <label for="exampleInputEmail1">E-Posta adresi</label>
 <input type="email" class="form-control" id="exampleInputEmail1" ariadescribedby="emailHelp" placeholder="E-posta adresinizi girin" name="eposta">
 <small id="emailHelp" class="form-text text-muted">E-posta adresiniz
başkalarıyla paylaşılmayacaktır.</small>
 </div>
 <div class="form-group">
 <label for="exampleInputText2">Konu</label>
 <input type="text" class="form-control" id="exampleInputText2"
placeholder="Mesajınızın konusunu girin" name="konu">
 </div>
 <div class="form-group">
 <label for="exampleFormControlTextarea1">Mesaj</label>
 <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
placeholder="Bize iletmek istediğiniz mesajı girin" name="mesaj"></textarea>
 </div>
 <button type="submit" class="btn btn-success">Gönder</button>
 </form>
 </div>
 </div>
<div>
<?php include "footer.php"; ?>