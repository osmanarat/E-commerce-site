<?php
include "header.php";
?>
<?php
session_start();

session_destroy();
include "header.php";
?>
<div class="container mt-5 mb-5">
 <div class="col-md-12">
 <h2>Siparişiniz alındı!</h2>
 <hr>
 <div class="alert alert-success">
 <strong>Bizi tercih ettiğiniz için teşekkür ederiz!</strong> Teslimatınız en
kısa süre içinde belirttiğiniz adrese yapılacaktır.
 </div>
 </div>
</div>
<?php
include "footer.php";
?>