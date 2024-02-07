<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['404_override'] = 'custom404';
$route['translate_uri_dashes'] = TRUE;

// Route Login
$route['default_controller'] = 'auth/login';
$route['proses-login'] = 'auth/proses_login';

// Atasan
$route['atasan/dashboard'] = 'dashboard/index';

// Admin
$route['admin/dashboard'] = 'dashboard/index';

$route['admin/personil'] = 'personil/index';
$route['admin/personil/tambah-personil'] = 'personil/tambah_personil';
$route['admin/personil/proses-tambah-personil'] = 'personil/proses_tambah_personil';
$route['admin/personil/edit-personil'] = 'personil/edit_personil';
$route['admin/personil/proses-edit-personil'] = 'personil/proses_edit_personil';
$route['admin/personil/lihat-sertifikat'] = 'sertifikat/get_sertifikat';
$route['admin/personil/proses-tambah-sertifikat'] = 'sertifikat/proses_tambah_sertifikat';

$route['admin/rencana-operasi'] = 'rencana_operasi/index';
$route['admin/rencana-operasi/tambah-rencana-operasi'] = 'rencana_operasi/tambah_rencana_operasi';
$route['admin/rencana-operasi/proses-tambah-rencana-operasi'] = 'rencana_operasi/proses_tambah_rencana_operasi';
$route['admin/rencana-operasi/edit-rencana-operasi'] = 'rencana_operasi/edit_rencana_operasi';
$route['admin/rencana-operasi/proses-edit-rencana-operasi'] = 'rencana_operasi/proses_edit_rencana_operasi';

$route['admin/spki'] = 'spki/index';
$route['admin/spki/tambah-spki'] = 'spki/tambah_spki';
$route['admin/spki/proses-tambah-spki'] = 'spki/proses_tambah_spki';
$route['admin/spki/edit-spki'] = 'spki/edit_spki';
$route['admin/spki/proses-edit-spki'] = 'spki/proses_edit_spki';

$route['admin/laporan-pekerjaan'] = 'laporan_pekerjaan/index';
$route['admin/laporan-pekerjaan/tambah-laporan-pekerjaan'] = 'laporan_pekerjaan/tambah_laporan_pekerjaan';
$route['admin/laporan-pekerjaan/proses-tambah-laporan-pekerjaan'] = 'laporan_pekerjaan/proses_tambah_laporan_pekerjaan';
$route['admin/laporan-pekerjaan/edit-laporan-pekerjaan'] = 'laporan_pekerjaan/edit_laporan_pekerjaan';
$route['admin/laporan-pekerjaan/proses-edit-laporan-pekerjaan'] = 'laporan_pekerjaan/proses_edit_laporan_pekerjaan';

$route['admin/jsa'] = 'jsa/index';
$route['admin/jsa/tambah-jsa'] = 'jsa/tambah_jsa';
$route['admin/jsa/proses-tambah-jsa'] = 'jsa/proses_tambah_jsa';
$route['admin/jsa/edit-jsa'] = 'jsa/edit_jsa';
$route['admin/jsa/proses-edit-jsa'] = 'jsa/proses_edit_jsa';

$route['admin/alat-kerja'] = 'alat_kerja/index';
$route['admin/alat-kerja/tambah-alat-kerja'] = 'alat_kerja/tambah_alat_kerja';
$route['admin/alat-kerja/proses-tambah-alat-kerja'] = 'alat_kerja/proses_tambah_alat_kerja';
$route['admin/alat-kerja/edit-alat-kerja'] = 'alat_kerja/edit_alat_kerja';
$route['admin/alat-kerja/proses-edit-alat-kerja'] = 'alat_kerja/proses_edit_alat_kerja';

$route['admin/histori-alat-kerja'] = 'histori_alat/index';
$route['admin/histori-alat-kerja/tambah-histori-alat-kerja'] = 'histori_alat/tambah_histori_alat';
$route['admin/histori-alat-kerja/proses-tambah-histori-alat-kerja'] = 'histori_alat/proses_tambah_histori_alat';

$route['admin/alat-tower-ers'] = 'alat_tower_ers/index';
$route['admin/alat-tower-ers/tambah-alat-tower-ers'] = 'alat_tower_ers/tambah_alat_tower_ers';
$route['admin/alat-tower-ers/proses-tambah-alat-tower-ers'] = 'alat_tower_ers/proses_tambah_alat_tower_ers';
$route['admin/alat-tower-ers/edit-alat-tower-ers'] = 'alat_tower_ers/edit_alat_tower_ers';
$route['admin/alat-tower-ers/proses-edit-alat-tower-ers'] = 'alat_tower_ers/proses_edit_alat_tower_ers';

$route['admin/riwayat-gudang'] = 'riwayat_gudang/index';
$route['admin/riwayat-gudang/tambah-riwayat-gudang'] = 'riwayat_gudang/tambah_riwayat_gudang';
$route['admin/riwayat-gudang/proses-tambah-riwayat-gudang'] = 'riwayat_gudang/proses_tambah_riwayat_gudang';

// JTC
$route['jtc/dashboard'] = 'dashboard/index';
