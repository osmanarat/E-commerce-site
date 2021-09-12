<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Ürün Ekle</h1>
 </div>
 <?php
if($_POST){
 include '../../config/iste_vtabani.php';
 try{

$sorgu = "INSERT INTO iste_urunler SET urunadi=:urunadi, aciklama=:aciklama,
fiyat=:fiyat, giris_tarihi=:giris_tarihi, resim=:resim, kategori_id=:kategori_id";

$stmt = $con->prepare($sorgu);
$urunadi=htmlspecialchars(strip_tags($_POST['urunadi']));
$aciklama=htmlspecialchars(strip_tags($_POST['aciklama']));
$fiyat=htmlspecialchars(strip_tags($_POST['fiyat']));
$resim=!empty($_FILES["resim"]["name"]) ? uniqid() . "-" .
basename($_FILES["resim"]["name"]) : "";
$resim=htmlspecialchars(strip_tags($resim));
$kategori_id=htmlspecialchars(strip_tags($_POST['kategori_id']));
$stmt->bindParam(':urunadi', $urunadi);
$stmt->bindParam(':aciklama', $aciklama);
$stmt->bindParam(':fiyat', $fiyat);
$stmt->bindParam(':resim', $resim);
$stmt->bindParam(':kategori_id', $kategori_id);

$giris_tarihi=date('Y-m-d H:i:s');
$stmt->bindParam(':giris_tarihi', $giris_tarihi);
 
 if($stmt->execute()){
 echo "<div class='alert alert-success'>Ürün kaydedildi.</div>";
 
if($resim){
    $hedef_klasor = "../../content/images/";
    $hedef_dosya = $hedef_klasor . $resim;
    $dosya_turu = pathinfo($hedef_dosya, PATHINFO_EXTENSION);
   
    $dosya_yukleme_hata_msj="";
   }

$izinverilen_dosya_turleri=array("jpg", "jpeg", "png", "gif");
if(!in_array($dosya_turu, $izinverilen_dosya_turleri)){
 $dosya_yukleme_hata_msj.="<div>Sadece JPG, JPEG, PNG, GIF türündeki dosyalar
yüklenebilir.</div>";
}

if(file_exists($hedef_dosya)){
    $dosya_yukleme_hata_msj.="<div>Aynı isimde başka bir resim dosyası
   var.</div>";
   }

if($_FILES['resim']['size'] > (1024000)){
    $dosya_yukleme_hata_msj.="<div>Resim dosyasının boyutu 1 MB sınırını
   aşamaz.</div>";
   }

if(empty($dosya_yukleme_hata_msj)){

    if(move_uploaded_file($_FILES["resim"]["tmp_name"], $hedef_dosya)){
   
    }
    else{
    echo "<div class='alert alert-danger'>";
    echo "<div>Dosya yüklenemedi.</div>";
    echo "<div>Dosyayı yüklemek için kaydı güncelleyin.</div>";
    echo "</div>";
    }
   }
   
   else{
   
    echo "<div class='alert alert-danger'>";
    echo "<div>{$dosya_yukleme_hata_msj}</div>";
    echo "<div>Dosyayı yüklemek için kaydı güncelleyin.</div>";
    echo "</div>";
   }      
      
 }else{
 echo "<div class='alert alert-danger'>Ürün kaydedilemedi.</div>";
 }
 }
 
 catch(PDOException $exception){
 die('ERROR: ' . $exception->getMessage());
 }
}
?>

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"
enctype="multipart/form-data">

 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Ürün adı</td>
 <td><input type='text' name='urunadi' class='form-control' /></td>
 </tr>
 <tr>
 <td>Açıklama</td>
 <td><textarea name='aciklama' class='form-control'></textarea></td>
 </tr>
 <tr>
 <td>Fiyat</td>
 <td><input type='text' name='fiyat' class='form-control' /></td>
 </tr>
 <tr>
 <td>Kategori</td>
 <td>
 <?php

 include '../../config/iste_vtabani.php';

 $sorgu='select id, kategoriadi from iste_kategoriler';
 $stmt = $con->prepare($sorgu); 
 $stmt->execute(); 
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 ?>
 <select name='kategori_id' class='form-control'>
 <?php foreach ($veri as $kayit) { ?>
 <option value="<?php echo $kayit["id"] ?>">
 <?php echo $kayit["kategoriadi"] ?>
 </option>
 <?php } ?>
 </select>
 </td>
</tr>

 <tr>
 <td>Resim</td>
 <td><input type="file" name="resim" /></td>
</tr>
 <tr>
 <td></td>
 <td>
 <input type='submit' value='Kaydet' class='btn btn-primary' />
 <a href='liste.php' class='btn btn-danger'>Ürün listesi</a>
 </td>
 </tr>
 </table>
</form>

</div>
<?php include "../footer.php"; ?>