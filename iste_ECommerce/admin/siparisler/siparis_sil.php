<?php

session_start();
if ($_SESSION["loginkey"] == "") {
header("Location: /iste_eticaret/admin/login.php");
}

include '../../config/iste_vtabani.php';
try {

 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Id bilgisi bulunamadı.');
 
 $sorgu = "DELETE FROM iste_siparisler WHERE id = ?";
 $stmt = $con->prepare($sorgu);
 $stmt->bindParam(1, $id);

 if($stmt->execute()){
 header('Location: siparislistesi.php?islem=silindi');
 } 
 else{
 header('Location: siparislistesi.php?islem=silinemedi');
 }
}

catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
}
?>