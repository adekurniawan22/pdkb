<div class="container-fluid py-2">
    <?php
    $data_pdf_gi = [
        '8.001 IK AKSES HOT END MAN Rev Padang',
        '8.002 IK ASESMEN INSULATOR & KONDUKTOR Rev Bandung',
        '8.003 IK PERBAIKAN HOTSPOT PADA GARDU INDUK - Rev Cilegon',
        '8.004 IK PEMELIHARAAN DAN PENGGANTIAN PERALATAN GARDU INDUK Rev Surabaya',
        '8.005 IK PENGGANTIAN INSULATOR PADA GARDU INDUK',
        '8.006 IK PENGGANTIAN KONDUKTOR PADA GARDU INDUK',
        '8.007 IK PERBAIKAN KONDUKTOR PADA GARDU INDUK',
        '8.008 IK PEMBERSIHAN ISOLATOR PADA GARDU INDUK',
    ];

    $data_pdf_jaringan = [
        '9.001 MEMANJAT TOWER TIANG Revisi Bali',
        '9.002 INSPEKSI VISUAL SUTT- SUTET',
        '9.003 AKSES HOT END CREW Rev Padang',
        '9.004 TANGGAP KEADAAN DARURAT',
        '9.005 ASESMEN INSULATOR DAN KONDUKTOR Revisi Bandung',
        '9.006 PENGAMBILAN BENDA ASING PADA SUTT  SUTET',
        '9.007 PENGGANTIAN INSULATOR SUSPENSION 70 kV',
        '9.008 PENGGANTIAN INSULATOR TENSION 70 KV',
        '9.009 PENGGANTIAN INSULATOR SUSPENSION 150 kV',
        '9.010 PENGGANTIAN INSULATOR TENSION 150 KV Rev semarang',
        '9.011 PENGGANTIAN INSULATOR SUPPORT 150 KV',
        '9.012 PEMASANGAN _ PEMBONGKARAN',
        '9.013 PENGGANTIAN INSULATOR SUSPENSION 275 kV',
        '9.014 PENGGANTIAN INSULATOR TENSION 275 kV Revisi Padang',
        '9.015 PENGGANTIAN INSULATOR SUPPORT 275 kV new medan',
        '9.016 PENGGANTIAN INSULATOR SUSPENSION 500 kV',
        '9.017 PENGGANTIAN INSULATOR TENSION 500 kV',
        '9.018 PENGGANTIAN INSULATOR SUPPORT 500 KV',
        '9.019 PERBAIKAN  PENGGANTIAN AKSESORIS PADA SUTT SUTET  Rev PWKT',
        '9.020 PERBAIKAN  PENGGANTIAN KONDUKTOR JUMPER Rev Tj Karang',
        '9.021 PERBAIKAN DAN PENGGANTIAN AKSESORIS GSW  OPGW',
        '9.022 PERBAIKAN EARTH WIRE, KONDUKTOR RANTAS DAN SPACER Revisi Bandung',
        '9.023 PEMINDAHAN KONDUKTOR PADA TOWER EMERGENCY',
        '9.024 PEMBERSIHAN ISOLATOR PADA SUTT  SUTET',
        '9.025 PENGGANTIAN TRAVERS SUTT 150 KV'
    ];
    ?>

    <!-- Nav tabs -->
    <div class="nav-wrapper position-relative end-0 mb-3">
        <ul class="nav nav-pills nav-fill p-1" role="tablist">
            <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#gardu-induk-tabs-simple" role="tab" aria-controls="gardu-induk" aria-selected="true">
                    Gardu Induk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#jaringan-tabs-simple" role="tab" aria-controls="jaringan" aria-selected="false">
                    Jaringan
                </a>
            </li>
        </ul>
    </div>

    <!-- Tab panes -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="gardu-induk-tabs-simple" role="tabpanel" aria-labelledby="gardu-induk-tab">
            <div class="row">
                <?php foreach ($data_pdf_gi as $pdf) : ?>
                    <div class="col-xl-6 col-sm-4 mb-xl-0 mb-4 pb-4">
                        <div class="card mb-2">
                            <div class="card-body p-3">
                                <embed src="<?= base_url() ?>assets/img/instruksi-kerja/gardu-induk/<?= $pdf ?>.pdf" type="application/pdf" width="100%" height="500px">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="jaringan-tabs-simple" role="tabpanel" aria-labelledby="jaringan-tab">
            <div class="row">
                <?php foreach ($data_pdf_jaringan as $pdf) : ?>
                    <div class="col-xl-6 col-sm-4 mb-xl-0 mb-4 pb-4">
                        <div class="card mb-2">
                            <div class="card-body p-3">
                                <embed src="<?= base_url() ?>assets/img/instruksi-kerja/jaringan/<?= $pdf ?>.pdf" type="application/pdf" width="100%" height="500px">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>