<?php
 session_start();
 $id = isset($_POST['id']) ? $_POST['id'] : "";
 $adet = isset($_POST['adet']) ? $_POST['adet'] : "";
 unset($_SESSION['sepet'][$id]);
 if($adet <> "") {
 $_SESSION['sepet'][$id]=array('adet'=>$adet);
 }
?>