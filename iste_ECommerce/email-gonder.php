<?php
if($_POST){
 $kime = 'osman.arat@hotmail.com';
 $kimden = $_POST['kimden'];
 $eposta = $kimden.'<'.$eposta.'>';
 $konu = $_POST['konu'];
 $mesaj = $_POST['mesaj'] . " - " . $kimden;
 $tanimlar = 'MIME-Version: 1.0' . "\r\n" .
 'Content-type: text/html; charset=UTF-8' . "\r\n" .
 'From: {$eposta}' . "\r\n" .
 'Reply-To: osman.arat@hotmail.com' . "\r\n" .
 'X-Mailer: PHP/' . phpversion();
 try {
 mail($kime, $konu, $mesaj, $tanimlar);
 header('Location: hakkimizda.php?islem=tamam');
 }
 catch(Exception $e) {
 header('Location: hakkimizda.php?islem=hata);
 }
}
?>
