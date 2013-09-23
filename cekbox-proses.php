<?
include "conn.php";

///tangkap nilai parameter
$cek=$_POST['cek'];

//mode delete atau input
$mode=$_GET['mode'];

if($mode=='delete'){
	//hitung jumnlah yang di cek
	$jumlah=count($cek);
	
	for($i=0;$i<$jumlah;$i++){
		$hapus=mysql_query("delete from laporan_keluhan where id_laporan='$cek[$i]'");
		//untuk mengetahui nilai array :
		//echo $cek[$i];
	}
	
	?>
	<script language="javascript">document.location.href="admin.php?pages=pengaduan";</script>
	<?
	
}

/*?>if($mode=='input'){
	//hitung jumnlah yang di cek
	$jumlah=count($cek);
	
	for($i=0;$i<$jumlah;$i++){
		$hapus=mysql_query("insert into laporan_keluhan(id_laporan, nama, email, isi_laporan, no_tlp) values('$cek[$i]')");
		//untuk mengetahui nilai array :
		//$cek[$i];
	}
	
	?>
	<script language="javascript">document.location.href="cekbox-delete.php";</script>
	<?
	
}<?php */?>