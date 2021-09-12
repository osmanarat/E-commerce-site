<?php
 session_start();
 $id = isset($_POST['id']) ? $_POST['id'] : "";
 $adet = isset($_POST['adet']) ? $_POST['adet'] : 1;
 if(array_key_exists($id, $_SESSION['sepet'])) {
 echo "false";
 }

 else{
 $_SESSION['sepet'][$id]=array('adet'=>$adet);
 echo "true";
 }
?>