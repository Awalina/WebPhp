<script type="text/javascript" src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/datetimepicker_css.js"></script>
<form action="" method="post" name="myform">
<?php
$list_sel_get_sunting=$wpdb->get_results($wpdb->prepare("select * from fix_vw_t_surat_ket_ortu_first where id='$_GET[id_laporan_sunting]'"));
foreach($list_sel_get_sunting as $sel_get_sunting)
{
?>
<div class="post">
			
			<h2 class="title" style="font-size:20px; font-weight:bold;"><?php the_title(); ?></h2>
		<?php
		?>
			<form method="post" action="">
    <form method="post" action="">
      <table width="100%" id="tablepengaduan">
        <tr>
          <td colspan="4"><strong>Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya :</strong></td>
        </tr>
		<tr>
          <td colspan="2"><strong>I. Data Ayah</strong></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td width="2%"></td>
          <td width="40%">1. Nama</td>
          <td width="2%">:</td>
          <td width="56%"><label>
            <input name="nama_ayah_surat_ket_ortu" type="text" id="nama_ayah_surat_ket_ortu" size="55" value="<?php echo $sel_get_sunting->c_nama_ayah; ?>" />
          </label></td>
        </tr>
        <tr>
          <td></td>
          <td>2. Tempat Lahir / Tgl. Lahir</td>
          <td>:</td>
          <td><label>
			<?php $tgl_lahir_father = date('d-m-Y', strtotime($sel_get_sunting->c_tgl_lahir_ayah)); ?>
            <input name="tempat_lahir_ayah_surat_ket_ortu" type="text" id="tempat_lahir_ayah_surat_ket_ortu" size="22" value="<?php echo $sel_get_sunting->c_tempat_lahir_ayah; ?>" />
          / <a href="javascript:NewCssCal('tgl_lahir_ayah_surat_ket_ortu','ddmmyyyy')">
            <input type="text" name="tgl_lahir_ayah_surat_ket_ortu" id="tgl_lahir_ayah_surat_ket_ortu" size="20" style=" width:120px;" value="<?php echo $tgl_lahir_father; ?>" />
          <img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" /> </a></label></td>
        </tr>
        <tr>
          <td></td>
          <td>3. Warganegara</td>
          <td>:</td>
          <td><label>
            <input name="warganegara_ayah_surat_ket_ortu" type="text" id="warganegara_ayah_surat_ket_ortu" size="55" value="<?php echo $sel_get_sunting->c_warganegara_ayah; ?>" />
          </label></td>
        </tr>
		<tr>
			<td></td>
			<td>4. Agama</td>
			<td>:</td>
			<td>
				<select name="agama_ayah_surat_ket_ortu" id="agama_ayah_surat_ket_ortu" style=" width:120px;">
				<?php
					$list_agama=$wpdb->get_results($wpdb->prepare("select * from t_agama"));
					foreach($list_agama as $agama)
					{
						if($sel_get_sunting->ref_agama_ayah==$agama->id)
						{$selected_relegi="selected='selected'";}
						else
						{$selected_relegi="";}
						?>
						<option value="<?php echo $agama->id;?>" <?php echo $selected_relegi;?>><?php echo $agama->c_agama;?></option>
						<?php
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>5. Pekerjaan</td>
			<td>:</td>
			<td>
			<select name="pekerjaan_ayah_surat_ket_ortu" id="pekerjaan_ayah_surat_ket_ortu" style="width:155px;">
			<?php
			$list_pekerjaan=$wpdb->get_results($wpdb->prepare("select * from t_pekerjaan"));
			foreach($list_pekerjaan as $pekerjaan)
			{
			if($sel_get_sunting->c_pekerjaan_ayah==$pekerjaan->pekerjaan)
			{$selected_pekerjaan="selected='selected'";}
			else
			{$selected_pekerjaan="";}
			?>

			<option value="<?php echo $pekerjaan->id;?>" <?php echo $selected_pekerjaan;?>><?php echo $pekerjaan->pekerjaan;?></option> <?php
			}
			?>
			</select>
			</td>
		</tr>
        <tr>
          <td></td>
          <td>6. Tempat Tinggal</td>
          <td>:</td>
          <td></textarea>
          <label>
          <textarea name="tmp_tinggal_ayah_surat_ket_ortu" id="tmp_tinggal_ayah_surat_ket_ortu" cols="45" rows="5" style="height:50px; width:296px;"> <?php echo $sel_get_sunting->c_tempat_tinggal_ayah ?></textarea>
          </label></td>
        </tr>
        <tr>
          <td colspan="2"><strong>II. Data Ibu</strong> </td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>1. Nama</td>
          <td>:</td>
          <td><input name="nama_ibu_surat_ket_ortu" type="text" id="nama_ibu_surat_ket_ortu" size="55" value="<?php echo $sel_get_sunting->c_nama_ibu; ?>" /></td>
        </tr>
        <tr>
          <td></td>
          <td> 2. Tempat Lahir / Tgl. Lahir</td>
          <td>:</td>
          <td>
			<?php $tgl_lahir_mother = date('d-m-Y', strtotime($sel_get_sunting->c_tgl_lahir_ibu)); ?>
          	<input name="tempat_lahir_ibu_surat_ket_ortu" type="text" id="tempat_lahir_ibu_surat_ket_ortu" size="22" value="<?php echo $sel_get_sunting->c_tempat_lahir_ibu; ?>" />
            /
            <a href="javascript:NewCssCal('tgl_lahir_ibu_surat_ket_ortu','ddmmyyyy')">
                <input type="text" name="tgl_lahir_ibu_surat_ket_ortu" id="tgl_lahir_ibu_surat_ket_ortu" size="20" style=" width:120px;" value="<?php echo $tgl_lahir_mother; ?>" />
                <img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" />            </a>          </td>
		</tr>
        <tr>
          <td></td>
          <td>3. Warganegara</td>
          <td>:</td>
          <td><input name="warganegara_ibu_surat_ket_ortu" type="text" id="warganegara_ibu_surat_ket_ortu" size="55" value="<?php echo $sel_get_sunting->c_warganegara_ibu ; ?>" /></td>
        </tr>
		<tr>
			<td></td>
			<td>4. Agama</td>
			<td>:</td>
			<td>
				<select name="agama_ibu_surat_ket_ortu" id="agama_ibu_surat_ket_ortu" style=" width:120px;">
				<option value="">-- Pilih --</option>          
				<?php
					$list_agama=$wpdb->get_results($wpdb->prepare("select * from t_agama"));
					foreach($list_agama as $agama)
					{
						if($sel_get_sunting->ref_agama_ibu==$agama->id)
						{$selected_relegi="selected='selected'";}
						else
						{$selected_relegi="";}
						?>
						<option value="<?php echo $agama->id;?>" <?php echo $selected_relegi;?>><?php echo $agama->c_agama;?></option>
						<?php
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>5. Pekerjaan</td>
			<td>:</td>
			<td>
				<select name="pekerjaan_ibu_surat_ket_ortu" id="pekerjaan_ibu_surat_ket_ortu" style="width:155px;">
					<?php
					$list_pekerjaan=$wpdb->get_results($wpdb->prepare("select * from t_pekerjaan"));
					foreach($list_pekerjaan as $pekerjaan)
					{
						if($sel_get_sunting->c_pekerjaan_ibu==$pekerjaan->pekerjaan)
						{$selected_pekerjaan="selected='selected'";}
						else
						{$selected_pekerjaan="";}
						?>
						<option value="<?php echo $pekerjaan->id;?>" <?php echo $selected_pekerjaan;?>><?php echo $pekerjaan->pekerjaan;?></option> <?php
					}
					?>
				</select>
			</td>
		</tr>
        <tr>
          <td></td>
          <td>6. Tempat Tinggal</td>
          <td>:</td>
          <td><textarea name="tmp_tinggal_ibu_surat_ket_ortu" id="tmp_tinggal_ibu_surat_ket_ortu" cols="45" rows="5" style="height:50px; width:296px;"><?php echo $sel_get_sunting->c_tempat_tinggal_ibu ?></textarea></td>
        </tr>
        <tr>
          <td height="29" colspan="4"><strong>Adalah benar Ayah Kandung dan Ibu Kandung dari :</strong></td>
        </tr>
        <tr>
          <td width="2%"><strong>III</strong></td>
          <td width="38%">1. Nama</td>
          <td width="2%">:</td>
          <td width="58%"><label>
            <input name="nama_pendaftar_surat_ket_ortu" type="text" id="nama_pendaftar_surat_ket_ortu" size="55" value="<?php echo $sel_get_sunting->c_nama_pendaftar ?>" />
          </label></td>
        </tr>
        <tr>
          <td></td>
          <td>2. Tempat / Tgl. Lahir</td>
          <td>:</td>
          <td>
			<?php $tgl_lahir_daftar = date('d-m-Y', strtotime($sel_get_sunting->c_tgl_lahir_pendaftar)); ?>
          	<input name="tempat_lahir_pendaftar_surat_ket_ortu" type="text" id="tempat_lahir_pendaftar_surat_ket_ortu" size="22" value="<?php echo $sel_get_sunting->c_tempat_lahir_pendaftar; ?>" /> 
            / 
            <a href="javascript:NewCssCal('tgl_lahir_pendaftar_surat_ket_ortu','ddmmyyyy')">
                <input type="text" name="tgl_lahir_pendaftar_surat_ket_ortu" id="tgl_lahir_pendaftar_surat_ket_ortu" size="20" style=" width:120px;" value="<?php echo $tgl_lahir_daftar; ?>"/>
                <img src="http://118.96.90.225/pondok_kelapa/wp-content/themes/TechZilla9669/calendar/images/cal.gif" width="16" height="16" alt="Pilih tanggal" />           	</a>          </td>
        </tr>
        <tr>
          <td></td>
          <td>3. Warganegara</td>
          <td>:</td>
          <td><label>
            <input name="warganegara_pendaftar_surat_ket_ortu" type="text" id="warganegara_pendaftar_surat_ket_ortu" size="55" value="<?php echo $sel_get_sunting->c_warganegara_pendaftar ?>" />
          </label></td>
        </tr>
		<tr>
			<td></td>
			<td>4. Jenis Kelamin</td>
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
					<input name="jenis_kelamin_surat_ket_ortu" type="radio" id="jenis_kelamin_surat_ket_ortu" value="<?php echo $gender->id;?>" <?php echo $checked_gender;?> />
				<?php echo $gender->c_jenis_kelamin;} ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>5. Agama</td>
			<td>:</td>
			<td>
				<select name="agama_pendaftar_surat_ket_ortu" id="agama_pendaftar_surat_ket_ortu" style=" width:120px;">
				<option value="">-- Pilih --</option>          
				<?php
					$list_agama=$wpdb->get_results($wpdb->prepare("select * from t_agama"));
					foreach($list_agama as $agama)
					{
					if($sel_get_sunting->ref_agama_pendaftar==$agama->id)
					{$selected_relegi="selected='selected'";}
					else
					{$selected_relegi="";}
					?>
					<option value="<?php echo $agama->id;?>" <?php echo $selected_relegi;?>><?php echo $agama->c_agama;?></option>					
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>6. Pekerjaan</td>
			<td>:</td>
			<td>
				<select name="pekerjaan_pendaftar_surat_ket_ortu" id="pekerjaan_pendaftar_surat_ket_ortu" style="width:155px;">
					<?php
					$list_pekerjaan=$wpdb->get_results($wpdb->prepare("select * from t_pekerjaan"));
					foreach($list_pekerjaan as $pekerjaan)
					{
						if($sel_get_sunting->c_pekerjaan_pendaftar==$pekerjaan->pekerjaan)
						{$selected_pekerjaan="selected='selected'";}
						else
						{$selected_pekerjaan="";}
						?>
						<option value="<?php echo $pekerjaan->id;?>"><?php echo $pekerjaan->pekerjaan;?></option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
		<td></td>
        <td>7. Tlp/Hp</td>
			  <td>:</td>
			  <td><label></label><label>
			    <input name="tlp_hp" type="text" id="tlp_hp" size="55" value="<?php echo $sel_get_sunting->c_tlp_hp ?>" />
			  </label></td>
			  </tr>
			 <tr>
			 <td></td>
        <td>8. Email</td>
			  <td>:</td>
			  <td><label></label><label>
			    <input name="email" type="text" id="email" size="55" value="<?php echo $sel_get_sunting->c_email ?>" />
			  </label></td>
			  </tr>
				</tr>
        <tr>
          <td></td>
          <td><strong>9. Alamat Tempat Tinggal</strong></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
        	<td></td>
            <td>Nama Jalan</td>
			  <td>:</td>
			  <td><label></label><label>
<textarea name="jalan" type="text" id="jalan" rows="4" cols="31" style=" width:300px; height:100px;" ><?php echo $sel_get_sunting->c_tempat_tinggal_pendaftar ?></textarea>
			  </label></td>
	    </tr>
		<tr>
			<td></td>            
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
					  <li>Fotokopi KTP.</li>
					  <li>Fotokopi KTP Ibu dan Bapak.</li>
					  <li>Fotokopi Kartu Keluarga.</li>
					</ol></td>
                </tr>
              </table></td>
		</tr>
		<tr>
			<td></td>            
			<td></td>
			<td></td>
			<td></td>
        </tr>
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
              <input type="submit" name="send_surat_ket_ortu" id="send_surat_ket_ortu" value="Kirim" /></td>
        </tr>
      </table>
    </form>
	<?php
	}
?>
<?php
	if(isset($_POST['send_surat_ket_ortu']))
{
	//AYAH
	$nama_ayah = $_POST['nama_ayah_surat_ket_ortu'];
	$tempat_lahir_ayah = $_POST['tempat_lahir_ayah_surat_ket_ortu'];
	$tgl_lahir_ayah = date('Y-m-d', strtotime($_POST['tgl_lahir_ayah_surat_ket_ortu']));
	$warganegara_ayah= $_POST['warganegara_ayah_surat_ket_ortu'];
	$agama_ayah=$_POST['agama_ayah_surat_ket_ortu'];
	$pekerjaan_ayah=$_POST['pekerjaan_ayah_surat_ket_ortu'];
	$tempat_tinggal_ayah=$_POST['tmp_tinggal_ayah_surat_ket_ortu'];
	
	//IBU
	$nama_ibu=$_POST['nama_ibu_surat_ket_ortu'];
	$tempat_lahir_ibu=$_POST['tempat_lahir_ibu_surat_ket_ortu'];
	$tgl_lahir_ibu = date('Y-m-d', strtotime($_POST['tgl_lahir_ibu_surat_ket_ortu']));
	$warganegara_ibu = $_POST['warganegara_ibu_surat_ket_ortu'];
	$agama_ibu = $_POST['agama_ibu_surat_ket_ortu'];
	$pekerjaan_ibu=$_POST['pekerjaan_ibu_surat_ket_ortu'];
	$tempat_tinggal_ibu=$_POST['tmp_tinggal_ibu_surat_ket_ortu'];
	
	//PENDAFTAR
	$nama_pendaftar=$_POST['nama_pendaftar_surat_ket_ortu'];
	$tempat_lahir_pendaftar=$_POST['tempat_lahir_pendaftar_surat_ket_ortu'];
	$tgl_lahir_pendaftar = date('Y-m-d', strtotime($_POST['tgl_lahir_pendaftar_surat_ket_ortu']));
	$warganegara_pendaftar = $_POST['warganegara_pendaftar_surat_ket_ortu'];
	$jenis_kelamin_surat_ket_ortu= $_POST['jenis_kelamin_surat_ket_ortu'];
	$agama_pendaftar=$_POST['agama_pendaftar_surat_ket_ortu'];
	$pekerjaan_pendaftar=$_POST['pekerjaan_pendaftar_surat_ket_ortu'];
	
	//ALAMAT
	$jalan=$_POST['jalan'];
	$rt="RT. ".$_POST['rt'];
	$rw="RW. ".$_POST['rw'];
	$rt_mas=$_POST['rt'];
	$rw_mas=$_POST['rw'];
	$kelurahan=$_POST['kelurahan'];
	$kecamatan=$_POST['kecamatan'];
	$kota=$_POST['kota'];
	$kd_pos=$_POST['kd_pos'];

	$tempat_tinggal_pendaftar=$jalan.`RT.`.`$rt`.`RW.`.`$rw`.$kelurahan.$kecamatan.$kota.$kd_pos;
	$id_warga=time();
	$tlp_hp=$_POST['tlp_hp'];
	$email=$_POST['email'];
	$id_surat_laporan=$_POST['id_surat_laporan'];
	
	$cek_query="UPDATE t_surat_ket_ortu SET 
	c_nama_ayah='$nama_ayah', 
	c_tempat_lahir_ayah='$tempat_lahir_ayah', 
	c_tgl_lahir_ayah='$tgl_lahir_ayah', 
	c_warganegara_ayah='$warganegara_ayah', 
	ref_agama_ayah='$agama_ayah', 
	c_pekerjaan_ayah='$pekerjaan_ayah', 
	c_tempat_tinggal_ayah='$tempat_tinggal_ayah', 
	c_nama_ibu='$nama_ibu', 
	c_tempat_lahir_ibu='$tempat_lahir_ibu', 
	c_tgl_lahir_ibu='$tgl_lahir_ibu', 
	c_warganegara_ibu='$warganegara_ibu', 
	ref_agama_ibu='$agama_ibu', 
	c_pekerjaan_ibu='$pekerjaan_ibu', 
	c_tempat_tinggal_ibu='$tempat_tinggal_ibu', 
	c_nama_pendaftar='$nama_pendaftar', 
	c_tempat_lahir_pendaftar='$tempat_lahir_pendaftar', 
	c_tgl_lahir_pendaftar='$tgl_lahir_pendaftar', 
	c_warganegara_pendaftar='$warganegara_pendaftar', 
	ref_jenis_kelamin_pendaftar='$jenis_kelamin_surat_ket_ortu', 
	ref_agama_pendaftar='$agama_pendaftar', 
	c_pekerjaan_pendaftar='$pekerjaan_pendaftar', 
	c_tempat_tinggal_pendaftar='$tempat_tinggal_pendaftar', 
	c_tlp_hp='$tlp_hp', 
	c_email='$email' where id='$_GET[id_laporan_sunting]'";
	
	echo $cek_query;
	
	$insert_db= mysql_query($cek_query);
	
	
	if($insert_db)
		{
			echo"<script>alert('Proses Sunting Berhasil');location.href='?page=sk_tentang_orangtua'</script>";
		}
		else
		{
			echo"<script>alert('Proses Sunting Gagal');self.history.back()</script>";
		}
		
	}
?>
