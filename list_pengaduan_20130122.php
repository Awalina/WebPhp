<?php
	global $wpdb;
	$tableName="laporan_keluhan";		
	$targetpage = "?page=pengaduan"; 	
	echo get_permalink();
	$limit = 5; 
	
	$total_pages = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) as num FROM laporan_keluhan"));
	
	$stages = 3;
	$paging = mysql_escape_string($_REQUEST['paging']);
	if($paging>0){
		$start = ($paging - 1) * $limit; 
	}else{
		$start = 0;	
		}	
	
    // Get page data
    	$listpengaduan=$wpdb->get_results($wpdb->prepare("select id_laporan,nama,no_tlp,no_ktp,isi_laporan, status from laporan_keluhan order by id_laporan desc LIMIT $start, $limit "));
	
	// Initial page num setup
	if ($paging == 0){$paging = 1;}
	$prev = $paging - 1;	
	$next = $paging + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;
	
	if($paging==$lastpage)
	{
		$end = $start + $total_pages - $limit;
	}					
	else
	{
		$end = $start + $limit;	
	}
	
	$paginate = '';
	if($lastpage > 1)
	{	$paginate .= "<div class='tablenav'>";
		$paginate .= "<div class='tablenav-pages'>";
                $paginate .= "<span class='displaying-num'>Menampilkan $start &ndash; $end dari $total_pages</span>";
		// Previous
		if ($paging > 1){
			$paginate.= "<a class='page-numbers' href='$targetpage&paging=$prev'>&lt;&lt;</a>";
		}
			

		
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $paging){
					$paginate.= "<span class='page-numbers current'>$counter</span>";
				}else{
					$paginate.= "<a class='page-numbers' href='$targetpage&paging=$counter'>$counter</a>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($paging < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $paging){
						$paginate.= "<span class='page-numbers current'>$counter</span>";
					}else{
						$paginate.= "<a class='page-numbers'  href='$targetpage&paging=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a class='page-numbers'  href='$targetpage&paging=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a class='page-numbers'  href='$targetpage&paging=$lastpage'>$lastpage</a>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $paging && $paging > ($stages * 2))
			{
				$paginate.= "<a class='page-numbers'  href='$targetpage&paging=1'>1</a>";
				$paginate.= "<a class='page-numbers'  href='$targetpage&paging=2'>2</a>";
				$paginate.= "...";
				for ($counter = $paging - $stages; $counter <= $paging + $stages; $counter++)
				{
					if ($counter == $paging){
						$paginate.= "<span class='page-numbers current'>$counter</span>";
					}else{
						$paginate.= "<a class='page-numbers'  href='$targetpage&paging=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a class='page-numbers'  href='$targetpage&paging=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a class='page-numbers'  href='$targetpage&paging=$lastpage'>$lastpage</a>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<a class='page-numbers'  href='$targetpage&paging=1'>1</a>";
				$paginate.= "<a class='page-numbers'  href='$targetpage&paging=2'>2</a>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $paging){
						$paginate.= "<span class='page-numbers current'>$counter</span>";
					}else{
						$paginate.= "<a class='page-numbers'  href='$targetpage&paging=$counter'>$counter</a>";}					
				}
			}
		}
					
				// Next
		if ($paging < $counter - 1){ 
			$paginate.= "<a class='page-numbers'  href='$targetpage&paging=$next'>&gt;&gt;</a>";
		}
			
		$paginate.= "</div>";
		$paginate.="</div>";		
}


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
	
//echo $total_pages.' Results';
 // pagination
 echo $paginate;
?>
	<form action="" method="post" name="myform">
	<table class="widefat post" cellspacing="0">
	<thead><TR><th>#</th><TH>ID</TH><TH>Nama</TH><TH>No. Telepon</TH><TH>Isi Pengaduan</TH><TH>
Status</TH><TH>Proses</TH></TR></thead><?php
	$no=0;
	foreach($listpengaduan as $pengaduan){ 
	 ?>
		<tbody>
        <TR>
        <TD><?php echo"<input type=checkbox name=hapus[] value=". $pengaduan->id_laporan ." id=$no>"; $no++; ?></TD>
        <TD><?php if($pengaduan->status==1){$status="Disetujui";$url="Setuju";}else{ $status="Ditangguhkan" ;$url="<a href='?page=pengaduan&id_laporan_setuju=".$pengaduan->id_laporan."'>Setuju</a>";} echo $pengaduan->id_laporan  . "</TD>
		<TD>" . $pengaduan->nama . "</TD>
		<TD>" . $pengaduan->no_tlp . "</TD>
		<TD>" . $pengaduan->isi_laporan . "</TD>
		<TD>" . $status . "  " . "</TD>
		<TD>" . $url //. "&nbsp;&nbsp;&nbsp;&nbsp;<a href=?page=pengaduan&paging=$paging&id_laporan_hapus=" . $pengaduan->id_laporan .">Hapus</a>" ?></TD>
        </TR>
        <tbody> <?php
			}
		?>
        <TR><?php echo "<td colspan=2 align=center>
		<input type=radio name=pilih onClick='for (i=0;i<$no;i++){document.getElementById(i).checked=true;}'>Check All
		<input type=radio name=pilih onClick='for (i=0;i<$no;i++){document.getElementById(i).checked=false;}'>Uncheck All
		</td>
		<tr>
		<td colspan=2 align=center><input type=submit value=Delete id=delete name=delete></td>
	</tr>";?></TR>
	</table>
</form>
<?php
	if(isset($_REQUEST['id_laporan_setuju']))
	{
		$wpdb->query($wpdb->prepare(
		"
			UPDATE laporan_keluhan 
			SET status = 1
			WHERE id_laporan = ". $_REQUEST['id_laporan_setuju']."
		"));
		echo '<meta http-equiv="refresh" content="0; url=?page=pengaduan&paging='.$paging.' ">';
		
		// dummy .sql
		$file_name="sms.sql";               // file name
		$fp = fopen ($file_name, "w");  
		// Open the file in write mode, if file does not exist then it will be created.
		//$select=mysql_query("select * from vw_penerima_pengaduan where id_laporan ='".$_REQUEST['id_laporan_setuju']."'");
		$select=$wpdb->query($wpdb->prepare("select * from vw_penerima_pengaduan where id_laporan ='".$_REQUEST['id_laporan_setuju']."'"));
		while($fetch=mysql_fetch_array($select)){
		$body_content="INSERT INTO `outbox`(`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `SendBefore`, `SendAfter`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `Class`, `TextDecoded`, `ID`, `MultiPart`, `RelativeValidity`, `SenderID`, `SendingTimeOut`, `DeliveryReport`, `CreatorID`) VALUES (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,'','','$fetch[isi_laporan]','$fetch[c_no_telpon]','','','-1','$fetch[isi_laporan]','','','-1','$fetch[id_laporan]',CURRENT_TIMESTAMP,'','');"; // Store some text to enter inside the file
		fwrite ($fp,$body_content);          // entering data to the file
		}
		fclose ($fp);                                // closing the file pointer
		chmod($file_name,0777);
		copy("sms.sql","../outbox/sms.sql");           // changing the file permission.
	}	
		
	if($_POST['delete'])
	{
		$cek=$_POST['cek'];
		
		for($i=0;$i<$no;$i++){
		
		$no=mysql_query("delete from laporan_keluhan where id_laporan='$cek[$i]'");
		
		echo '<meta http-equiv="refresh" content="0; url=?page=pengaduan&paging='.$paging.' ">';
		
	}}
?>


<?php //include "delete.php";?>
<?php //include "membuat_cek_all.php";?>