<?php
	global $wpdb;
	$tableName="laporan_keluhan";		
	$targetpage = "?page=pengaduan"; 	
	echo get_permalink();
	$limit = 20; 
	
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
<?	
	
//echo $total_pages.' Results';
 // pagination
 echo $paginate;
?>
<?php

$tampil=mysql_query("select * from laporan_keluhan limit 5");
$jumlah=mysql_num_rows($tampil);

if(!empty($jumlah)){
	?>
	<form action="" method="post">
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
}
?>

<?
	if(isset($_REQUEST['id_laporan_setuju']))
	{
		$wpdb->query($wpdb->prepare(
		"
			UPDATE laporan_keluhan 
			SET status = 1
			WHERE id_laporan = ". $_REQUEST['id_laporan_setuju']."
		"));
		echo '<meta http-equiv="refresh" content="0; url=?page=pengaduan&paging='.$paging.' ">';
		
	}

	if(isset($_REQUEST['id_laporan_hapus']))
	{
		$wpdb->query($wpdb->prepare(
		"
			DELETE FROM laporan_keluhan 
			WHERE id_laporan = ". $_REQUEST['id_laporan_hapus']."
		"));
		echo '<meta http-equiv="refresh" content="0; url=?page=pengaduan&paging='.$paging.' ">';
		
	}
?>

