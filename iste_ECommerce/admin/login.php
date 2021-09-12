<?php
 session_start();
 
  if ($_GET) {
    $cikis = $_GET["cikis"];
    if ($cikis == 1) {
    session_destroy(); 
    unset($_SESSION["loginkey"]); 
    header("Location: login.php");
    }
    }
 
 if ($_POST){
 $kadi = $_POST["kadi"];
 $ksifre = $_POST["ksifre"];
 if (isset($kadi) && isset($ksifre)) {
 include"../config/iste_vtabani.php";
 try {
 $sorgu = "SELECT kadi,sifre FROM iste_kullanicilar WHERE kadi=:kadi AND
sifre=:ksifre";
 $stmt = $con->prepare($sorgu);

 
 $stmt->bindParam(":kadi", $kadi);
 $stmt->bindParam(":ksifre", $ksifre);
 $stmt->execute();
 $sayi = $stmt->rowCount();
 if ($sayi == 1) {
 $_SESSION["loginkey"] = $kadi;
 header("Location: index.php");
 }
 }
 
 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
 }
 }
?>

<!doctype html>
<html lang="tr">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <title>İSTE E-TİCARET PROJESİ</title>
 
 <link rel="stylesheet" href="/iste_eticaret/content/css/bootstrap.min.css" />
 <link rel="stylesheet" href="/iste_eticaret/content/css/style.css" />
</head>
<body>
 <div class="vertical-center">
 <div class="container col-sm-6 col-md-5">
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
method="post" name="loginform">
 <div class="panel panel-primary">
 <div class="panel-heading"><h3>Oturum Aç</h3></div>
 <div class="panel-body">
 <div class="form-horizontal">
 <h6>Oturum açmak için kullanıcı adı ve şifrenizi
giriniz...</h6>
 <input type="text" class="form-control"
placeholder="Kullanıcı adı" name="kadi"><br />
 <input type="password" class="form-control"
placeholder="Şifre" name="ksifre"><br />
 <button type="submit" class="btn btn-primary btnblock">Giriş</button>
 </div>
 </div>
 </div>
 </form>
 </div>
 </div>
</body>
</html>