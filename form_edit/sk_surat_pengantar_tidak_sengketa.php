<script type="text/javascript" src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/datetimepicker_css.js"></script>
<form action="" method="post" name="myform">
<?php
//echo "select * from fix_vw_t_surat_pengantar_tidak_sengketa where id='$_GET[id_laporan_sunting]'";
//echo $_GET[id_laporan_sunting];
$list_sel_get_suntings=$wpdb->get_results($wpdb->prepare("select * from fix_vw_t_surat_keterangan_tdk_sengketa where id='$_GET[id_laporan_sunting]'"));
foreach($list_sel_get_suntings as $sel_get_sunting)
{
?>
<div class="post">
<h2 class="title" style="font-size:20px; font-weight:bold;"><?php the_title(); ?></h2>
<form method="post" action="">
			  <table width="100%" border="0" cellpadding="2" cellspacing="2" id="tablepengaduan">
               <td height="28">*No KTP</td>
<td>:</td>
<td>
<!--<input name="no_ktp" type="text" id="no_ktp" size="55" maxlength="16"/>-->
<input name="halaman_id" id="halaman_id" type="hidden" value="<?php echo $_GET['page'];?>" style=" width:150px;">
<input name="id_surat_laporan" id="id_surat_laporan" type="hidden" value="<?php echo $_GET['id_laporan_sunting'];?>" style=" width:150px;">
<input name="ktp" id="ktp" size="55" value="<?php echo $sel_get_sunting->c_no_ktp; ?>" />           
</td>
</tr>
<tr>
<td width="26%" height="28">*Nama</td>
<td width="3%">:</td>
<td width="71%"><label>
<input name="nama_srt_ket" id="nama_srt_ket" size="55" value="<?php echo $sel_get_sunting->c_nama; ?>"/>
<input name="type_form" id="type_form" type="hidden" value="26" style=" width:150px;" />
</label></td>
<tr>         </tr>
<td height="29">*Tempat Lahir</td>
<td>:</td>
<td><label>
<input name="tmp_lahir_srt_ket" id="tmp_lahir_srt_ket" size="55" value="<?php echo $sel_get_sunting->c_tempat_lahir; ?>" />
</label></td>
<tr>		</tr>
<td height="25">*Tgl. Lahir</td>
<td>:</td>
<td><label> <a href="javascript:NewCssCal('tgl_lahir_srt_ket','ddmmyyyy')"><input type="text" name="tgl_lahir_srt_ket" id="tgl_lahir_srt_ket" size="55" style=" width:150px;" value="<?php echo $sel_get_sunting->c_tgl_lahir; ?>" />
<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" />
</a></label></td>
<tr>		 </tr>
<td>*Jenis Kelamin</td>
<td>:</td>
<td>
<?php
$list_gender=$wpdb->get_results($wpdb->prepare("select * from t_jenis_kelamin"));
foreach($list_gender as $gender)
{
if($sel_get_sunting->c_gender==$gender->c_jenis_kelamin)
{$checked_gender="checked='checked'";}
else
{$checked_gender="";}
?>
<input type="radio" name="j_kelamin_srt_ket" id="j_kelamin_srt_ket" value="<?php echo $gender->id;?>" <?php echo $checked_gender;?> />
<?php echo $gender->c_jenis_kelamin;?>
<?php
}
?>
</td>
</tr>

<tr>
<td height="32">*Agama</td>
<td>:</td>
<td><label>
<select name="agama_srt_ket" id="agama_srt_ket" style="width:155px;">

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
</label></td>
</tr>
<tr>
<td height="26">*Pekerjaan</td>
<td>:</td>
<td><label>

<select name="pekerjaan_srt_ket" id="pekerjaan_srt_ket" style="width:155px;">
<?php
$list_pekerjaan=$wpdb->get_results($wpdb->prepare("select * from t_pekerjaan"));
foreach($list_pekerjaan as $pekerjaan)
{
if($sel_get_sunting->c_pekerjaan==$pekerjaan->pekerjaan)
{$selected_pekerjaan="selected='selected'";}
else
{$selected_pekerjaan="";}
?>
<option value="<?php echo $pekerjaan->id;?>" <?php echo $selected_pekerjaan;?>><?php echo $pekerjaan->pekerjaan;?></option>
<?php
}
?>
</select>
</label></td>
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
<td><strong>Alamat</strong></td>
<td>&nbsp;</td>
<label></label></td>
</tr>
<tr>
<td>Nama Jalan</td>
<td>:</td>
<td><label></label><label>
<input name="jalan" type="text" id="jalan" size="55" value="<?php echo $sel_get_sunting->c_alamat; ?>" />
</label></td>
</tr>
<tr>
<td>RT</td>
<td>:</td>
<td><label></label><label>
<input name="rt" type="text" id="rt" size="55" value="<?php echo $sel_get_sunting->c_rt; ?>" />
</label></td>
</tr>
<tr>
<td>RW</td>
<td>:</td>
<td><label></label><label>
<input name="rw" type="text" id="rw" size="55" value="<?php echo $sel_get_sunting->c_rw; ?>" />
</label></td>
</tr>


<tr>
<td>*No Surat Pengantar RT / RW</td>
<td>:</td>
<td><label>
<input type="text" name="c_no_rt_rw" id="c_no_rt_rw"  size="55" value="<?php echo $sel_get_sunting->id_warga;?>"/>
</label></td>
</tr>
                <tr>
                  <td><strong>Lahan Tidak Sengketa</strong></td>
                  <td></td>
                  <td><label></label></td>
                </tr>
				<tr>
                  <td height="26">No.Kepemilikan</td>
                  <td>:</td>
                  <td><label>
                    <input name="no_kepemilikan" type="text" id="no_kepemilikan" size="55" value="<?php echo $sel_get_sunting->c_no_kepemilikan;?>"/>
                  </label></td>
                </tr>
				<tr>
                  <td>Luas Lahan</td>
                  <td>:</td>
                  <td><label>
                    <input name="luas" type="text" id="luas" size="5" value="<?php echo $sel_get_sunting->c_luas_lahan;?>"/>
                    </label>/m2
				</td>
				</tr>
                <tr>
                  <td>Atas Nama Kepemilikan</td>
                  <td>:</td>
                  <td><label>
                    <input name="atas_nama" type="text" id="atas_nama" size="55" value="<?php echo $sel_get_sunting->c_nama_kepemilikan;?>" />
                  </label></td>
                </tr>

                <tr>
                  <td></td>
				  <tr>
                  <td><strong>Atau Lahan ini Penguasaan dari</strong></td>
                  <td></td>
                  <td><label></label></td>
                </tr>
				<tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><label>
                    <input name="nama_kuasa" type="text" id="nama_kuasa" size="55" value="<?php echo $sel_get_sunting->c_nama_penguasa;?>"/>
                  </label></td>
                </tr>				               
				<tr>
                  <td>Umur</td>
                  <td>:</td>
                  <td><label>
                    <input name="umur_kuasa" type="text" id="umur_kuasa" size="2" value="<?php echo $sel_get_sunting->c_umur_penguasa;?>" />
                  </label>Tahun
				  </td>
                </tr>
<tr>
                  <td>Pekerjaan</td>
                  <td>:</td>
                  <td><label>

<select name="pekerjaan_kuasa" id="pekerjaan_kuasa" style="width:155px;">
             	<?php
$list_pekerjaan=$wpdb->get_results($wpdb->prepare("select * from t_pekerjaan"));
foreach($list_pekerjaan as $pekerjaan_kuasa)
{
?>
 <option value="<?php echo $pekerjaan_kuasa->id;?>"><?php echo $pekerjaan_kuasa->pekerjaan;?></option>
 <?php
}
?>
           </select>

                  </label></td>
                </tr>				
                <tr>
                  <td>Kewarganegaraan</td>
                  <td>:</td>
                  <td><label>
                    <input name="warga_negara_kuasa" type="text" id="warga_negara_kuasa" size="55" value="<?php echo $sel_get_sunting->c_warga_negara_penguasa;?>"/>
                  </label></td>
                </tr>
				<tr>
				   <td>&nbsp;</td>
				   <td>&nbsp;</td>
				   <td>&nbsp;</td>
				</tr>
				<tr>
                  <td><strong>Lahan ini berbatasan dengan</strong></td>
                  <td></td>
                  <td><label></label></td>
                </tr>

                <tr>
                  <td>Sebelah Utara</td>
                  <td>:</td>
                  <td><label>
                    <input name="batas_utara" type="text" id="batas_utara" size="55" value="<?php echo $sel_get_sunting->c_sebelah_utara;?>"/>
                  </label></td>
                </tr>				
                <tr>
                  <td>Sebelah Timur</td>
                  <td>:</td>
                  <td><label>
                    <input name="batas_timur" type="text" id="batas_timur" size="55" value="<?php echo $sel_get_sunting->c_sebelah_timur;?>"/>
                  </label></td>
                </tr>
                <tr>
                  <td>Sebelah Selatan</td>
                  <td>:</td>
                  <td><label>
                    <input name="batas_selatan" type="text" id="batas_selatan" size="55" value="<?php echo $sel_get_sunting->c_sebelah_selatan;?>"/>
                  </label></td>
                </tr>
                <tr>
                  <td>Sebelah Barat</td>
                  <td>:</td>
                  <td><label>
                    <input name="batas_barat" type="text" id="batas_barat" size="55" value="<?php echo $sel_get_sunting->c_sebelah_barat;?>"/>
                  </label></td>
                </tr>					
                  <td align="center"></td>
                  <td ><p>
                       
                        <input type="submit" name="send_srt_ket_tdk_sengketa" id="send_srt_ket_tdk_sengketa" value="Kirim" />
                    </p></td>
                </tr>
                <tr> </tr>
              </table>
	</form>
<?php
	if(isset($_POST['send_srt_ket_tdk_sengketa']))
{	
	$nama = $_POST['nama_srt_ket'];
	$temp_lahir = $_POST['tmp_lahir_srt_ket'];
	$tgl_lahir = date('Y-m-d', strtotime($_POST['tgl_lahir_srt_ket']));
	$jenis_kelamin=$_POST['j_kelamin_srt_ket'];
	$agama=$_POST['agama_srt_ket'];
	$pekerjaan=$_POST['pekerjaan_srt_ket'];
	$kd_prov=$_POST['kd_prov'];
	$kd_kab=$_POST['kd_kab'];
	$kd_kec=$_POST['kd_kec'];
	$kd_tgl=$_POST['kd_tgl'];
	$kd_bln=$_POST['kd_bln'];
	$kd_thn=$_POST['kd_thn'];
	$kd_urut=$_POST['kd_urut'];
	$ktp=$_POST['ktp'];
	//$ktp=$_POST['no_ktp'];
	$jalan=$_POST['jalan'];
	$rt=$_POST['rt'];
	$rw=$_POST['rw'];
	$kelurahan=$_POST['kelurahan'];
	$kecamatan=$_POST['kecamatan'];
	$kota=$_POST['kota'];
	$alamat=$jalan.`RT.`.`$rt`.`RW.`.`$rw`.$kelurahan.$kecamatan.$kota.$kd_pos;
	$nokepemilikan=$_POST['no_kepemilikan'];
	$luas=$_POST['luas'];
	$atas_nama=$_POST['atas_nama'];
	$nama_kuasa=$_POST['nama_kuasa'];
	$umur_kuasa=$_POST['umur_kuasa'];
	$pekerjaan_kuasa=$_POST['pekerjaan_kuasa'];
	$warga_negara_kuasa=$_POST['warga_negara_kuasa'];
	$batas_utara=$_POST['batas_utara'];
	$batas_timur=$_POST['batas_timur'];
	$batas_selatan=$_POST['batas_selatan'];
	$batas_barat=$_POST['batas_barat'];
	//$kd_pos=$_POST['kd_pos'];
	$id_warga=time();
	$tlp_hp=$_POST['tlp_hp'];
	$email=$_POST['email'];

	
	$id_surat_laporan=$_POST['id_surat_laporan'];
	$insert_db=mysql_query ("UPDATE t_surat_keterangan_tdk_sengketa SET c_nama='$nama',c_tempat_lahir='$temp_lahir',c_tgl_lahir='$tgl_lahir', c_jenis_kelamin='$jenis_kelamin', ref_agama='$agama', c_pekerjaan='$pekerjaan', c_no_ktp='$ktp', c_alamat='$alamat', c_nama_jalan='$jalan', c_rt='$rt', c_rw='$rw', c_kelurahan='$kelurahan',  c_kecamatan='$kecamatan', c_kota='$kota', c_kode_pos='$kd_pos', c_nama_penguasa='$nama_kuasa', c_umur_penguasa='$umur_kuasa', c_pekerjaan_penguasa='$pekerjaan_kuasa', c_warga_negara_penguasa='$warga_negara_kuasa', c_sebelah_utara='$batas_utara', c_sebelah_timur='$batas_timur', c_sebelah_selatan='$batas_selatan', c_sebelah_barat='$batas_barat', c_no_kepemilikan='$nokepemilikan', c_luas_lahan='$luas', c_nama_kepemilikan='$atas_nama', c_tlp_hp='$tlp_hp', c_email='$email'  where id='$id_surat_laporan'");

if($insert_db)
		{
			echo"<script>alert('Proses Sunting Berhasil');location.href='?page=sk_surat_pengantar_tidak_sengketa'</script>";
		}
		else
		{
			echo"<script>alert('Proses Sunting Gagal');self.history.back()</script>";
		}
}}
?>		