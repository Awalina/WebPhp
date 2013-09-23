<html>
<head>
	<title>Delete via Checkbox</title>
</head>

<?
include "conn.php";

$tampil=mysql_query("select * from laporan_keluhan limit 5");
$jumlah=mysql_num_rows($tampil);

if(!empty($jumlah)){
	?>
	<form action="cekbox-proses.php?mode=delete" method="post">
	<table border="1">
	<tr><th>#</th><th>ID</th><th>Nama</th><th>No Telp</th><th>Isi laporan</th></tr>
	<?
	$no=0;
	while($data=mysql_fetch_array($tampil)){
	echo "
	<tr>
		<td><input type=checkbox name=cek[] value=$data[id_laporan] id=$no></td>";
		$no++;
		echo "  <td>$data[id_laporan]</td>
				<td>$data[nama]</td>
				<td>$data[no_tlp]</td>
				<td>$data[isi_laporan]</td>
	</tr>"; 
	}
	
	
	echo "
	<tr>
		<td colspan=2 align=center>
		<input type=radio name=pilih onClick='for (i=0;i<$no;i++){document.getElementById(i).checked=true;}'>Check All
		<input type=radio name=pilih onClick='for (i=0;i<$no;i++){document.getElementById(i).checked=false;}'>Uncheck All
		</td>
	</tr>
	<tr>
		<td colspan=2 align=center><input type=submit value=Delete></td>
	</tr>
	</table>
	</form>";
	echo "<br /><i>Data diatas diambil dari table 'cekbox' didalam database 'ri32'</i>";
	echo "<br /><i>Program ini digunakan untuk menghapus data yang ada di table 'cekbox' menggunakan fasilitas checkbox</i>";
	
}
?>
</html>
