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
    	$tampil=$wpdb->get_results($wpdb->prepare("select id_laporan,nama,no_tlp,no_ktp,isi_laporan, status from laporan_keluhan order by id_laporan desc LIMIT $start, $limit "));
	
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


	
//echo $total_pages.' Results';
 // pagination
 echo $paginate;

//include "conn.php";

$tampil=mysql_query("select * from laporan_keluhan order by id_laporan desc");
$jumlah=mysql_num_rows($tampil);

if(!empty($jumlah)){
	?>
	<form action="" method="post">
	<table border="0" class="widefat post">
	<tr>
    <th>#</th>
    <th>ID</th>
    <th>Nama</th>
    <th>No. Telp</th>
    <th>Isi Laporan</th>
    <th>Status</th>
    <th>Proses</th>
    </tr>
    
	<?
	$no=0;
	while($data=mysql_fetch_array($tampil)){
		
	if($data['status']==1)
	{
		$status="Disetujui";$url="Setuju";
	}
	else
	{ 
		$status="Ditangguhkan" ;
		$url="<a href='?page=pengaduan&id_laporan_setuju=".$data['id_laporan']."'>Setuju</a>";
	} 
	?>
    
	<?php echo "
	<tr>
		<td><input type=checkbox name=cek[] value=$data[id_laporan] id=$no></td>";
		$no++;
		
		echo "  <td>$data[id_laporan]</td>
				<td>$data[nama]</td>
				<td>$data[no_tlp]</td>
				<td>$data[isi_laporan]</td>          
				<td>$status</td>
				<td>$url</td>
				
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
		<td colspan=2 align=center><input type=submit value=Delete id=delete name=delete></td>
	</tr>
	</table>
	</form>";
}

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
		$select=mysql_query("select * from vw_penerima_pengaduan where id_laporan ='".$_REQUEST['id_laporan_setuju']."'");
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

