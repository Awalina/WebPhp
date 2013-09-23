<?php
include ('config.php');
if(isset($_POST['send_srt_ket']))
{	
	$nama = $_POST['nama_srt_ket'];
	$temp_lahir = $_POST['tmp_lahir_srt_ket'];
	$tgl_lahir = date('Y-m-d', strtotime($_POST['tgl_lahir_srt_ket']));
	$jenis_kelamin= $_POST['j_kelamin_srt_ket'];
	$agama=$_POST['agama_srt_ket'];
	$pekerjaan=$_POST['pekerjaan_srt_ket'];
	$ktp=$_POST['ktp'];
	/*$jalan=$_POST['jalan'];
	$rt="RT. ".$_POST['rt'];
	$rw="RW. ".$_POST['rw'];
	$rt_mas=$_POST['rt'];
	$rw_mas=$_POST['rw'];
	$kelurahan=$_POST['kelurahan'];
	$kecamatan=$_POST['kecamatan'];
	$kota=$_POST['kota'];
	$kd_pos=$_POST['kd_pos']; */
	$alamat=$_POST['jalan'];
	$keperluan=$_POST['keperluan_srt_ket'];
	//$type_form=$_POST['type_form'];
	//$id_warga=time();
	$tlp_hp=$_POST['tlp_hp'];
	$email=$_POST['email'];
	$no_rt_rw=$_POST['c_no_rt_rw'];
	$halaman_id=$_POST['halaman_id'];
	$id_surat_laporan=$_POST['id_surat_laporan'];
	$insert_db= mysql_query("update t_surat_keterangan set c_nama='$nama',c_tempat_lahir='$temp_lahir',c_tgl_lahir='$tgl_lahir', c_jenis_kelamin='$jenis_kelamin', ref_agama='$agama', c_pekerjaan='$pekerjaan', c_no_ktp='$ktp', c_alamat='$alamat', c_keperluan='$keperluan', c_tlp_hp='$tlp_hp', c_email='$email', c_no_rt_rw='$no_rt_rw' where id='$id_surat_laporan'");
	/*echo	"
	update t_surat_keterangan set c_nama='$nama',c_tempat_lahir='$temp_lahir',c_tgl_lahir='$tgl_lahir', c_jenis_kelamin='$jenis_kelamin', ref_agama='$agama', c_pekerjaan='$pekerjaan', c_no_ktp='$ktp', c_alamat='$alamat', c_keperluan='$keperluan', c_tlp_hp='$tlp_hp', c_email='$email', c_no_rt_rw='$no_rt_rw' where id='$id_surat_laporan'	
	";*/
		if($insert_db)
		{
			echo"<script>alert('Proses Sunting Berhasil');location.href='$url?page=$halaman_id'</script>";
		}
		else
		{
			echo"<script>alert('Proses Sunting Gagal');self.history.back()</script>";
		}
}
?>		