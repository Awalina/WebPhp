<?php

	function sel_tab($table,$field,$sort,$start,$limit)
	{
		$select_db="select * from $table where stat_id = 1 order by $field $sort LIMIT $start, $limit";
	}
	
	function sel_count_page()
	{
		$select_all="SELECT COUNT(*) as num FROM $table where stat_id = 1";
	}
	

	global $wpdb;
	$tableName="fix_vw_t_surat_keterangan_waris";		
	$targetpage = "?page=sk_waris"; 	
	echo get_permalink();
	$limit = 20; 
	
	$total_pages = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) as num FROM $tableName"));
	
	$stages = 3;
	$paging = mysql_escape_string($_REQUEST['paging']);
	if($paging>0){
		$start = ($paging - 1) * $limit; 
	}else{
		$start = 0;	
		}	
	
    // Get page data
    $listpengaduan=$wpdb->get_results($wpdb->prepare("select * from $tableName LIMIT $start, $limit "));
	
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

if ($_POST['delete'])
{
	$_POST["id"] = $_POST['kotak'];
	$_POST["jumlah_data"] = count($_POST["id"]);
	
	//echo "jumlah data : ".$jumlah_data;
	
	for($i=0;$i<$_POST["jumlah_data"];$i++)
	{
	$data = $_POST["id"][$i];
	$delete = "delete from laporan_keluhan where id = $data";
	$db_delete = mysql_query($delete) or die ("Delete Gagal");
	}
	if($db_delete)
	{
	//echo"Ada ".$_POST["jumlah_data"]." data berhasil di delete ";
	//echo"<a href = delete.php > Lihat Data </a>";
	}
echo '<meta http-equiv="refresh" content="0; url=?page=sk_waris='.$paging.' ">';
}


if ($_POST['setuju'])
{
	$_POST["id"] = $_POST['kotak'];
	$_POST["jumlah_data"] = count($_POST["id"]);
	
	//echo "jumlah data : ".$jumlah_data;
	
	for($i=0;$i<$_POST["jumlah_data"];$i++)
	{
	$data = $_POST["id"][$i];
	$ubah_status = "UPDATE laporan_keluhan SET status_id = 1 where id = $data";
	$db_ubah = mysql_query($ubah_status) or die ("Update Gagal");
	}
	if($db_ubah)
	{
	//echo"Ada ".$_POST["jumlah_data"]." data berhasil di update ";
	//echo"<a href = delete.php > Lihat Data </a>";
	}
echo '<meta http-equiv="refresh" content="0; url=?page=surat_keterangan_waris&paging='.$paging.' ">';
}

?>



<?php	
//echo $total_pages.' Results';
// pagination
 echo $paginate;
?>
    <form action="" method="post" name="myform">
        <table class="widefat post" cellspacing="0">
        <thead>
            <tr>
                <th></th>
                <th>No Pendaftaran</th>
                <th>Nama</th>
				<th>Ahli Waris</th>
                <th>Keperluan</th>
                <th>Status</th>
                <th>Proses</th>
            </tr>
        </thead>
			<?php
            $no=0;
            foreach($listpengaduan as $pengaduan){ 
            ?>
                <tbody>
                    <tr>
                        <td><?php /*?><?php echo"<input type=checkbox name=kotak[] value=". $pengaduan->id ." id=$no>"; $no++; ?><?php */?></td>
                        <td>
                            <?php 
                            $status=$pengaduan->c_status ;
                            if($pengaduan->status_id==0)
                            {
                            $url="<a href='?page=sk_waris&id_laporan_setuju=".$pengaduan->id."'>Selesai</a> | <a href='?page=sk_waris&id_laporan_tidak_setuju=".$pengaduan->id."'>Tidak Selesai</a>";
                            }else if($pengaduan->status_id==2){
								$url="";
								}
							else{
								$url="<a href='#'>Cetak Surat</a>";
								} echo $pengaduan->id  . "</td>
                            <td>" . $pengaduan->c_nama . "</td>
							<td>" . $pengaduan->c_nama_ank1 . "</td>
                            <td> Membuat " . $pengaduan->c_surat . "</td>
                            <td>" . $status . "  " . "</td>
                            <td>" . $url //."&nbsp;&nbsp;&nbsp;&nbsp;<a href=?page=pengaduan&paging=$paging&id_laporan_hapus=".$pengaduan->id_laporan.">Hapus</a>" ?>
                        </td>
                    </tr>
					<?php
                    if(isset($_GET['id_laporan_tidak_setuju']))
                    {
                    ?>
                    <tr <?php if(isset($_GET['id_laporan_tidak_setuju']) and $_GET['id_laporan_tidak_setuju']==$pengaduan->id){}else{?>style="display:none;" <?php } ?>>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						
						<td colspan="2" align="right">
							<form action="" method="post" name="myform">
								Alasan :
								<input type='text' name='reason' id='reason' />
								<input type='hidden' name='id_surat_batal' id='id_surat_batal' value="<?php echo $_GET['id_laporan_tidak_setuju']?>" />
								<input type='submit' name='submit_reason' id='submit_reason' value="Kirim" />
							</form>
						</td>
                    </tr>
					<?php
					}
					?>
                <tbody>
            <?php
            }
            ?>
            <tr>
                <?php 
					/*?><?php echo 
					"<td colspan=2 align=center>
					<input type=radio name=pilih onClick='for (i=0;i<$no;i++){document.getElementById(i).checked=true;}'>Check All
					<input type=radio name=pilih onClick='for (i=0;i<$no;i++){document.getElementById(i).checked=false;}'>Uncheck All
					</td>
					<tr>
					<td colspan=2 align=center><input type=submit value=Delete id=delete name=delete>   <input type=submit value=Setuju id=setuju name=setuju></td>
					</tr>";?><?php */
				?>
        	</tr>
        </table>
    </form>


<?php
	if(isset($_REQUEST['id_laporan_setuju']))
	{
		$test=$wpdb->query($wpdb->prepare("UPDATE  t_surat_keterangan_waris SET status_id = 1 WHERE id = ". $_REQUEST['id_laporan_setuju'].""));
		//echo '<meta http-equiv="refresh" content="0; url=?page=surat_keterangan&paging='.$paging.' ">';
		if ($test) 
		{
			echo "<script language='javascript'>alert('Data berhasil disimpan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=?page=sk_waris&paging='.$paging.' ">';
		}
	
	}
	if(isset($_REQUEST['submit_reason']))
	{
		$test=$wpdb->query($wpdb->prepare("UPDATE  t_surat_keterangan_waris SET status_id = 2,reason='".$_POST['reason']."' WHERE id = ". $_REQUEST['id_surat_batal'].""));
		//echo '<meta http-equiv="refresh" content="0; url=?page=surat_keterangan&paging='.$paging.' ">';
		if ($test) 
		{
			echo "<script language='javascript'>alert('Data berhasil disimpan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=?page=sk_waris&paging='.$paging.' ">';
		}
	
	}
	if($_POST['delete'])
	{
		$cek=$_POST['cek'];
		
		for($i=0;$i<$no;$i++){
		
		$no=mysql_query("delete from laporan_keluhan where id_laporan='$cek[$i]'");
		
		echo '<meta http-equiv="refresh" content="0; url=?page=sk_waris&paging='.$paging.' ">';
		
	}}
?>


<?php //include "delete.php";?>
<?php //include "membuat_cek_all.php";?>
