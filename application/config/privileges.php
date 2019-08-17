<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	$config['privileges']	= array(
		'nama class' => array(
			'nama method dalam class' => array('user group 1', 'user group 2')
		),
	);
	
	--- atau ---
	
	$config['privileges']['lokasi']['get_semua_lokasi'] = array('*');
	
	-- user group --
	[*]. semua, termasuk yg tidak login
	[1]. admin
	[2]. dcktr
    [3]. Konsultan
*/

/*
$config['privileges']	= array(
	'lokasi' => array(
		'get_semua_lokasi' => array('1')
	)
);
*/

$config['privileges']['home']['index'] = array('*');
$config['privileges']['home']['dashboard2'] = array('*');
$config['privileges']['home']['detil'] = array('2');
$config['privileges']['home']['detil_perangkat_pertahun'] = array('2');
$config['privileges']['home']['get_data_pendaftar'] = array('2');
$config['privileges']['home']['input_dashboard'] = array('3','4');
$config['privileges']['home']['update_dashboard'] = array('3','4');
$config['privileges']['home']['simpan_note'] = array('*');
$config['privileges']['home']['delete_note'] = array('*');
$config['privileges']['home']['monitoring'] = array('*');


$config['privileges']['user']['index'] = array('*');
$config['privileges']['user']['get_list_user'] = array('*');
$config['privileges']['user']['tambah_user'] = array('*');
$config['privileges']['user']['edit_user'] = array('*');
$config['privileges']['user']['edit_user_detail'] = array('*');
$config['privileges']['user']['edit_user_detail_password'] = array('*');
$config['privileges']['user']['simpan_data'] = array('*');
$config['privileges']['user']['update_data'] = array('*');
$config['privileges']['user']['update_data_detail'] = array('*');
$config['privileges']['user']['hapus'] = array('*');
$config['privileges']['user']['cek_username'] = array('*');
$config['privileges']['user']['update_data_detail_password'] = array('*');

$config['privileges']['user']['aksi_upload'] = array('*');
$config['privileges']['user']['list_my_team'] = array('*');

$config['privileges']['team']['index'] = array('0','4');
$config['privileges']['team']['get_list_team'] = array('0','4');
$config['privileges']['team']['tambah_team'] = array('0','4');
$config['privileges']['team']['edit_team'] = array('0','4');
$config['privileges']['team']['simpan_data'] = array('0','4');
$config['privileges']['team']['update_data'] = array('0','4');
$config['privileges']['team']['hapus'] = array('0','4');


$config['privileges']['role']['index'] = array('0','4');
$config['privileges']['role']['get_list_role'] = array('0','4');
$config['privileges']['role']['tambah_role'] = array('0','4');
$config['privileges']['role']['edit_role'] = array('0','4');
$config['privileges']['role']['simpan_data'] = array('0','4');
$config['privileges']['role']['update_data'] = array('0','4');
$config['privileges']['role']['hapus'] = array('0','4');


$config['privileges']['phonebook']['index'] = array('*');
$config['privileges']['phonebook']['get_list_phonebook'] = array('*');
$config['privileges']['phonebook']['tambah_phonebook'] = array('*');
$config['privileges']['phonebook']['edit_phonebook'] = array('*');
$config['privileges']['phonebook']['simpan_data'] = array('*');
$config['privileges']['phonebook']['update_data'] = array('*');
$config['privileges']['phonebook']['hapus'] = array('*');


$config['privileges']['keluarga']['index'] = array('*');
$config['privileges']['keluarga']['get_list_keluarga'] = array('*');
$config['privileges']['keluarga']['tambah_keluarga'] = array('*');
$config['privileges']['keluarga']['edit_keluarga'] = array('*');
$config['privileges']['keluarga']['simpan_data'] = array('*');
$config['privileges']['keluarga']['update_data'] = array('*');
$config['privileges']['keluarga']['hapus'] = array('*');

$config['privileges']['biaya']['index'] = array('*');
$config['privileges']['biaya']['get_list_biaya'] = array('*');
$config['privileges']['biaya']['tambah_biaya'] = array('*');
$config['privileges']['biaya']['edit_biaya'] = array('*');
$config['privileges']['biaya']['simpan_data'] = array('*');
$config['privileges']['biaya']['update_data'] = array('*');
$config['privileges']['biaya']['hapus'] = array('*');
$config['privileges']['biaya']['rka'] = array('*');
$config['privileges']['biaya']['get_list_biaya_excel'] = array('*');

$config['privileges']['kontrol_rutin_harian_hk_mb1']['index'] = array('*');
$config['privileges']['kontrol_rutin_harian_hk_mb1']['get_list_kontrol_rutin_harian_hk_mb1'] = array('*');
$config['privileges']['kontrol_rutin_harian_hk_mb1']['tambah_kontrol_rutin_harian_hk_mb1'] = array('*');
$config['privileges']['kontrol_rutin_harian_hk_mb1']['edit_kontrol_rutin_harian_hk_mb1'] = array('*');
$config['privileges']['kontrol_rutin_harian_hk_mb1']['simpan_data'] = array('*');
$config['privileges']['kontrol_rutin_harian_hk_mb1']['update_data'] = array('*');
$config['privileges']['kontrol_rutin_harian_hk_mb1']['hapus'] = array('*');
$config['privileges']['kontrol_rutin_harian_hk_mb1']['input_pelaksanaan'] = array('*');

$config['privileges']['telp_activity']['index'] = array('*');
$config['privileges']['telp_activity']['get_list_telp_activity'] = array('*');
$config['privileges']['telp_activity']['tambah_telp_activity'] = array('*');
$config['privileges']['telp_activity']['edit_telp_activity'] = array('*');
$config['privileges']['telp_activity']['simpan_data'] = array('*');
$config['privileges']['telp_activity']['update_data'] = array('*');
$config['privileges']['telp_activity']['hapus'] = array('*');

$config['privileges']['panel_sdp']['index'] = array('*');
$config['privileges']['panel_sdp']['get_list_panel_sdp'] = array('*');
$config['privileges']['panel_sdp']['get_list_panel_sdp_excel'] = array('*');
$config['privileges']['panel_sdp']['get_list_panel_sdp_tambah'] = array('*');
$config['privileges']['panel_sdp']['get_list_panel_sdp_detail_kpi'] = array('*');
$config['privileges']['panel_sdp']['get_list_panel_sdp_detail_kpi_excel'] = array('*');
$config['privileges']['panel_sdp']['tambah_panel_sdp'] = array('*');
$config['privileges']['panel_sdp']['edit_panel_sdp'] = array('*');
$config['privileges']['panel_sdp']['simpan_data'] = array('*');
$config['privileges']['panel_sdp']['update_data'] = array('*');
$config['privileges']['panel_sdp']['update_data_list'] = array('*');
$config['privileges']['panel_sdp']['hapus'] = array('*');

$config['privileges']['balakar']['index'] = array('*');
$config['privileges']['balakar']['get_list_balakar'] = array('*');
$config['privileges']['balakar']['tambah_balakar'] = array('*');
$config['privileges']['balakar']['edit_balakar'] = array('*');
$config['privileges']['balakar']['simpan_data'] = array('*');
$config['privileges']['balakar']['update_data'] = array('*');
$config['privileges']['balakar']['hapus'] = array('*');

$config['privileges']['gangguan']['index'] = array('*');
$config['privileges']['gangguan']['get_list_gangguan'] = array('*');
$config['privileges']['gangguan']['tambah_gangguan'] = array('*');
$config['privileges']['gangguan']['edit_gangguan'] = array('*');
$config['privileges']['gangguan']['simpan_data'] = array('*');
$config['privileges']['gangguan']['update_data'] = array('*');
$config['privileges']['gangguan']['hapus'] = array('*');

$config['privileges']['ganti_jadwal_req']['index'] = array('*');
$config['privileges']['ganti_jadwal_req']['get_list_ganti_jadwal_req'] = array('*');
$config['privileges']['ganti_jadwal_req']['tambah_ganti_jadwal_req'] = array('*');
$config['privileges']['ganti_jadwal_req']['edit_ganti_jadwal_req'] = array('*');
$config['privileges']['ganti_jadwal_req']['simpan_data'] = array('*');
$config['privileges']['ganti_jadwal_req']['update_data'] = array('*');
$config['privileges']['ganti_jadwal_req']['hapus'] = array('*');
$config['privileges']['ganti_jadwal_req']['list_form_req'] = array('*');
$config['privileges']['ganti_jadwal_req']['get_data_jam'] = array('*');
$config['privileges']['ganti_jadwal_req']['get_data_tanggal'] = array('*');
$config['privileges']['ganti_jadwal_req']['input_paraf'] = array('3');
$config['privileges']['ganti_jadwal_req']['list_approved_form_req'] = array('*');

$config['privileges']['task']['index'] = array('0','1','2','3','5','6','4','7','8');
$config['privileges']['task']['get_data_task'] = array('0','1','2','3','5','6','4','7','8');
$config['privileges']['task']['tambah_task'] = array('0','1','2','3','5','6','4','7','8');
$config['privileges']['task']['simpan_data'] = array('0','1','2','3','5','6','4','7','8');
$config['privileges']['task']['simpan_data_edit'] = array('0','1','2','3','5','6','4','7','8');
$config['privileges']['task']['simpan_data_addhoc'] = array('0','1','2','3','5','6','4','7','8');
$config['privileges']['task']['activity'] = array('1','2','3','5','6','4','7','8');
$config['privileges']['task']['activitypending'] = array('3','5','6','4','7','8');
$config['privileges']['task']['input_pelaksanaan'] = array('3','5','4','7','8','6');
$config['privileges']['task']['paraf_pic_bks'] = array('6');
$config['privileges']['task']['paraf_pic_bks_pending'] = array('6');


$config['privileges']['task']['paraf_spv_bri'] = array('3');
$config['privileges']['task']['paraf_spv_bri_uncheckonly'] = array('3');
$config['privileges']['task']['input_paraf'] = array('3','6','4');
$config['privileges']['task']['paraf_akhir'] = array('1','2','8');
$config['privileges']['task']['isi_paraf_akhir'] = array('1','2','8');
$config['privileges']['task']['approve'] = array('1','2','8');
$config['privileges']['task']['paraf_kabag'] = array('1','2','4','8');
$config['privileges']['task']['approvekabag'] = array('1','2','8');
$config['privileges']['task']['simpan_assigner'] = array('3');
$config['privileges']['task']['assign_spv'] = array('3');
$config['privileges']['task']['notif'] = array('3');
$config['privileges']['task']['getDataTaskMaster'] = array('*');
$config['privileges']['task']['activitypershift'] = array('*');
$config['privileges']['task']['refresh_task_activity'] = array('3');
$config['privileges']['task']['paraf_spv_bri_pending'] = array('3');


$config['privileges']['task']['get_data_totalpershit'] = array('*');

$config['privileges']['task']['hapus_task'] = array('*');
$config['privileges']['task']['edit_task'] = array('*');
$config['privileges']['task']['simpan_data_form'] = array('*');
$config['privileges']['task']['simpan_data_edit_form'] = array('*');

$config['privileges']['task']['get_home_dashboard'] = array('*');
$config['privileges']['task']['get_dashboardbyperiod'] = array('*');
$config['privileges']['task']['camera'] = array('*');

$config['privileges']['task']['list_report'] = array('*');
$config['privileges']['task']['list_report_excel'] = array('*');
$config['privileges']['task']['input_approve_permohonan'] = array('3');




$config['privileges']['form']['getlistformups'] = array('*');
$config['privileges']['form']['getlistformupsmb2'] = array('*');
$config['privileges']['form']['getlistformacliebert'] = array('*');
$config['privileges']['form']['getlistformacliebertmb2'] = array('*');
$config['privileges']['form']['getlistformlvmdp'] = array('*');
$config['privileges']['form']['getlistformkwh'] = array('*');
$config['privileges']['form']['getlistformtangki'] = array('*');
$config['privileges']['form']['getlistformgenset'] = array('*');

$config['privileges']['form']['hapusformups'] = array('*');
$config['privileges']['form']['hapusformacliebert'] = array('*');
$config['privileges']['form']['hapusformacliebertmb2'] = array('*');
$config['privileges']['form']['hapusformlvmdp'] = array('*');
$config['privileges']['form']['hapusformkwh'] = array('*');
$config['privileges']['form']['hapusformtangki'] = array('*');
$config['privileges']['form']['modalformups'] = array('*');
$config['privileges']['form']['modalformupsmb2'] = array('*');
$config['privileges']['form']['modalformlvmdp'] = array('*');
$config['privileges']['form']['getlistformlvmdpexcel'] = array('*');
$config['privileges']['form']['modalformkwh'] = array('*');
$config['privileges']['form']['modalformacliebert'] = array('*');
$config['privileges']['form']['modalformacliebertmb2'] = array('*');
$config['privileges']['form']['modalformtangki'] = array('*');
$config['privileges']['form']['modalformgenset'] = array('*');
$config['privileges']['form']['getlistformupsexcel'] = array('*');
$config['privileges']['form']['getlistformupsmb2excel'] = array('*');
$config['privileges']['form']['getlistformkwhexcel'] = array('*');
$config['privileges']['form']['simpan_data_genset'] = array('*');
$config['privileges']['form']['simpan_data_tangki'] = array('*');
$config['privileges']['form']['simpan_data_acliebert_mb2'] = array('*');
$config['privileges']['form']['getlistformacliebertexcel'] = array('*');
$config['privileges']['form']['getlistformtangkiexcel'] = array('*');


$config['privileges']['risalah']['index'] = array('*');
$config['privileges']['risalah']['get_list_risalah'] = array('*');
$config['privileges']['risalah']['tambah_risalah'] = array('*');
$config['privileges']['risalah']['edit_risalah'] = array('*');
$config['privileges']['risalah']['simpan_data'] = array('*');
$config['privileges']['risalah']['update_data'] = array('*');
$config['privileges']['risalah']['hapus'] = array('*');

$config['privileges']['form_sksm']['index'] = array('*');
$config['privileges']['form_sksm']['get_list_form_sksm'] = array('*');
$config['privileges']['form_sksm']['tambah_form_sksm'] = array('*');
$config['privileges']['form_sksm']['edit_form_sksm'] = array('*');
$config['privileges']['form_sksm']['simpan_data'] = array('*');
$config['privileges']['form_sksm']['update_data'] = array('*');
$config['privileges']['form_sksm']['hapus'] = array('*');

$config['privileges']['form_storage']['index'] = array('*');
$config['privileges']['form_storage']['get_list_form_storage'] = array('*');
$config['privileges']['form_storage']['get_list_form_storage2'] = array('*');
$config['privileges']['form_storage']['tambah_form_storage'] = array('*');
$config['privileges']['form_storage']['get_list_form_storage_history'] = array('*');
$config['privileges']['form_storage']['edit_form_storage'] = array('*');
$config['privileges']['form_storage']['edit_form_storage_masuk'] = array('*');
$config['privileges']['form_storage']['edit_form_storage_keluar'] = array('*');
$config['privileges']['form_storage']['simpan_data'] = array('*');
$config['privileges']['form_storage']['update_data'] = array('*');
$config['privileges']['form_storage']['update_data_masuk'] = array('*');
$config['privileges']['form_storage']['update_data_keluar'] = array('*');
$config['privileges']['form_storage']['hapus'] = array('*');
$config['privileges']['form_storage']['qrcodegenerator'] = array('*');
$config['privileges']['form_storage']['get_list_form_storage_masuk'] = array('*');
$config['privileges']['form_storage']['get_list_form_storage_keluar'] = array('*');


$config['privileges']['form_storage_new']['index'] = array('*');
$config['privileges']['form_storage_new']['get_list_form_storage_new'] = array('*');
$config['privileges']['form_storage_new']['get_list_form_storage_new2'] = array('*');
$config['privileges']['form_storage_new']['tambah_form_storage_new'] = array('*');
$config['privileges']['form_storage_new']['get_list_form_storage_new_history'] = array('*');
$config['privileges']['form_storage_new']['edit_form_storage_new'] = array('*');
$config['privileges']['form_storage_new']['edit_form_storage_new_masuk'] = array('*');
$config['privileges']['form_storage_new']['edit_form_storage_new_keluar'] = array('*');
$config['privileges']['form_storage_new']['simpan_data'] = array('*');
$config['privileges']['form_storage_new']['update_data'] = array('*');
$config['privileges']['form_storage_new']['update_data_masuk'] = array('*');
$config['privileges']['form_storage_new']['update_data_keluar'] = array('*');
$config['privileges']['form_storage_new']['hapus'] = array('*');
$config['privileges']['form_storage_new']['qrcodegenerator'] = array('*');
$config['privileges']['form_storage_new']['get_list_form_storage_new_masuk'] = array('*');
$config['privileges']['form_storage_new']['get_list_form_storage_new_keluar'] = array('*');

$config['privileges']['temuan_audit']['index'] = array('*');
$config['privileges']['temuan_audit']['get_list_temuan_audit'] = array('*');
$config['privileges']['temuan_audit']['tambah_temuan_audit'] = array('*');
$config['privileges']['temuan_audit']['edit_temuan_audit'] = array('*');
$config['privileges']['temuan_audit']['simpan_data'] = array('*');
$config['privileges']['temuan_audit']['update_data'] = array('*');
$config['privileges']['temuan_audit']['hapus'] = array('*');
$config['privileges']['temuan_audit']['tambah_data_tlm'] = array('*');
$config['privileges']['temuan_audit']['hapustlm'] = array('*');
$config['privileges']['temuan_audit']['get_list_temuan_audit_excel'] = array('*');


$config['privileges']['inventory_tape']['index'] = array('*');
$config['privileges']['inventory_tape']['get_list_inventory_tape'] = array('*');
$config['privileges']['inventory_tape']['scan_inventory_tape'] = array('*');
$config['privileges']['inventory_tape']['tambah_inventory_tape'] = array('*');
$config['privileges']['inventory_tape']['edit_inventory_tape'] = array('*');
$config['privileges']['inventory_tape']['simpan_data'] = array('*');
$config['privileges']['inventory_tape']['update_data'] = array('*');
$config['privileges']['inventory_tape']['hapus'] = array('*');

$config['privileges']['harian_spv']['index'] = array('*');
$config['privileges']['harian_spv']['getDataListHarianSPV'] = array('*');
$config['privileges']['harian_spv']['signHarianSPV'] = array('*');
$config['privileges']['harian_spv']['tambah_harian_spv'] = array('*');
$config['privileges']['harian_spv']['edit_harian_spv'] = array('*');
$config['privileges']['harian_spv']['simpan_data'] = array('*');
$config['privileges']['harian_spv']['update_data'] = array('*');
$config['privileges']['harian_spv']['hapus'] = array('*');
$config['privileges']['harian_spv']['signSupervisorHarianSPV'] = array('*');
$config['privileges']['harian_spv']['signAppFinalHarianSPV'] = array('*');


$config['privileges']['harian_operator']['index'] = array('*');
$config['privileges']['harian_operator']['getDataListHarianOPERATOR'] = array('*');
$config['privileges']['harian_operator']['signHarianOPERATOR'] = array('*');
$config['privileges']['harian_operator']['tambah_harian_operator'] = array('*');
$config['privileges']['harian_operator']['edit_harian_operator'] = array('*');
$config['privileges']['harian_operator']['simpan_data'] = array('*');
$config['privileges']['harian_operator']['update_data'] = array('*');
$config['privileges']['harian_operator']['hapus'] = array('*');
$config['privileges']['harian_operator']['signOperatorHarianOPERATOR'] = array('*');
$config['privileges']['harian_operator']['signAppFinalHarianOPERATOR'] = array('*');


$config['privileges']['mutasi_harian_hk']['index'] = array('*');
$config['privileges']['mutasi_harian_hk']['getDataListMutasi_harian_hk'] = array('*');
$config['privileges']['mutasi_harian_hk']['signMutasi_harian_hk'] = array('*');
$config['privileges']['mutasi_harian_hk']['tambah_mutasi_harian_hk'] = array('*');
$config['privileges']['mutasi_harian_hk']['edit_mutasi_harian_hk'] = array('*');
$config['privileges']['mutasi_harian_hk']['simpan_data'] = array('*');
$config['privileges']['mutasi_harian_hk']['update_data'] = array('*');
$config['privileges']['mutasi_harian_hk']['hapus'] = array('*');
$config['privileges']['mutasi_harian_hk']['signKoordinatorBKSMutasi_harian_hk'] = array('*');
$config['privileges']['mutasi_harian_hk']['signSupervisorBKSMutasi_harian_hk'] = array('*');
$config['privileges']['mutasi_harian_hk']['signSupervisorBRIMutasi_harian_hk'] = array('*');

$config['privileges']['perangkat_non_inventaris']['index'] = array('*');
$config['privileges']['perangkat_non_inventaris']['get_list_perangkat_non_inventaris'] = array('*');
$config['privileges']['perangkat_non_inventaris']['tambah_perangkat_non_inventaris'] = array('*');
$config['privileges']['perangkat_non_inventaris']['edit_perangkat_non_inventaris'] = array('*');
$config['privileges']['perangkat_non_inventaris']['simpan_data'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_umum'] = array('*');
$config['privileges']['perangkat_non_inventaris']['hapus'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_gambar'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_umum_desain_dan_spesifikasi'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_file_desain_dan_spesifikasi'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_umum_setup_configuration'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_file_setup_configuration'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_umum_availability'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_file_availability'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_umum_reliability'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_file_reliability'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_umum_performance'] = array('*');
$config['privileges']['perangkat_non_inventaris']['update_data_file_performance'] = array('*');

$config['privileges']['rkap']['index'] = array('*');
$config['privileges']['rkap']['get_list_rkap'] = array('*');
$config['privileges']['rkap']['tambah_rkap'] = array('*');
$config['privileges']['rkap']['edit_rkap'] = array('*');
$config['privileges']['rkap']['simpan_data'] = array('*');
$config['privileges']['rkap']['update_data'] = array('*');
$config['privileges']['rkap']['hapus'] = array('*');

$config['privileges']['repository_problem']['index'] = array('*');
$config['privileges']['repository_problem']['get_list_repository_problem'] = array('*');
$config['privileges']['repository_problem']['tambah_repository_problem'] = array('*');
$config['privileges']['repository_problem']['edit_repository_problem'] = array('*');
$config['privileges']['repository_problem']['simpan_data'] = array('*');
$config['privileges']['repository_problem']['update_data'] = array('*');
$config['privileges']['repository_problem']['hapus'] = array('*');


//$config['privileges']['task']['paraf_pic_self'] = array('4');

$config['privileges']['report']['index'] = array('*');
$config['privileges']['report']['get_data'] = array('*');
$config['privileges']['report']['hop'] = array('*');

$config['privileges']['error']['index'] = array('*');
$config['privileges']['error']['e404'] = array('*');
$config['privileges']['error']['e403'] = array('*');
$config['privileges']['error']['e401'] = array('*');

$config['privileges']['auth']['index'] = array('*');
$config['privileges']['auth']['login'] = array('*');
$config['privileges']['auth']['logout'] = array('*');
$config['privileges']['auth']['check_sess_ajax'] = array('*');
$config['privileges']['auth']['modal_login'] = array('*');
$config['privileges']['auth']['cek_login'] = array('*');

//$config['privileges']['tes']['index'] = array('*');










/* End of file config.php */
/* Location: ./application/config/config.php */
