<script type="text/javascript" src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/datetimepicker_css.js"></script>
<form action="<?php echo get_bloginfo('url'); ?>/wp-content/plugins/administrasi-laporan/form_edit/proses_form_default.php" method="post" name="myform">
<?php
$list_sel_get_sunting=$wpdb->get_results($wpdb->prepare("select * from fix_vw_surat_keterangan_first where id='$_GET[id_laporan_sunting]'"));
foreach($list_sel_get_sunting as $sel_get_sunting)
{
?>
<div class="post">
<h2 class="title" style="font-size:20px; font-weight:bold;"><?php the_title(); ?></h2>
<form method="post" action="">
<table width="100%" border="0" cellpadding="0" cellspacing="2" id="tablepengaduan">
<tr>
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
<input name="tlp_hp" type="text" id="tlp_hp" size="55" value="<?php echo $sel_get_sunting->c_tlp_hp ?>" />
</label></td>
</tr>
<tr>			  
<td>Email</td>
<td>:</td>
<td><label></label><label>
<input name="email" type="text" id="email" size="55" value="<?php echo $sel_get_sunting->c_email ?>" />
</label></td>
</tr> 
<tr>
<td><strong>Alamat</strong></td>
<td>&nbsp;</td>
<td><!--<label>
<textarea name="alamat_srt_ket" id="alamat_srt_ket" rows="4" cols="31" style=" width:300px; height:100px;"></textarea>
</label>-->
<label></label></td>
</tr>
<tr>
<td>Nama Jalan</td>
<td>:</td>
<td><label></label><label>
<input name="jalan" type="text" id="jalan" size="55" value="<?php echo $sel_get_sunting->c_alamat ?>" />
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
<td height="105">*Keperluan</td>
<td>:</td>
<td><label>
<textarea name="keperluan_srt_ket" id="keperluan_srt_ket" rows="4" cols="31" style=" width:300px; height:100px;"><?php echo $sel_get_sunting->c_keperluan;?>
</textarea>
</label></td>
</tr>
<td align="center"></td><td >
<?php
/*
require_once('recaptcha/recaptchalib.php');
$publickey = "6LexTM4SAAAAANIu7TKOrynVJpUtHZmZ0lm6l27a"; // you got this from the signup page
echo recaptcha_get_html($publickey);
*/
?>
<input type="submit" name="send_srt_ket" id="send_srt_ket" value="Kirim"></td>
</tr>

</table>	
<?php

}
?>
</form>