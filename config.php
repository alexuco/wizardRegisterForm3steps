<?Php
///////// Database Details  ////
$dbhost_name = "localhost";
$database = "ueb_DB";
$username = "demo";
$password = "demo";
//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage();
die();
}
?>