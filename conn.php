<html>
<head>
</head>
<body>
<?

//konfigurasi hosting
/*
$host="mysql6.000webhost.com";
$user="a4560982_ri32";
$pass="orang_ganteng87";
$db="a4560982_labhos";
*/

//konfigurasi offline
ini_set('display_errors',FALSE);
$host="localhost";
$user="root";
$pass="";
$db="wp-samosir";

//konfigurasi online
/*
ini_set('display_errors',FALSE);
$host="mysql6.000webhost.com";
$user="a4560982_ri32";
$pass="orang_ganteng87";
$db="a4560982_labhos";
*/
$entries=5;

//koneksi 
$koneksi=mysql_connect($host,$user,$pass);
mysql_select_db($db,$koneksi);
$waktu=date("Y-m-d H:i:s");

//cek
if ($koneksi)
{
	//echo "berhasil : )";
}else{
	?><script language="javascript">alert("Gagal Koneksi Database MySql !!")</script><?
}

?>
</body>
</html>