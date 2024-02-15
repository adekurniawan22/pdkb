<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/argon-master/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/argon-master/assets/img/favicon.png">
    <title>
        <?= $title ?>
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>assets/argon-master/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/argon-master/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url() ?>assets/argon-master/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url() ?>assets/argon-master/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.css" rel="stylesheet">

    <style>
        #signatureCanvas {
            width: 100%;
            max-width: 300px;
            height: auto;
            border: 1px solid #000;
        }

        .atur-height {
            height: 100% !important;
            overflow: visible !important;
        }

        .scrollbar-customization::-webkit-scrollbar {
            width: 12px;
            /* Lebar scrollbar */
        }

        .btn-aside {
            color: #333;
            transition: all 0.3s ease;
        }

        .btn-aside:hover {
            color: #007bff;
            background-color: #f8f9fa;
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dataTable {
            padding: 10px;
        }

        .dataTables_info {
            margin-left: 20px;
            padding-bottom: 10px;
        }

        .dataTables_length {
            margin-left: 20px;
        }

        .dataTables_length select {
            width: 100px !important;
        }

        .dataTables_filter {
            margin-right: 20px;
        }

        .pagination {
            margin-right: 20px !important;
            padding-bottom: 10px !;
        }

        .page-item.active .page-link {
            color: white !important;
        }

        .page-item.previous.disabled,
        .page-item.next.disabled {
            cursor: no-drop;
        }

        .page-item.previous .page-link,
        .page-item.next .page-link,
        .page-link {
            background: white;
            color: #8898aa !important;
        }

        .page-item.active .page-link:hover,
        .page-item.previous .page-link:hover,
        .page-item.next .page-link:hover,
        .page-link:hover {
            background-color: #e9ecef;
            color: #8898aa !important;
            border-color: #e9ecef !important;
        }

        #sidenav-main {
            z-index: 1000 !important;
        }

        .modal {
            z-index: 1050
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 me-4 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <div class="navbar-brand m-0 d-flex align-items-center">
                <img src="<?= base_url() ?>assets/img/logo-simpati-pdkb.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold" style="font-size: 30px">PDKB</span>
            </div>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto atur-height" id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <!-- ROLE ATASAN -->
                <?php if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2') : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Dashboard") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/dashboard">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Personil") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/personil">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-people-fill text-warning text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Personil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Rencana Operasi") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/rencana-operasi">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-list-stars text-success text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Rencana Operasi</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Dokumen Pekerjaan</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "SPKI") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/spki">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-earmark-text-fill text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">SPKI</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Laporan Pekerjaan") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/laporan-pekerjaan">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-earmark-text-fill text-dark text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan Pekerjaan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Laporan JSA") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/jsa">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-earmark-text-fill text-dark text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan JSA</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Warehouse</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Alat Kerja") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/alat-kerja">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-tools text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Alat kerja</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Riwayat Alat Kerja") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/histori-alat-kerja">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Riwayat Alat Kerja</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Alat Tower ERS") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/alat-tower-ers">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-tools text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Alat Tower ERS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Riwayat Gudang") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/riwayat-gudang">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Riwayat Gudang</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Anomali</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Gardu Induk") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/gardu-induk">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-ethernet text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Gardu Induk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Jaringan") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>atasan/jaringan">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-joystick text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Jaringan</span>
                        </a>
                    </li>
                <?php endif ?>
                <!-- END ROLE ATASAN -->

                <!-- ROLE ADMIN -->
                <?php if ($this->session->userdata('id_jabatan') == '3') : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Dashboard") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/dashboard">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Personil") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/personil">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-people-fill text-warning text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Personil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Rencana Operasi") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/rencana-operasi">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-list-stars text-success text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Rencana Operasi</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Dokumen Pekerjaan</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "SPKI") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/spki">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-earmark-text-fill text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">SPKI</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Laporan Pekerjaan") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/laporan-pekerjaan">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-earmark-text-fill text-dark text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan Pekerjaan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Laporan JSA") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/jsa">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-earmark-text-fill text-dark text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan JSA</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Warehouse</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Alat Kerja") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/alat-kerja">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-tools text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Alat kerja</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Riwayat Alat Kerja") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/histori-alat-kerja">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Riwayat Alat Kerja</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Alat Tower ERS") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/alat-tower-ers">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-tools text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Alat Tower ERS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Riwayat Gudang") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/riwayat-gudang">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Riwayat Gudang</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Anomali</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Gardu Induk") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/gardu-induk">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-ethernet text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Gardu Induk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Jaringan") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>admin/jaringan">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-joystick text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Jaringan</span>
                        </a>
                    </li>
                <?php endif ?>
                <!-- END ROLE ADMIN -->

                <!-- ROLE JTC -->
                <?php if ($this->session->userdata('id_jabatan') == '4') : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Dashboard") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/dashboard">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Personil") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/personil">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-people-fill text-warning text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Personil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Rencana Operasi") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/rencana-operasi">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-list-stars text-success text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Rencana Operasi</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Dokumen Pekerjaan</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "SPKI") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/spki">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-earmark-text-fill text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">SPKI</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Laporan Pekerjaan") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/laporan-pekerjaan">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-earmark-text-fill text-dark text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan Pekerjaan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Laporan JSA") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/jsa">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-earmark-text-fill text-dark text-sm opacity-10 pb-1"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan JSA</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Warehouse</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Alat Kerja") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/alat-kerja">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-tools text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Alat kerja</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Riwayat Alat Kerja") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/histori-alat-kerja">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Riwayat Alat Kerja</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Alat Tower ERS") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/alat-tower-ers">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-tools text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Alat Tower ERS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Riwayat Gudang") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/riwayat-gudang">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Riwayat Gudang</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Anomali</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Gardu Induk") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/gardu-induk">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-ethernet text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Gardu Induk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == "Jaringan") {
                                                echo "active";
                                            } ?> btn-aside" href="<?= base_url() ?>jtc/jaringan">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-joystick text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Jaringan</span>
                        </a>
                    </li>
                <?php endif ?>
                <!-- END ROLE JTC -->

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Akun</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-aside <?php if ($title == "Profil") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url() ?>profil">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link btn-aside" href="" data-bs-toggle="modal" data-bs-target="#logout">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-box-arrow-left text-dark text-sm opacity-10 pb-1"></i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mb-1" id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="javascript:;">PDKB</a></li>
                        <?php if ($this->uri->segment(2)) { ?>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= str_replace('-', ' ', ucwords($this->uri->segment(2))) ?></li>
                        <?php } else { ?>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= str_replace('-', ' ', ucwords($this->uri->segment(1))) ?></li>
                        <?php } ?>
                    </ol>
                    <?php if ($this->uri->segment(3)) { ?>
                        <h6 class="font-weight-bolder text-white mb-0"><?= ucwords(str_replace('-', ' ', $this->uri->segment(3))) ?></h6>
                    <?php } else { ?>
                        <h6 class="font-weight-bolder text-white mb-0"></h6>
                    <?php } ?>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <span class="d-sm-inline d-none nav-link font-weight-bold px-0 ps-3" style="color: white !important;">Halo, <?= $_SESSION['nama'] ?>&nbsp;<i class="ni ni-satisfied"></i></span>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->