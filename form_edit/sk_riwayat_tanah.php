<script type="text/javascript" src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/datetimepicker_css.js"></script>
<form action="" method="post" name="myform">
<?php
//echo "select * from fix_vw_t_surat_keterangan_riwayat_tanah where id='$_GET[id_laporan_sunting]'";
//echo $_GET[id_laporan_sunting];
$list_sel_get_suntings=$wpdb->get_results($wpdb->prepare("select * from fix_vw_t_surat_keterangan_riwayat_tanah where id='$_GET[id_laporan_sunting]'"));
foreach($list_sel_get_suntings as $sel_get_sunting)
{
?>
<div class="post">
<h2 class="title" style="font-size:20px; font-weight:bold;"><?php the_title(); ?></h2>
<?php
$list_sel_get_sunting=$wpdb->get_results($wpdb->prepare("select * from fix_vw_t_surat_keterangan_riwayat_tanah where id='$_GET[id_laporan_sunting]'"));
foreach($list_sel_get_sunting as $sel_get_sunting)
{
?>
			<form method="post" action="">
      <table width="100%" id="tablepengaduan">
        <tr>
          <td colspan="4"><strong>Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya :</strong></td>
        </tr>
        <tr>
          <td width="2%"></td>
          <td width="38%">1. Nama</td>
          <td width="2%">:</td>
          <td width="58%"><label>
            <input name="nama" type="text" id="nama" size="55" value="<?php echo $sel_get_sunting->c_nama;?>" />
          </label></td>
        </tr>
		 <tr>
          <td>I.</td>
          <td>1. tanggal</td>
          <td>:</td>
          <td><label> 	<a href="javascript:NewCssCal('tanggal','ddmmyyyy')">
						<input type="text" name="tanggal" id="tanggal" size="20" style=" width:120px ;" value="<?php echo date('d-m-Y', strtotime($sel_get_sunting->c_tanggal)); ?>"/>
						<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" /> </a></label></td>
        </tr>
        <tr>
          <td></td>
          <td>3. No tlp/hp</td>
          <td>:</td>
          <td><label>
            <input name="no_tlp_hp" type="text" id="no_tlp_hp" size="22" value="<?php echo $sel_get_sunting->c_tlp_hp;?>" />
          </label></td>
        </tr>
        <tr>
          <td></td>
          <td>4.Email</td>
          <td>:</td>
          <td><label>
            <input name="email" type="text" id="email" size="22" value="<?php echo $sel_get_sunting->c_email;?>" />
          </label></td>
        </tr>
		
		<!--<tr>
		<td></td>
		<td colspan=3>
		<label>Girik
            <input name="girik" type="text" id="girik" size="15" value="<?php echo $sel_get_sunting->c_girik;?> />
         </label>
		 <label>Persil
            <input name="persil" type="text" id="persil" size="15"value="<?php echo $sel_get_sunting->c_persil;?> />
         </label>
		 <label>Blok
            <input name="blok" type="text" id="blok" size="15" value="<?php echo $sel_get_sunting->c_blok;?> />
         </label>
		</td>
		</tr>-->
        <tr>
          <td></td>
          <td>1. Girik</td>
          <td>:</td>
          <td><label>
            <input name="girik" type="text" id="girik" size="22" value="<?php echo $sel_get_sunting->c_girik;?>" />
          </label></td>
        </tr>
        <tr>
          <td></td>
          <td>2. Persil</td>
          <td>:</td>
          <td><label>
            <input name="persil" type="text" id="persil" size="22" value="<?php echo $sel_get_sunting->c_persil;?>" />
          </label></td>
        </tr>
        <tr>
          <td></td>
          <td>3. Blok</td>
          <td>:</td>
          <td><label>
            <input name="blok" type="text" id="blok" size="22" value="<?php echo $sel_get_sunting->c_blok;?>" />
          </label></td>
        </tr>
        <tr>
          <td></td>
          <td>4. Atas Nama</td>
          <td>:</td>
          <td><label>
            <input name="atas_nama" type="text" id="atas_nama " size="55" value="<?php echo $sel_get_sunting->c_atas_nama;?>"/>
          </label></td>
        </tr>
        <tr>
          <td></td>
          <td>5. Tahun Girik</td>
          <td>:</td>
          <td><label>
            <input name="tahun" type="text" id="tahun" size="22" value="<?php echo $sel_get_sunting->c_tahun;?>"/>
          </label></td>
        </tr>
		<tr>
          <td colspan=4></td>
        </tr>
        <tr>
          <td colspan="4"><strong>Selanjutnya Terjadi Perubahan Wajib Pajak Sebagai Berikut:</strong></td>
        </tr>
		<tr>
          <td colspan="4"><strong style="font-size:12px;">Peralihan Ke 1</strong></td>
        </tr>
        <tr>
          <td>I.</td>
          <td>1. tanggal</td>
          <td>:</td>
          <td><label> 	<a href="javascript:NewCssCal('tanggal1','ddmmyyyy')">
						<input type="text" name="tanggal1" id="tanggal1" size="20" style=" width:120px ;" value="<?php echo date('d-m-Y', strtotime($sel_get_sunting->c_tanggal1)); ?>"/>
						<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" /> </a></label></td>
        </tr>
        <tr>
          <td></td>
          <td> 2. Girik</td>
          <td>:</td>
          <td>
          	<input name="girik1" type="text" id="girik1" size="22" value="<?php echo $sel_get_sunting->c_girik1;?>"/>
            </tr>
        <tr>
          <td></td>
          <td>3. Persil</td>
          <td>:</td>
          <td><input name="persil1" type="text" id="persil1" size="22"value="<?php echo $sel_get_sunting->c_persil1;?>" /></td>
        </tr>
        <tr>
          <td></td>
          <td>4. Blok</td>
          <td>:</td>
          <td><input name="blok1" type="text" id="blok1" size="22"value="<?php echo $sel_get_sunting->c_blok1;?>" /></td>
        </tr>
        <tr>
        <tr>
          <td></td>
          <td>5. Luas</td>
          <td>:</td>
          <td><input name="luas1" type="text" id="luas1" size="22" value="<?php echo $sel_get_sunting->c_luas1;?>"/>/M2</td>
        </tr>
        <tr>
          <td></td>
          <td><strong>Dijual/Hibah/Waris Berdasarkan</strong></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>6. Keterangan Waris Nomor</td>
          <td>:</td>
          <td><input name="no_waris" type="text" id="no_waris" size="55" value="<?php echo $sel_get_sunting->c_no_waris;?>"/></td>
        </tr>
        <tr>
          <td></td>
          <td>7. Tertanggal</td>
          <td>:</td>
          <td>
		  <a href="javascript:NewCssCal('tertanggal1','ddmmyyyy')">
						<input type="text" name="tertanggal1" id="tertanggal1" size="20" style=" width:120px ;" value="<?php echo date('d-m-Y', strtotime($sel_get_sunting->c_tertanggal1)); ?>"/>
						<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" /> </a></label></td>
        </tr>
        <tr>
          <td></td>
          <td>8. Atas Nama</td>
          <td>:</td>
          <td><input name="atas_nama1" type="text" id="atas_nama1" size="55" value="<?php echo $sel_get_sunting->c_atas_nama1;?>"/></td>
        </tr>
		<tr>
		<td colspan=4><td>
		</tr>
		<tr>
          <td colspan="4"><strong style="font-size:12px;">Peralihan Ke 2</strong></td>
        </tr>
        <tr>
          <td>II.</td>
          <td>1. tanggal</td>
          <td>:</td>
          <td>
		  <a href="javascript:NewCssCal('tanggal2','ddmmyyyy')">
						<input type="text" name="tanggal2" id="tanggal2" size="20" style=" width:120px ;" value="<?php echo date('d-m-Y', strtotime($sel_get_sunting->c_tanggal2)); ?>"/>
						<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" /></a></label></td>
        </tr>
        <tr>
          <td></td>
          <td> 2. Girik</td>
          <td>:</td>
          <td>
          	<input name="girik2" type="text" id="girik2" size="22"value="<?php echo $sel_get_sunting->c_girik2;?>" />
            </tr>
        <tr>
          <td></td>
          <td>3. Persil</td>
          <td>:</td>
          <td><input name="persil2" type="text" id="persil2" size="22" value="<?php echo $sel_get_sunting->c_persil2;?>" /></td>
        </tr>
        <tr>
          <td></td>
          <td>4. Blok</td>
          <td>:</td>
          <td><input name="blok2" type="text" id="blok2" size="22" value="<?php echo $sel_get_sunting->c_blok2;?>"/></td>
        </tr>
        <tr>
          <td></td>
          <td>5. Atas Nama</td>
          <td>:</td>
          <td><input name="atas_nama2" type="text" id="atas_nama2" size="45" value="<?php echo $sel_get_sunting->c_atas_nama2;?>"/></td>
        </tr>
        <tr>
          <td></td>
          <td><strong>Dijual/Hibah/Waris Berdasarkan</strong></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>6. Luas</td>
          <td>:</td>
          <td><input name="luas2" type="text" id="luas2" size="22" value="<?php echo $sel_get_sunting->c_luas2;?>"/>/M2</td>
        </tr>
        <tr>
          <td></td>
          <td>7. Diberikan Kepada</td>
          <td>:</td>
          <td><input name="kepada2" type="text" id="kepada2" size="55" value="<?php echo $sel_get_sunting->c_atas_nama3;?>" /></td>
        </tr>
        <tr>
          <td></td>
          <td>8. AJB Nomor</td>
          <td>:</td>
          <td><input name="ajb_no2" type="text" id="ajb_no2" size="55" value="<?php echo $sel_get_sunting->c_ajb_no2;?>"/></td>
        </tr>
        <tr>
          <td></td>
          <td>9. Tertanggal</td>
          <td>:</td>
          <td>
		  <a href="javascript:NewCssCal('tertanggal2','ddmmyyyy')">
						<input type="text" name="tertanggal2" id="tertanggal2" size="20" style=" width:120px ;" value="<?php echo date('d-m-Y', strtotime($sel_get_sunting->c_tertanggal2)); ?>"/>
						<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" /> </a></label></td>
        </tr>
		 <tr>
          <td></td>
          <td><strong>Yang Dibuat Di Hadapan</strong></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>10. Nama</td>
          <td>:</td>
          <td><input name="hadapan_nama2" type="text" id="hadapan_nama2" size="55" value="<?php echo $sel_get_sunting->c_hadapan_nama2;?>"/></td>
        </tr>
        <tr>
          <td></td>
          <td>11. Selaku PPAT Wilayah</td>
          <td>:</td>
          <td><input name="ppat_wilayah2" type="text" id="ppat_wilayah2" size="55"value="<?php echo $sel_get_sunting->c_ppat_wilayah2;?>" /></td>
        </tr>
		<tr>
		<td colspan=4><td>
		</tr>
		<tr>
          <td colspan="4"><strong style="font-size:12px;">Peralihan Ke 3</strong></td>
        </tr>
        <tr>
          <td>III.</td>
          <td>1. tanggal</td>
          <td>:</td>
          <td>
		 <a href="javascript:NewCssCal('tanggal3','ddmmyyyy')">
						<input type="text" name="tanggal3" id="tanggal3" size="20" style=" width:120px ;" value="<?php echo date('d-m-Y', strtotime($sel_get_sunting->c_tanggal3)); ?>"/>
						<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" /> </a></label></td>
        </tr>
        <tr>
          <td></td>
          <td> 2. Girik</td>
          <td>:</td>
          <td>
          	<input name="girik3" type="text" id="girik3" size="22" value="<?php echo $sel_get_sunting->c_girik3;?>" />
            </tr>
        <tr>
          <td></td>
          <td>3. Persil</td>
          <td>:</td>
          <td><input name="persil3" type="text" id="persil3" size="22" value="<?php echo $sel_get_sunting->c_persil3;?>"/></td>
        </tr>
        <tr>
          <td></td>
          <td>4. Blok</td>
          <td>:</td>
          <td><input name="blok3" type="text" id="blok3" size="22" value="<?php echo $sel_get_sunting->c_blok3;?>" /></td>
        </tr>
        <tr>
          <td></td>
          <td>5. Atas Nama</td>
          <td>:</td>
          <td><input name="atas_nama3" type="text" id="atas_nama3" size="45" value="<?php echo $sel_get_sunting->c_atas_nama3;?>"/></td>
        </tr>
        <tr>
          <td></td>
          <td><strong>Dijual/Hibah/Waris Berdasarkan</strong></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>6. Luas</td>
          <td>:</td>
          <td><input name="luas3" type="text" id="luas3" size="22" value="<?php echo $sel_get_sunting->c_luas3;?>"/>/M2</td>
        </tr>
        <tr>
          <td></td>
          <td>7. Diberikan Kepada</td>
          <td>:</td>
          <td><input name="kepada3" type="text" id="kepada3" size="55" value="<?php echo $sel_get_sunting->c_kepada3;?>" /></td>
        </tr>
        <tr>
          <td></td>
          <td>8. AJB Nomor</td>
          <td>:</td>
          <td><input name="ajb_no3" type="text" id="ajb_no3" size="55" value="<?php echo $sel_get_sunting->c_ajb_no3;?>"/></td>
        </tr>
        <tr>
          <td></td>
          <td>9. Tertanggal</td>
          <td>:</td>
          <td>
		 <a href="javascript:NewCssCal('tertanggal3','ddmmyyyy')">
						<input type="text" name="tertanggal3" id="tertanggal3" size="20" style=" width:120px ;" value="<?php echo date('d-m-Y', strtotime($sel_get_sunting->c_tertanggal3)); ?>"/>
						<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" /> </a></label></td>
        </tr>
		 <tr>
          <td></td>
          <td><strong>Yang Dibuat Di Hadapan</strong></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>10. Nama</td>
          <td>:</td>
          <td><input name="hadapan_nama3" type="text" id="hadapan_nama3" size="55" value="<?php echo $sel_get_sunting->c_hadapan_nama3;?>"/></td>
        </tr>
        <tr>
          <td></td>
          <td>11. Selaku PPAT Wilayah</td>
          <td>:</td>
          <td><input name="ppat_wilayah3" type="text" id="ppat_wilayah3" size="55" value="<?php echo $sel_get_sunting->c_ppat_wilayah3;?>"/></td>
        </tr>
		<tr>
		<td colspan=4></td>
		</tr>
		<tr>
		<td colspan=3></td>
		<td><table width="99%" border="0" cellpadding="0" cellspacing="0">
                
              </table></td>
		</tr>
        <!--<tr>
          <td colspan=2><strong>Pada Saat Ini tanah</strong></td>
          <td></td>
          <td></td>
        </tr>
		<tr>
          <td colspan="4"><strong style="font-size:12px;">Peralihan Ke 1</strong></td>
        </tr>
        <tr>
          <td>IV.</td>
          <td>1. Luas</td>
          <td>:</td>
          <td><input name="luas4" type="text" id="luas4" size="22" />/M2</td>
        </tr>
        <tr>
          <td></td>
          <td>2. Tercatat Atas Nama</td>
          <td>:</td>
          <td>
          	<input name="atas_nama4" type="text" id="atas_nama4" size="55" />
            </tr>-->
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td ><?php
			/*
			require_once('recaptcha/recaptchalib.php');
			$publickey = "6LexTM4SAAAAANIu7TKOrynVJpUtHZmZ0lm6l27a"; // you got this from the signup page
			echo recaptcha_get_html($publickey);*/ 
			?>
              <input type="submit" name="send_sk_riwayat_tanah" id="send_sk_riwayat_tanah" value="Kirim" /></td>
        </tr>
      </table>
    </form>
	<?php
	}
	?>
	<?php
	if(isset($_POST['send_sk_riwayat_tanah']))
	{
		$nama=$_POST['nama'];
		$tanggal=date('Y-m-d', strtotime($_POST['tanggal'])); 
		$girik=$_POST['girik'];
		$persil=$_POST['persil'];
		$blok=$_POST['blok'];
		$atas_nama=$_POST['atas_nama'];
		$tahun=$_POST['tahun'];
		$tanggal1=date('Y-m-d', strtotime($_POST['tanggal1'])); 
		$girik1=$_POST['girik1'];
		$persil1=$_POST['persil1'];
		$blok1= $_POST['blok1'];
		$luas1=$_POST['luas1'];
		$ket_waris_no1=$_POST['no_waris'];
		$tertanggal1=date('Y-m-d', strtotime($_POST['tertanggal1'])); 
		$atas_nama1=$_POST['atas_nama1'];
		$tanggal2=date('Y-m-d', strtotime($_POST['tanggal2'])); 
		$girik2=$_POST['girik2'];
		$persil2=$_POST['persil2'];
		$blok2=$_POST['blok2'];
		$atas_nama2=$_POST['atas_nama2'];
		$luas2=$_POST['luas2'];
		$kepada2=$_POST['kepada2'];
		$ajb_no2=$_POST['ajb_no2'];
		$tertanggal2=date('Y-m-d', strtotime($_POST['tertanggal2']));
		$hadapan_nama2=$_POST['hadapan_nama2'];
		$ppat_wilayah2=$_POST['ppat_wilayah2'];
		$tanggal3=date('Y-m-d', strtotime($_POST['tanggal3'])); 
		$girik3=$_POST['girik3'];
		$persil3=$_POST['persil3'];
		$blok3=$_POST['blok3'];
		$atas_nama3=$_POST['atas_nama3'];
		$luas3=$_POST['luas3'];
		$kepada3=$_POST['kepada3'];
		$ajb_no3=$_POST['ajb_no3'];
		$tertanggal3=date('Y-m-d', strtotime($_POST['tertanggal3']));
		$hadapan_nama3=$_POST['hadapan_nama3'];
		$ppat_wilayah3=$_POST['ppat_wilayah3'];
		$luas4=$_POST['luas4'];
		$atas_nama4=$_POST['atas_nama4'];
		$id_warga=time();
		$tlp_hp=$_POST['no_tlp_hp'];
		$email=$_POST['email'];
		$id_surat_laporan=$_POST['id_surat_laporan'];
		//echo $params="update t_surat_keterangan_riwayat_tanah set c_nama='$nama', c_tanggal='$tanggal', c_tlp_hp='$tlp_hp', c_email='$email',  c_girik='$girik', c_persil='$persil', c_blok='$blok', c_atas_nama='$atas_nama', c_tahun='$tahun', c_tanggal1='$tanggal1', c_girik1='$girik1', c_persil1='$persil1', c_blok1='$blok1', c_luas1='$luas1', c_no_waris='$ket_waris_no1', c_tertanggal1='$tertanggal1', c_atas_nama1='$atas_nama1', c_tanggal2='$tanggal2, c_girik2='$girik2', c_persil2='$persil2', c_blok2='$blok2', c_atas_nama2='$atas_nama2', c_luas2='$luas2', c_kepada2='$kepada2', c_ajb_no2='$ajb_no2', c_tertanggal2='$tertanggal2', c_hadapan_nama2='$hadapan_nama2', c_ppat_wilayah2='$ppat_wilayah2', c_tanggal3='$tanggal3', c_girik3='$girik3', c_persil3='$persil3', c_blok3='$blok3', c_atas_nama3='$atas_nama3', c_luas3='$luas3', c_kepada3='$kepada3', c_ajb_no3='$ajb_no3', c_tertanggal3='$tertanggal3', c_hadapan_nama3='$hadapan_nama3', c_ppat_wilayah3='$ppat_wilayah3', id_warga='$id_warga' where id='$_GET[id_laporan_sunting]'";
		//echo "<br>";
		$params2="UPDATE t_surat_keterangan_riwayat_tanah 
			SET 
			c_nama = '$nama', c_tanggal = '$tanggal', c_tlp_hp = '$tlp_hp', c_email = '$email', c_girik = '$girik',	c_persil = '$persil', c_blok = '$blok', c_atas_nama = '$atas_nama', c_tahun = '$tahun',	c_tanggal1 = '$tanggal1', c_girik1 = '$girik1', c_persil1 = '$persil1', c_blok1 = '$blok1', c_luas1 = '$luas1',  c_no_waris = '$ket_waris_no1', c_tertanggal1 = '$tertanggal1', c_atas_nama1 = '$atas_nama1', c_tanggal2 = '$tanggal2', c_girik2 = '$girik2', c_persil2 = '$persil2', c_blok2 = '$blok2', c_atas_nama2 = '$atas_nama2', c_luas2 = '$luas2', c_kepada2 = '$kepada2', c_ajb_no2 = '$ajb_no2', c_tertanggal2 = '$tertanggal2', c_hadapan_nama2 = '$hadapan_nama2', c_ppat_wilayah2 = '$ppat_wilayah2', c_tanggal3 = '$tanggal3', c_girik3 = '$girik3', c_persil3 = '$persil3', c_blok3 = '$blok3', c_atas_nama3 = '$atas_nama3', c_luas3 = '$luas3', c_kepada3 = '$kepada3', c_ajb_no3 = '$ajb_no3', c_tertanggal3 = '$tertanggal3', c_hadapan_nama3 = '$hadapan_nama3', c_ppat_wilayah3 = '$ppat_wilayah3' where id = '$_GET[id_laporan_sunting]'";
			
		$insert_db= mysql_query ($params2);
		
		if($insert_db)
		{
			echo"<script>alert('Proses Sunting Berhasil');location.href='?page=sk_riwayat_tanah'</script>";
		}
		else
		{
			echo"<script>alert('Proses Sunting Gagal');self.history.back()</script>";
		}
	}
	}
?>