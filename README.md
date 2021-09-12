# E-commerce-site

try {

    $con=new PDO("mysql:host=localhost;dbname=iste_eticaret;charset=utf8",'root','');

	//echo "Veritabanı bağlantısı başarılı";

} catch (PDOExpception $e) {

	echo $e->getMessage();
}



The file iste_vtabani.php IN CONFIG is as above.
After creating your .sql file with local host on Xamp server, you should change it according to your database name and password.

The related .sql database is called iste_eticaret.sql. this is also attached.
Then you should throw these files from explorer in xamp server or into htdocs in xamp server file location.
Then, when you type https:\\localhost\iste_eticaret in your address line, the index page will appear.

You can check the READY STATE OF THE SITE: https:\\www.osman.web.tr\iste_E-Commerce/
