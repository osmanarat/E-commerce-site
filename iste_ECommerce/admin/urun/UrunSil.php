<?php
include '../../config/iste_vtabani.php';
try {
 
 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Id bilgisi bulunamadı.');

$sorgu = "SELECT id, resim FROM iste_urunler WHERE id = ? LIMIT 0,1";
$stmt = $con->prepare( $sorgu );
$stmt->bindParam(1, $id);

$stmt->execute();
$kayit = $stmt->fetch(PDO::FETCH_ASSOC);
$resim = $kayit['resim']; 

 $sorgu = "DELETE FROM iste_urunler WHERE id = ?";
 $stmt = $con->prepare($sorgu);
 $stmt->bindParam(1, $id);

 
 if($stmt->execute()){

if(!empty($resim)){
    $silinecek_resim = "../../content/images/".$resim;
    if (file_exists($silinecek_resim)) unlink($silinecek_resim);
   }
 header('Location: liste.php?islem=silindi');
 } 
 else{
 header('Location: liste.php?islem=silinemedi');
 }
}

catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
}
?>
