<script type="text/javascript" src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/datetimepicker_css.js"></script>
<form action="" method="post" name="myform">
<?php
//echo "select * from fix_vw_surat_domisili_perusahaan_first where id='$_GET[id_laporan_sunting]'";
//echo $_GET[id_laporan_sunting];
$list_sel_get_suntings=$wpdb->get_results($wpdb->prepare("select * from fix_vw_surat_domisili_perusahaan_first where id='$_GET[id_laporan_sunting]'"));
foreach($list_sel_get_suntings as $sel_get_sunting)
{
?>
<div class="post">
		<h2 class="title" style="font-size:20px; font-weight:bold;"><?php the_title(); ?></h2>
		<?php
		?>
	<form method="post" action="">
	  <table width="100%" height="811" id="tablepengaduan">
		<tr>
    <td colspan="3">Yang bertanda tangan dibawah ini Lurah Pondok Kelapa, Kecamatan Duren Sawit :</td>
  </tr>
  <tr>
    <td colspan="3">Menerangkan bahwa</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>*No KTP / Tanda Lapor Diri</td>
    <td>:</td>
<td>
<!--<input name="no_ktp" type="text" id="no_ktp" size="55" maxlength="16"/>-->
<input name="halaman_id" id="halaman_id" type="hidden" value="<?php echo $_GET['page'];?>" style=" width:150px;">
<input name="id_surat_laporan" id="id_surat_laporan" type="hidden" value="<?php echo $_GET['id_laporan_sunting'];?>" style=" width:150px;">
<input name="ktp" id="ktp" size="55" value="<?php echo $sel_get_sunting->c_ktp; ?>" />           
</td>
</tr>
  <tr>
    <td width="27%">*Nama</td>
    <td width="3%">:</td>
    <td width="70%"><label>
      <input name="nama_srt_domisili" type="text" id="nama_srt_domisili" size="55" value="<?php echo $sel_get_sunting->c_nama_pendaftar; ?>"/>
    </label></td>
  </tr>
  <tr>
    <td> *Tempat/ Tgl. Lahir</td>
    <td>:</td>
    <td><label>
      <input name="tempat_lahir_srt_domisili" type="text" id="tempat_lahir_srt_domisili" size="22" value="<?php echo $sel_get_sunting->c_tempat_lahir; ?>"/>
	  <a href="javascript:NewCssCal('tgl_lahir_srt_domisili','ddmmyyyy')"><input type="text" name="tgl_lahir_srt_domisili" id="tgl_lahir_srt_domisili" size="20" style=" width:120px;" value="<?php echo $sel_get_sunting->c_tgl_lahir; ?>"/>
		<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" />		</a>
    </label></td>
  </tr>
<td>*Jenis Kelamin</td>
<td>:</td>
<td>
	<?php
	$list_gender=$wpdb->get_results($wpdb->prepare("select * from t_jenis_kelamin"));
	foreach($list_gender as $gender)
	{
		if($sel_get_sunting->c_jenis_kelamin==$gender->id)
		{$checked_gender="checked='checked'";}
		else
		{$checked_gender="";}
		?>
		<input type="radio" name="jenis_kelamin_domisili" id="jenis_kelamin_domisili" value="<?php echo $gender->id;?>" <?php echo $checked_gender;?>><?php echo $gender->c_jenis_kelamin;?>
		<?php
	}
	?>
</td>
</tr>
  <tr>
    <td> *Agama / Kewarganegaraan</td>
    <td>:</td>
    <td><label>
      <select name="agama_srt_domisili" id="agama_srt_domisili" style=" width:150px;">
      	<option value="">-- Pilih --</option>
		<?php
$list_agama=$wpdb->get_results($wpdb->prepare("select * from t_agama"));
foreach($list_agama as $agama)
{
if($sel_get_sunting->ref_agama==$agama->id)
{$selected_relegi="selected='selected'";}
else
{$selected_relegi="";}
?>
<option value="<?php echo $agama->id;?>" <?php echo $selected_relegi;?>><?php echo $agama->c_agama;?></option>
<?php
}
?>
		</select>
    </label>
    <input name="warga_srt_domisili" type="text" id="warga_srt_domisili" size="24" value="<?php echo $sel_get_sunting->c_kewarganegaraan; ?>"/>    </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  
  <tr>
			  <td>*Telepon / Hp</td>
			  <td>:</td>
			  <td><label></label><label>
			    <input name="tlp_hp" type="text" id="tlp_hp" size="55" value="<?php echo $sel_get_sunting->c_tlp_hp; ?>" />
			  </label></td>
			  </tr>
<tr>			  
			  <td>Email</td>
			  <td>:</td>
			  <td><label></label><label>
			    <input name="email" type="text" id="email" size="55" value="<?php echo $sel_get_sunting->c_email; ?>" />
			  </label></td>
			  </tr>
  <tr>
    <td colspan="3"><strong>Benar pada saat ini Penanggung Jawab usaha sebagainya tersebut dibawah ini :</strong>
      <label></label></td>
  </tr>
  <tr>
    <td>*Nama Perusahaan</td>
    <td>:</td>
    <td><label>
      <input name="nama_perusahaan_domisili" type="text" id="nama_perusahaan_domisili" size="55" value="<?php echo $sel_get_sunting->c_nama_perusahaan; ?>" />
    </label></td>
  </tr>
  <tr>
    <td>Jenis Usaha</td>
    <td>:</td>
    <td><label>
      <input name="jenis_usaha_domisili" type="text" id="jenis_usaha_domisili" size="55" value="<?php echo $sel_get_sunting->c_jenis_usaha ?>" />
    </label></td>
  </tr>
  <tr>
    <td>*Alamat Perusahaan</td>
    <td>:</td>
    <td><textarea name="alamat_perusahaan_domisili" id="alamat_perusahaan_domisili" cols="40" rows="5"><?php echo $sel_get_sunting->c_alamat_perusahaan; ?></textarea></td>
  </tr>
  <tr>
    <td>Status Bangunan</td>
    <td>:</td>
    <td><input type="text" name="status_bangunan" id="status_bangunan" value="<?php echo $sel_get_sunting->c_status_bangunan; ?>"  /></td>
  </tr>
  <tr>
    <td>Peruntukan Bangunan</td>
    <td>:</td>
    <td><input name="peruntukan_bangunan" type="text" id="peruntukan_bangunan" size="55" value="<?php echo $sel_get_sunting->c_peruntukan_bangunan; ?>" /></td>
  </tr>
  <tr>
    <td height="24"><p>No &amp; Tgl. IPB</p></td>
    <td>:</td>
    <td>
		<input name="no_ipb" type="text" id="no_ipb" size="22" value="<?php echo $sel_get_sunting->c_no_ipb; ?>" /> &amp; 
		<a href="javascript:NewCssCal('tgl_ipb','ddmmyyyy')">
		<label>
		<input type="text" name="tgl_ipb" id="tgl_ipb" size="20" style=" width:120px;" value="<?php echo date('d-m-Y', strtotime($sel_get_sunting->c_tgl_ipb)); ?>" />
		<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" />		</a> </label>   </td>
  </tr>
  <tr>
    <td><p><strong>Akta Pendirian Perusahaan</strong></p></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td>Notaris</td>
    <td>:</td>
    <td><input name="notaris" type="text" id="notaris" size="55" value="<?php echo $sel_get_sunting->c_akta_notaris; ?>"	/></td>
  </tr>
  <tr>
    <td>Nomor</td>
    <td>:</td>
    <td><input name="nomor_akta" type="text" id="nomor_akta" size="55" value="<?php echo $sel_get_sunting->c_akta_nomor; ?>" /></td>
  </tr>
  <tr>
    <td>*Tanggal</td>
    <td>:</td>
    <td><label>
        <a href="javascript:NewCssCal('tgl_akta','ddmmyyyy')">
		<input type="text" name="tgl_akta" id="tgl_akta" size="20" style=" width:150px;" value="<?php echo date('d-m-Y', strtotime($sel_get_sunting->c_tgl_akta)); ?>" />
        <img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" /></a></label>
    </td>
  </tr>
  <tr>
    <td>Jumlah Karyawan</td>
    <td>:</td>
    <td><input type="text" name="jumlah_karyawan" id="jumlah_karyawan" value="<?php echo $sel_get_sunting->c_jumlah_karyawan; ?>"/></td>
  </tr>
  <tr>
    <td>Penanggung Jawab / Pemimpin</td>
    <td>:</td>
    <td><input name="pemimpin" type="text" id="pemimpin" size="55" value="<?php echo $sel_get_sunting->c_penanggung_jawab; ?>" /></td>
  </tr>
	
		
		     
		        <?php
		/*
			require_once('recaptcha/recaptchalib.php');
			$publickey = "6LexTM4SAAAAANIu7TKOrynVJpUtHZmZ0lm6l27a"; // you got this from the signup page
			echo recaptcha_get_html($publickey);*/
			?>
		       <tr><td></td><td></td><td>
	            <input type="submit" id="send_srt_domisili" name="send_srt_domisili" value="Kirim">
	           </td>
                </tr>
                <tr> </tr>
              </table>
	  	<?php
}	
?> 
	</form>
	<?php
	if(isset($_POST['send_srt_domisili']))
{
	$nama_srt_dom=$_POST['nama_srt_domisili'];
	$tempat_lahir_dom=$_POST['tempat_lahir_srt_domisili'];
	$tgl_lahir_dom = date('Y-m-d', strtotime($_POST['tgl_lahir_srt_domisili']));
	$jenis_kelamin_dom= $_POST['jenis_kelamin_domisili'];
	$agama_dom= $_POST['agama_srt_domisili'];
	$warganegara_dom= $_POST['warga_srt_domisili'];
	$kd_prov=$_POST['kd_prov'];
	$kd_kab=$_POST['kd_kab'];
	$kd_kec=$_POST['kd_kec'];
	$kd_tgl=$_POST['kd_tgl'];
	$kd_bln=$_POST['kd_bln'];
	$kd_thn=$_POST['kd_thn'];
	$kd_urut=$_POST['kd_urut'];
	//$ktp_dom=$kd_prov.$kd_kab.$kd_kec.$kd_tgl.$kd_bln.$kd_thn.$kd_urut;
	$ktp_dom=$_POST['ktp'];
	
	//$ktp_dom=$_POST['ktp_domisili'];
	$perusahaan_dom=$_POST['nama_perusahaan_domisili'];
	$jenis_usaha_dom=$_POST['jenis_usaha_domisili'];
	$alamat_perusahaan_dom=$_POST['alamat_perusahaan_domisili'];
	$status_bangunan_dom=$_POST['status_bangunan'];
	$peruntukan_dom=$_POST['peruntukan_bangunan'];
	$no_ipb_dom=$_POST['no_ipb'];
	$tgl_ipb_dom = date('Y-m-d', strtotime($_POST['tgl_ipb']));
	$notaris_dom=$_POST['notaris'];
	$no_akta_dom=$_POST['nomor_akta'];
	$tgl_akta_dom = date('Y-m-d', strtotime($_POST['tgl_akta']));
	$jml_kary_dom=$_POST['jumlah_karyawan'];
	$pemimpin_dom=$_POST['pemimpin'];
	$id_warga=time();
	$tlp_hp=$_POST['tlp_hp'];
	$email=$_POST['email'];
	$id_surat_laporan=$_POST['id_surat_laporan'];
	$insert_db= mysql_query("update t_surat_domisili_perusahaan set c_nama_pendaftar='$nama_srt_dom',c_tempat_lahir='$tempat_lahir_dom',c_tgl_lahir='$tgl_lahir_dom',c_jenis_kelamin='$jenis_kelamin_dom',ref_agama='$agama_dom', c_kewarganegaraan='$warganegara_dom', c_ktp='$ktp_dom', c_nama_perusahaan='$perusahaan_dom', c_jenis_usaha='$jenis_usaha_dom', c_alamat_perusahaan='$alamat_perusahaan_dom', c_status_bangunan='$status_bangunan_dom', c_peruntukan_bangunan='$peruntukan_dom', c_no_ipb='$no_ipb_dom', c_tgl_ipb='$tgl_ipb_dom', c_akta_notaris='$notaris_dom', c_akta_nomor='$no_akta_dom', c_tgl_akta='$tgl_akta_dom', c_jumlah_karyawan='$jml_kary_dom', c_penanggung_jawab='$pemimpin_dom', c_tlp_hp='$tlp_hp', c_email='$email' where id='$id_surat_laporan'");
	
		if($insert_db)
		{
			echo"<script>alert('Proses Sunting Berhasil');location.href='?page=sk_keterangan_domisili_perusahaan'</script>";
		}
		else
		{
			echo"<script>alert('Proses Sunting Gagal');self.history.back()</script>";
		}
	}
?>