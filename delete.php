<HTML>
<HEAD>
<TITLE>Delete Multiple Checkbox</TITLE>
</HEAD>
<BODY>
<?php

/*– Untuk Koneksi ke server –*/
$host = "localhost";
$user = "root";
$password="";
$koneksi = mysql_connect($host,$user,$password) or diw ("Koneksi Server Gagal");
mysql_select_db("wp-samosir");

$submit = isset($_POST["submit"]);
if($submit)
{
?>
<?php

$_POST["id"] = $_POST['hapus'];
$_POST["jumlah_data"] = count($_POST["id"]);

//echo "jumlah data : ".$jumlah_data;

for($i=0;$i<$_POST["jumlah_data"];$i++)
{
$data = $_POST["id"][$i];
$delete = "delete from laporan_keluhan where id_laporan = $data";
$db_delete = mysql_query($delete) or die ("Delete Gagal");
}
if($db_delete)
{
echo"Ada ".$_POST["jumlah_data"]." data berhasil di delete ";
echo"<a href = delete.php > Lihat Data </a>";
}

?>

<?php
}
else
{

$query = "select * from laporan_keluhan ";
$db_query = mysql_query($query) or die ("Query gagal");
echo"<form action =''  method = 'POST'>";
echo"<table align = center border = 1 hspace = 0>";
echo"<tr>
<td width = 20 >#</td>
<td width = 40 >ID</td>
<td width = 100 >Nama</td>
<td width = 100 >No. KTP</td>
<td width = 100 >No Telepon</td>
<td width = 100 >Isi Pengaduan</td>
<td width = 100 >Status</td>
<td width = 100 >Proses</td>
</tr>
";
while($data = mysql_fetch_array($db_query))
{
echo"<tr>
<td width = 10 >$data[id_laporan]</td>
<td width = 40 align = center><input type = checkbox name = hapus[] id=hapus value=$data[id_laporan]></td>
<td width = 100 >$data[nama]</td>
<td width = 100 >$data[no_ktp]</td>
<td width = 100 >$data[no_tlp]</td>
<td width = 100 >$data[isi_laporan]</td>
<td width = 100 >$status</td>
<td width = 100 >$url | <a href=?page=pengaduan&paging=$paging&id_laporan_hapus=" . $pengaduan->id_laporan .">Hapus</a></td>
</tr>
";
}
echo"
<tr>
<td colspan = 8 align = center>
	<input type = submit name = submit value = delete >
</td>
</tr>

";
echo"</form>";
echo"</table>";
}
?>

</BODY>
</HTML>