<?php include "../header.php"; ?>

<div class="container">
<div class="page-header">
<h1>Kategori Güncelleme</h1>
</div>
<?php
 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Id bilgisi bulunamadı.');

 include '../../config/iste_vtabani.php';
 try {

 $sorgu = "SELECT id, kategoriadi, aciklama FROM iste_kategoriler WHERE id = ?
LIMIT 0,1";
 $stmt = $con->prepare( $sorgu );
 $stmt->bindParam(1, $id);
 $stmt->execute();
 $kayit = $stmt->fetch(PDO::FETCH_ASSOC);
 $kategoriadi = $kayit['kategoriadi'];
 $aciklama = $kayit['aciklama'];
 }

 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
 ?>
<?php
 if($_POST){

 try{
 $sorgu = "UPDATE iste_kategoriler SET kategoriadi=:kategoriadi,
aciklama=:aciklama WHERE id = :id";
 $stmt = $con->prepare($sorgu);
 $kategoriadi=htmlspecialchars(strip_tags($_POST['kategoriadi']));
 $aciklama=htmlspecialchars(strip_tags($_POST['aciklama']));
 $stmt->bindParam(':kategoriadi', $kategoriadi);
 $stmt->bindParam(':aciklama', $aciklama);
 $stmt->bindParam(':id', $id);
 if($stmt->execute()){
 echo "<div class='alert alert-success'>Kayıt güncellendi.</div>";
 }else{
 echo "<div class='alert alert-danger'>Kayıt
güncellenemedi.</div>";
 }

 }
 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
 }
 ?>

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] .
"?id={$id}");?>" method="post">
 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Kategori adı</td>
 <td><input type='text' name='kategoriadi' value="<?php echo
htmlspecialchars($kategoriadi, ENT_QUOTES); ?>" class='form-control' /></td>
 </tr>
 <tr>
 <td>Açıklama</td>
 <td><textarea name='aciklama' class='form-control'><?php echo
htmlspecialchars($aciklama, ENT_QUOTES); ?></textarea></td>
 </tr>
 <tr>
 <td></td>
 <td>
 <input type='submit' value='Kaydet' class='btn btn-primary' />
 <a href='kategori_liste.php' class='btn btn-danger'>Kategori
listesi</a>
 </td>
 </tr>
 </table>
 </form></div> 

<?php include "../footer.php"; ?>