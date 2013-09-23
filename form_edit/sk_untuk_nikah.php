<form action="<?php echo get_bloginfo('url'); ?>/wp-content/plugins/administrasi-laporan/form_edit/proses_form_default.php" method="post" name="myform">
<?php
$list_sel_get_sunting=$wpdb->get_results($wpdb->prepare("select * from fix_t_surat_keterangan_untuk_nikah_first where id='$_GET[id_laporan_sunting]'"));
foreach($list_sel_get_sunting as $sel_get_sunting)
{
?>
<div class="post">
			<p class="posttime"><?php tanggal_indonesia(); //the_time('M d, Y') ?></p>
			<h2 class="title" style="font-size:20px; font-weight:bold;"><?php the_title(); ?></h2>
		<?php
		?>
	<form method="post" action="">
  <table width="100%" id="tablepengaduan">
	<tr>
    <td colspan="3"><strong>Yang bertanda tangan di bawah ini menerangkan dengan sesungguhnya :</strong></td>
  </tr>
  <tr>
    <td><strong>I. </strong></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>1. No. KTP</td>
    <td>:</td>
    <td>    
        <input name="halaman_id" id="halaman_id" type="hidden" value="<?php echo $_GET['page'];?>" style=" width:150px;">
			<input name="id_surat_laporan" id="id_surat_laporan" type="hidden" value="<?php echo $_GET['id_laporan_sunting'];?>" style=" width:150px;">
			<input name="ktp" id="ktp" size="55" value="<?php echo $sel_get_sunting->c_no_ktp; ?>" />
    </td>
</tr>
  <tr>
    <td width="26%">1. Nama</td>
    <td width="3%">:</td>
    <td width="71%"><label>
      <input name="nama_pendaftar" type="text" id="nama_pendaftar" size="63" value="<?php echo $sel_get_sunting->c_nama; ?>" />
    </label></td>
  </tr>
  <tr>
    <td>2. Tempat/ Tgl. Lahir</td>
    <td>:</td>
    <td><label>
      <input name="tempat_lahir_pendaftar" type="text" id="tempat_lahir_pendaftar" size="26" />
		<a href="javascript:NewCssCal('tgl_lahir_pendaftar','ddmmyyyy')"><input type="text" name="tgl_lahir_pendaftar" id="tgl_lahir_pendaftar" size="20" style=" width:150px;"/>
		<img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" />		</a>
    </label></td>
  </tr>
  <tr>
    <td>3. Warganegara</td>
    <td>:</td>
    <td><label>
      <input name="warga_pendaftar" type="text" id="warga_pendaftar" size="63" value="<?php echo $sel_get_sunting->c_warganegara; ?>" />
    </label></td>
  </tr>
  <tr>
    <td>4. Jenis Kelamin </td>
    <td>:</td>
    <td>
        <label>
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
            <?php } ?>
        </label>
    </td>
  </tr>
  <tr>
    <td>5. Agama</td>
    <td>:</td>
    <td><label>
      <select name="agama_pendaftar" id="agama_pendaftar" style="width:200px;">
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
    <td>6. Pekerjaan</td>
    <td>:</td>
    <td><label>
<select name="pekerjaan_pendaftar" id="pekerjaan_pendaftar" style="width:155px;">
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
        <td>7. Tlp/Hp</td>
			  <td>:</td>
			  <td><label></label><label>
			    <input name="tlp_hp" type="text" id="tlp_hp" size="55" value="<?php echo $sel_get_sunting->c_tlp_hp ?>" />
			  </label></td>
			  </tr>
			 <tr>
        <td>8. Email</td>
			  <td>:</td>
			  <td><label></label><label>
			    <input name="email" type="text" id="email" size="55" value="<?php echo $sel_get_sunting->c_email ?>" />
			  </label></td>
			  </tr>
				</tr>
  <tr>
    <td><strong>9. Tempat Tinggal</strong></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td>Nama Jalan</td>
			  <td>:</td>
			  <td><label></label><label>
			    <input name="jalan" type="text" id="jalan" size="55" <?php echo $sel_get_sunting->c_alamat ?> />
			  </label></td>
    </tr>
  <tr>
                 <td>10. No Surat Pengantar RT / RW</td>
                 <td>:</td>
                 <td><label>
                   <input type="text" name="c_no_rt_rw" id="c_no_rt_rw"  size="55" value="<?php echo $sel_get_sunting->c_no_rt_rw ?>" />
                 </label></td>
               </tr>
  <tr>
    <td>11. Bin / Binti</td>
    <td>:</td>
    <td><input name="bin_pendaftar" type="text" id="bin_pendaftar" size="63" value="<?php echo $sel_get_sunting->c_bin_binti ?>" /></td>
  </tr>
  <tr>
    <td>12. Status Perkawinan</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr>
    <td height="83"><blockquote>a. Jika pria terangkan perjaka, duda / beristri dan berapa istrinya</blockquote></td>
    <td>:</td>
    <td><textarea name="status_kawin_pria" id="status_kawin_pria" cols="45" rows="5"value="<?php echo $sel_get_sunting->c_jika_jejaka_duda ?>"></textarea></td>
  </tr>
  <tr>
    <td><blockquote>b. Jika wanita teramgkan perawan atau janda</blockquote></td>
    <td>:</td>
    <td><textarea name="status_kawin_wanita" id="status_kawin_wanita" cols="40" rows="5" value="<?php echo $sel_get_sunting->c_jika_janda_perawan ?>"></textarea></td>
  </tr>
  <tr>
    <td>13. Nama Istri / Suami terdahulu</td>
    <td>:</td>
    <td><input name="nama_suami_istri_lama" type="text" id="nama_suami_istri_lama" size="63" value="<?php echo $sel_get_sunting->c_nama_istri_suami_lama ?>" /></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><table width="99%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="28%">Persyaratan :</td>
                  <td width="72%"></td>
                </tr>
                <tr>
				  <td></td>
                  <td><ol>
					  <li>Apabila sudah pernah menikah dan sudah bercerai, maka wajib melampirkan Akta Perceraian.</li>
				  </ol></td>
                </tr>
              </table></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
			<tr>	
			<td></td><td></td><td >
		<?php
			/*require_once('recaptcha/recaptchalib.php');
			$publickey = "6LexTM4SAAAAANIu7TKOrynVJpUtHZmZ0lm6l27a"; // you got this from the signup page
			echo recaptcha_get_html($publickey);*/
			?>
			<input type="submit" id="send_ket_utk_nikah" name="send_ket_utk_nikah" value="Kirim"></td>
			</tr>
			<tr>			</tr>
	  </table>
	  
	</form>
<?php
}?>
