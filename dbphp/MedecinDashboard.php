<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
</head>
<body>

<?php
session_start ();
$userID = $_SESSION["userID"];

$host = $_SESSION ["host"];
$port = $_SESSION ["port"];
$dbname = $_SESSION ["db"];
$credentials = $_SESSION ["credentials"];


$db = pg_connect ( "$host $port $dbname $credentials" );

$sql = <<<EOF
      SELECT nom,prenom from CabinetMD.Medecin WHERE medID='$userID';
EOF;

$ret = pg_query ( $db, $sql );
if (! $ret) {
	echo pg_last_error ( $db );
	exit ();
}
$row = pg_fetch_row($ret);

echo "Bonjour, Dr." . $row[1] . " " . $row[0];
?>

<form method="post" action="/CabinetMedical/dbphp/connectDB.php">
	<input style="float:right;" type="submit" name="medecin" value="Deconnexion">
</form> 
</body>
</html>