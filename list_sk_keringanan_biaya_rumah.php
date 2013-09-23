<?php

	function sel_tab($table,$field,$sort,$start,$limit)
	{
		$select_db="select * from $table order by $field $sort LIMIT $start, $limit";
	}
	
	function sel_count_page()
	{
		$select_all="SELECT COUNT(*) as num FROM fix_vw_surat_keterangan_first where c_type_form = 13";
	}
	

	global $wpdb;
	$tableName="fix_vw_surat_keterangan_first";		
	$targetpage = "?page=sk_keringanan_rumah"; 	
	echo get_permalink();
	$limit = 20; 
	
	$total_pages = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) as num FROM fix_vw_surat_keterangan_first where c_type_form = 13"));
	
	$stages = 3;
	$paging = mysql_escape_string($_REQUEST['paging']);
	if($paging>0){
		$start = ($paging - 1) * $limit; 
	}else{
		$start = 0;	
		}	
	
    // Get page data
    $listpengaduan=$wpdb->get_results($wpdb->prepare("select *  from fix_vw_surat_keterangan_first where c_type_form = 13 LIMIT $start, $limit "));
	
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
echo '<meta http-equiv="refresh" content="0; url=?page=sk_keringanan_rumah&paging='.$paging.' ">';
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
echo '<meta http-equiv="refresh" content="0; url=?page=sk_keringanan_rumah&paging='.$paging.' ">';
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
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
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
                            $status=$pengaduan->c_status;
                            if($pengaduan->status_id==4000)
                            {
								$url="";
							}
							else
							{
								$url="<a href='?page=sk_keringanan_rumah&id_laporan_setuju=".$pengaduan->id."&status_id_next=".$pengaduan->c_status_next."&id_warga=".$pengaduan->id_warga."&page_form=".$pengaduan->c_type_form."'>Lanjut</a>";
							} echo $pengaduan->id  . "</td>
                            <td>" . $pengaduan->c_nama . "</td>
                            <td>" . $pengaduan->c_tgl_lahir . "</td>
                            <td>" . $pengaduan->c_tempat_lahir . "</td>
                            <td>" . $status . "  " . "</td>
                            <td>" . $url //."&nbsp;&nbsp;&nbsp;&nbsp;<a href=?page=pengaduan&paging=$paging&id_laporan_hapus=".$pengaduan->id_laporan.">Hapus</a>" ?>
                        </td>
                    </tr>
					<?php
                    if(isset($_GET['id_laporan_setuju']))
                    {
                    ?>
                    <tr <?php if(isset($_GET['id_laporan_setuju']) and $_GET['id_laporan_setuju']==$pengaduan->id){}else{?>style="display:none;" <?php } ?>>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						
						<td colspan="2" align="right">
							<form action="" method="post" name="myform">
								Keterangan :
								<input type='text' name='reason' id='reason' />
								<input type='hidden' name='id_laporan_post' id='id_laporan_post' value="<?php echo $_GET['id_laporan_setuju']?>" />
								<input type='hidden' name='status_id_next_post' id='status_id_next_post' value="<?php echo $_GET['status_id_next']?>" />
								<input type='hidden' name='id_warga_post' id='id_warga_post' value="<?php echo $_GET['id_warga']?>" />
								<input type='hidden' name='page_form_post' id='page_form_post' value="<?php echo $_GET['page_form']?>" />
								<input type='submit' name='submit_reason' id='submit_reason' value="Kirim" onclick="getConfirmation();"/>
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
<script type="text/javascript">
<!--
function getConfirmation(){
   var retVal = confirm("Apakah yakin untuk lanjut ke proses berikutnya ?");
   if( retVal == true ){
		<?php
		$list_cek_tiga_rebu_sec=$wpdb->get_results($wpdb->prepare("select * from t_parameter where id='7'"));
		foreach($list_cek_tiga_rebu_sec as $cek_tiga_rebu_sec)
		{
			if($_GET['status_id_next']==$cek_tiga_rebu_sec->value)
			{
		?>
			window.open("<?php echo get_bloginfo('url'); ?>/export-pdf/pondok_kelapa/laporan_pondok_kelapa_sk_keringanan_biaya_rumah.php?id_cetak_surat=<?php echo $_GET['id_laporan_setuju'];?>");
		<?php
			}
		}
		?>
		return true;
   }else{
		return false;
   }
}
//-->
</script>

<?php
	if(isset($_REQUEST['submit_reason']))
	{
		$test=$wpdb->query($wpdb->prepare("insert into t_transaksi_all_surat (`id_warga`, `id_surat`, `status_id`, `keterangan`) values ('".$_POST['id_warga_post']."','".$_POST['page_form_post']."','".$_POST['status_id_next_post']."','".$_POST['reason']."')"));
		if ($test) 
		{
			echo "<script language='javascript'>alert('Data berhasil disimpan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=?page=sk_keringanan_rumah&paging='.$paging.' ">';
		}
	
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
