<?php include "../header.php"; ?>

<div class="container">
<div class="page-header">
 <h1>Kullanıcı Güncelleme</h1>
 </div>
 <?php
 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Id bilgisi bulunamadı.');
 include '../../config/iste_vtabani.php';


 try {
 $sorgu = "SELECT id, adsoyad, kadi, sifre FROM iste_kullanicilar WHERE id = ?
LIMIT 0,1";
 $stmt = $con->prepare( $sorgu );

 $stmt->bindParam(1, $id);
 $stmt->execute();
 $kayit = $stmt->fetch(PDO::FETCH_ASSOC);
 $adsoyad = $kayit['adsoyad'];
 $kadi = $kayit['kadi'];
 $sifre = $kayit['sifre'];
 }
 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
?>

 <?php
 if($_POST){

 try{

 $sorgu = "UPDATE iste_kullanicilar SET adsoyad=:adsoyad, kadi=:kadi,
sifre=:sifre WHERE id = :id";

 $stmt = $con->prepare($sorgu);
 $adsoyad=htmlspecialchars(strip_tags($_POST['adsoyad']));
 $kadi=htmlspecialchars(strip_tags($_POST['kadi']));
 $sifre=htmlspecialchars(strip_tags($_POST['sifre']));
 $stmt->bindParam(':adsoyad', $adsoyad);
 $stmt->bindParam(':kadi', $kadi);
 $stmt->bindParam(':sifre', $sifre);
 $stmt->bindParam(':id', $id);
 if($stmt->execute()){
 echo "<div class='alert alert-success'>Kayıt güncellendi.</div>";
}else{
    echo "<div class='alert alert-danger'>Kayıt güncellenemedi.</div>";
    }
   
    }
    
    catch(PDOException $exception){
    die('HATA: ' . $exception->getMessage());
    }
    }
   ?>
 
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?id={$id}");?>"
method="post">
 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Ad ve Soyad</td>
 <td><input type='text' name='adsoyad' value="<?php echo
htmlspecialchars($adsoyad, ENT_QUOTES); ?>" class='form-control' /></td>
 </tr>
 <tr>
 <td>Kullanıcı adı</td>
 <td><input type='text' name='kadi' value="<?php echo
htmlspecialchars($kadi, ENT_QUOTES); ?>" class='form-control' /></td>
 </tr>
 <tr>
 <td>Şifre</td>
 <td><input type='password' name='sifre' value="<?php echo
htmlspecialchars($sifre, ENT_QUOTES); ?>" class='form-control' /></td>
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