<?php

/*

Plugin Name: Administrasi Laporan

Plugin URI: http://solomaya.com

Description: Administrasi Laporan

Author: boko

Author URI: http://solomaya.com

*/



// Hook for adding admin menus

add_action('admin_menu', 'my_plugin_menu');



function my_plugin_menu() {

	add_menu_page('Adminstrasi', 'Administrasi', 'manage_options', 'top-level', 'my_plugin_options');

		add_submenu_page('top-level', 'Surat Keterangan', 'Surat Keterangan', 'manage_options', 'surat_keterangan', 'surat_keterangan');
	
		add_submenu_page('top-level', 'SK - Asal Usul', 'SK - Asal Usul', 'manage_options', 'sk_asal_usul', 'sk_asal_usul');
				
		add_submenu_page('top-level', 'SK - Tentang Orang tua', 'SK - Tentang Orang tua', 'manage_options', 'sk_tentang_orangtua', 	
						'sk_tentang_orangtua');
	
		add_submenu_page('top-level', 'Surat Pengantar', 'Surat Pengantar', 'manage_options', 'surat_pengantar', 'surat_pengantar');

		add_submenu_page('top-level', 'SK - Nikah', 'SK - Nikah', 'manage_options', 'sk_nikah', 'sk_nikah');
		
		add_submenu_page('top-level', 'SK - Untuk Nikah', 'SK - Untuk Nikah', 'manage_options', 'sk_untuk_nikah', 'sk_untuk_nikah');
		
		add_submenu_page('top-level', 'SK - Untuk Cerai', 'SK - Untuk Cerai', 'manage_options', 'sk_untuk_cerai', 'sk_untuk_cerai');
		
		add_submenu_page('top-level', 'SK - Belum Nikah', 'SK - Belum Nikah', 'manage_options', 'sk_belum_nikah', 'sk_belum_nikah');

		add_submenu_page('top-level', 'SK - Pembuatan Akte Kelahiran', 'SK - Pembuatan Akte Kelahiran', 'manage_options', 'sk_akte_kelahiran', 'sk_akte_kelahiran');

		add_submenu_page('top-level', 'SK - Pembuatan Surat Pensiun', 'SK - Pembuatan Surat Pensiun', 'manage_options', 'sk_pensiun', 'sk_pensiun');

		add_submenu_page('top-level', 'SK - Waris', 'SK - Waris', 'manage_options', 'sk_waris', 'sk_waris');
		
		add_submenu_page('top-level', 'SK - Catatan Kepolisian', 'SK - Catatan Kepolisian', 'manage_options', 'sk_ck', 'sk_ck');
		
				add_submenu_page('top-level', 'SK - Keterangan Domisili Perusahan', 'SK - Keterangan Domisili Perusahan', 'manage_options', 'sk_keterangan_domisili_perusahan', 'sk_keterangan_domisili_perusahan');

		add_submenu_page('top-level', 'SK - Keringanan Biaya Rumah Sakit dan Biaya Sekolah Pendidikan', 'SK - Keringanan Biaya Rumah Sakit dan Biaya Sekolah Pendidikan', 'manage_options', 'sk_keringanan_rumah', 'sk_keringanan_rumah');

		add_submenu_page('top-level', 'SK - Riwayat Tanah', 'SK - Riwayat Tanah', 'manage_options', 'sk_riwayat_tanah', 'sk_riwayat_tanah');

		add_submenu_page('top-level', 'SK - Surat Pengantar Tidak Sengketa', 'SK - Surat Pengantar Tidak Sengketa', 'manage_options', 'sk_surat_pengantar_tidak_sengketa', 'sk_surat_pengantar_tidak_sengketa');
		
		add_submenu_page('top-level', 'SK - Penerbitan/Pecah/Mutasi Balik Nama PBB', 'SK - Penerbitan/Pecah/Mutasi Balik Nama PBB', 'manage_options', 'sk_penerbitan', 'sk_penerbitan');

		add_submenu_page('top-level', 'SK - Keringanan Pembayaran PBB', 'SK - Keringanan Pembayaran PBB', 'manage_options', 'sk_keringanan', 'sk_keringanan');
		
add_submenu_page('top-level', 'Surat Permohonan Izin UGG', 'Surat Permohonan Izin UGG', 'manage_options', 's_permohonan', 's_permohonan');	

add_submenu_page('top-level', 'SK - Berpergian', 'SK - Berpergian', 'manage_options', 'sk_pergi', 'sk_pergi');	
add_submenu_page('top-level', 'SK - Pelayanan Umum', 'SK - Pelayanan Umum', 'manage_options', 'sk_pelayanan', 'sk_pelayanan');	
add_submenu_page('top-level', 'Surat Permohonan KPR/BTN', 'Surat Permohonan KPR/BTN', 'manage_options', 's_permohonan_kpr', 's_permohonan_kpr');	
add_submenu_page('top-level', 'SK - Izin Pesta/Keramaian', 'SK - Izin Pesta/Keramaian', 'manage_options', 'sk_izin_pesta', 'sk_izin_pesta');		
add_submenu_page('top-level', 'Surat Akte Jual Beli', 'Surat Akte Jual Beli', 'manage_options', 'sk_akte_jual_beli', 'sk_akte_jual_beli');		
add_submenu_page('top-level', 'Surat Keterangan Kematian Suami Istri', 'Surat Keterangan Kematian Suami Istri', 'manage_options', 'sk_kematian_suami_istri', 'sk_kematian_suami_istri');
add_submenu_page('top-level', 'Surat Persyaratan Lain-lain', 'Surat Persyaratan Lain-lain', 'manage_options', 'sk_persyaratan_lain_lain', 'sk_persyaratan_lain_lain');		


}



function my_plugin_options() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Administrasi Laporan</h2>';

	echo '<p><a href="?page=surat_keterangan">Surat Keterangan</p></a>';

	echo '<p><a href="?page=sk_asal_usul">SK - Asal Usul</p></a>';
	
	echo '<p><a href="?page=sk_tentang_orangtua">SK - Tentang Orang tua</p></a>';
	
	echo '<p><a href="?page=surat_pengantar">Surat Pengantar</p></a>';	
	
	echo '<p><a href="?page=sk_nikah">SK - Nikah</p></a>';	
	
	echo '<p><a href="?page=sk_untuk_nikah">SK - Untuk Nikah</p></a>';	
		
	echo '<p><a href="?page=sk_untuk_cerai">SK - Untuk Cerai</p></a>';		
	
	echo '<p><a href="?page=sk_belum_nikah">SK - Belum Nikah</p></a>';		
	
	echo '<p><a href="?page=sk_akte_kelahiran">SK - Pembuatan Akte Kelahiran</p></a>';	
		
	echo '<p><a href="?page=sk_pensiun">SK - Pembuatan surat Pensiun</p></a>';	
	
	echo '<p><a href="?page=sk_waris">SK - Pembuatan Waris</p></a>';		
	
echo '<p><a href="?page=sk_ck">SK - Catatan Kepolisian</p></a>';	

echo '<p><a href="?page=sk_keterangan_domisili_perusahan">SK - Keterangan Domisili Perusahan</p></a>';
	
	echo '<p><a href="?page=sk_keringanan_rumah">SK - Keringanan Biaya Rumah Sakit dan Biaya Sekolah Pendidikan</p></a>';
	
	echo '<p><a href="?page=sk_riwayat_tanah">SK - Riwayat Tanah</p></a>';
	
	echo '<p><a href="?page=sk_surat_pengantar_tidak_sengketa">SK - Surat Pengantar Tidak Sengketa</p></a>';

echo '<p><a href="?page=sk_penerbitan">SK - Penerbitan/Pecah/Mutasi Balik Nama PBB</p></a>';

echo '<p><a href="?page=sk_keringanan">SK - Keringanan Pembayaran PBB</p></a>';

echo '<p><a href="?page=s_permohonan">Surat Permohonan Izin UGG</p></a>';

echo '<p><a href="?page=sk_pergi">SK - Berpergian</p></a>';

echo '<p><a href="?page=sk_pelayanan">SK - Pelayanan Umum</p></a>';

echo '<p><a href="?page=s_permohonan_kpr">Surat Permohonan KPR/BTN</p></a>';

echo '<p><a href="?page=sk_izin_pesta">SK - Izin Pesta/Keramaian</p></a>';

echo '<p><a href="?page=sk_akte_jual_beli">Surat Akte Jual Beli</p></a>';

echo '<p><a href="?page=sk_kematian_suami_istri">Surat Keterangan Kematian Suami/Istri</p></a>';
	
echo '<p><a href="?page=sk_persyaratan_lain_lain">Surat Persyaratan Lain-lain</p></a>';
	
	

	
	
	echo '</div>';

}


function surat_keterangan() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Moderasi Surat Keterangan</h2>';

	include 'list_sk.php';

	echo '</div>';

}
function sk_untuk_cerai() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Moderasi Surat Cerai</h2>';

	include 'list_sk_untuk_cerai.php';

	echo '</div>';

}
function sk_belum_nikah() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Moderasi Surat Belum Nikah</h2>';

	include 'list_sk_belum_nikah.php';

	echo '</div>';

}





function sk_asal_usul() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Asal Usul</h2>';

	include 'list_sk_asal_usul.php';

	echo '</div>';

}

function sk_tentang_orangtua() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Tentang Orang tua</h2>';
	
	include 'list_sk_tentang_orangtua.php';

	echo '</div>';

}
function surat_pengantar() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar Surat Pengantar</h2>';

	include 'list_sk_surat_pengantar.php';

	echo '</div>';

}
function sk_nikah() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar Surat Nikah</h2>';

	include 'list_sk_nikah.php';

	echo '</div>';

}
function sk_untuk_nikah() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Untuk Nikah</h2>';

	include 'list_sk_untuk_nikah.php';

	echo '</div>';

}
function sk_akte_kelahiran() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Pembuatan Akte Kelahiran</h2>';

	include 'list_sk_pembuatan_akte_kelahiran.php';

	echo '</div>';

}
function sk_pensiun() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Pembuatan Surat Pensiun</h2>';

	include 'list_sk_pensiun.php';

	echo '</div>';

}
function sk_waris() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Pembuatan Surat Waris</h2>';

	include 'list_sk_keterangan_waris.php';

	echo '</div>';

}
function sk_ck() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Pembuatan Catatan Kepolisian</h2>';

	include 'list_sk_ck.php';

	echo '</div>';

}
function sk_penerbitan() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>SK - Penerbitan/Pecah/Mutasi Balik Nama PBB</h2>';

	include 'list_sk_penerbitan.php';

	echo '</div>';

}
function sk_keringanan() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>SK - Keringanan Pembayaran PBB</h2>';

	include 'list_sk_keringanan.php';

	echo '</div>';

}
function s_permohonan() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Surat Permohonan Izin UGG</h2>';

	include 'list_s_permohonan.php';

	echo '</div>';

}

function sk_pergi() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Surat Keterangan Berpergian</h2>';

	include 'list_sk_berpegian.php';

	echo '</div>';

}
function sk_pelayanan() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Surat Keterangan Pelayanan Umum</h2>';

	include 'list_sk_pelayanan.php';

	echo '</div>';

}
function sk_keterangan_domisili_perusahan() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Keterangan Domisili Perusahan</h2>';

	include 'list_sk_keterangan_domisili_perusahan.php';

	echo '</div>';

}

function sk_keringanan_rumah() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Keringanan Biaya Rumah Sakit dan Biaya Sekolah Pendidikan</h2>';

	include 'list_sk_keringanan_biaya_rumah.php';

	echo '</div>';

}

function sk_riwayat_tanah() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Riwayat Tanah</h2>';

	include 'list_sk_riwayat_tanah.php';

	echo '</div>';

}

function sk_surat_pengantar_tidak_sengketa() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar SK - Surat Pengantar Tidak Sengketa</h2>';

	include 'list_surat_pengantar_tidak_sengketa.php';

	echo '</div>';

}
function s_permohonan_kpr() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Daftar Pendaftar Surat Permohonan KPR/BTN</h2>';

	include 'list_s_permohonan_kpr.php';

	echo '</div>';

}
function sk_izin_pesta() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>SK - Izin Pesta/Keramaian</h2>';

	include 'list_sk_izin_pesta.php';

	echo '</div>';

}
function sk_akte_jual_beli() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Surat Akte Jual Beli</h2>';

	include 'list_s_akte_jualbeli.php';

	echo '</div>';

}
function sk_kematian_suami_istri() {

    if (!current_user_can('manage_options'))  {

        wp_die( __('You do not have sufficient permissions to access this page.') );

    }

    echo '<div class="wrap">';

    echo '<h2>Surat Keterangan Kematian Suami/Istri</h2>';

    include 'list_surat_keterangan_kematian_suami_istri.php';

    echo '</div>';

}

function sk_persyaratan_lain_lain() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	echo '<div class="wrap">';

	echo '<h2>Surat Persyaratan Lain-lain</h2>';

	include 'list_sk_persyaratan_lain_lain.php';

	echo '</div>';

}

?>