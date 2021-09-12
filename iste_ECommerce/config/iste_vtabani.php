<?php 

try {

    $con=new PDO("mysql:host=localhost;dbname=iste_eticaret;charset=utf8",'root','');

	//echo "Veritabanı bağlantısı başarılı";

} catch (PDOExpception $e) {

	echo $e->getMessage();
}


?>