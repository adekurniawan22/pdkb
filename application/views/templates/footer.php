<footer class="footer pt-3  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
            </div>

        </div>
    </div>
</footer>
</div>
</main>
</div>

<?php if ($this->session->flashdata('message')) { ?>
    <!-- Tampilkan pesan 'flashdata' sebagai modal -->
    <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $this->session->flashdata('message') ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Logout -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah kamu yakin ingin logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                <a href="<?= base_url() ?>auth/logout" class="btn bg-gradient-primary">Ya</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logout_partnership" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah kamu yakin ingin logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                <a href="<?= base_url() ?>auth/logout_partnership" class="btn bg-gradient-primary">Ya</a>
            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/argon-master/assets/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/core/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/plugins/chartjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#message').modal('show');
    });

    $(document).ready(function() {
        // Initialize an object to store selected items and their quantities
        var selectedItems = {};

        // Event handler for checkbox changes
        $('.select-checkbox').on('change', function() {
            var id = $(this).val();
            var name = $(this).data('name'); // Mengambil nama alat dari data-name
            var row = $(this).closest('tr');
            var quantityInput = row.find('.obat-quantity');

            if ($(this).prop('checked')) {
                // Checkbox is checked, create a new <td> element with a new quantity input
                var newTd = $('<td>');
                var newQuantityInput = $('<input>', {
                    type: 'number',
                    class: 'form-control obat-quantity',
                    name: 'select_jumlah[]',
                    min: '0',
                    value: '0' // Initialize with 0
                });
                newTd.append(newQuantityInput);
                row.find('td:last').replaceWith(newTd); // Replace the existing <td>

                // Add the item to the selectedItems object with a quantity of 0
                selectedItems[id] = 0;

                // Add the item to the selected items list in the textarea
                updateSelectedItemsText();
            } else {
                // Checkbox is unchecked, remove the quantity input and replace the <td>
                quantityInput.remove();
                var newTd = $('<td>');
                row.find('td:last').replaceWith(newTd);

                // Remove the item from the selectedItems object and the selected items list
                delete selectedItems[id];
                updateSelectedItemsText();
            }
        });

        // Event handler for quantity changes
        $(document).on('input', '.obat-quantity', function() {
            var id = $(this).closest('tr').find('.select-checkbox').val();
            var quantity = parseInt($(this).val());

            // Update the quantity in the selectedItems object
            selectedItems[id] = quantity;
            updateSelectedItemsText();
        });

        // Function to update selected items list in the textarea
        function updateSelectedItemsText() {
            var selectedItemsText = [];
            for (var id in selectedItems) {
                var name = $('.select-checkbox[value="' + id + '"]').data('name');
                selectedItemsText.push(name + ' (jumlah : ' + selectedItems[id] + ')');
            }
            $('#nama_alat_kerja').val(selectedItemsText.join(', '));
        }

        // Event handler for form submission
        $('#your-form').on('submit', function() {
            // Filter out items with a quantity less than or equal to 0
            var filteredItems = {};
            for (var id in selectedItems) {
                if (selectedItems[id] > 0) {
                    filteredItems[id] = selectedItems[id];
                }
            }

            // Convert filteredItems object to JSON and set it as the value of the hidden input
            $('#selected-items-input').val(JSON.stringify(filteredItems));
        });
    });

    $(document).ready(function() {
        $('#example').DataTable({
            "oLanguage": {
                "sLengthMenu": "Tampilkan _MENU_ data",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "emptyTable": "Tidak ada data",
            },
            "lengthMenu": [
                [10, 25, 50, -1],
                ["10", "25", "50", "Semua"]
            ],
            // "order": [
            //     [0, "asc"]
            // ],
            language: {
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "<i class='fa fa-angle-right'></i>",
                    "previous": "<i class='fa fa-angle-left'></i>"
                }
            },
        });
    });

    $(document).ready(function() {
        var commonSettings = {
            "oLanguage": {
                "sLengthMenu": "Tampilkan _MENU_ data",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "emptyTable": "Tidak ada data"
            },
            "lengthMenu": [
                [10, 25, 50, -1],
                ["10", "25", "50", "Semua"]
            ],
            columnDefs: [{
                target: 0,
                visible: false,
                searchable: false
            }],
            "order": [
                [0, "desc"]
            ],
            language: {
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "<i class='fa fa-angle-right'></i>",
                    "previous": "<i class='fa fa-angle-left'></i>"
                }
            }
        };

        $('#rencanaPekerjaanTable').DataTable(commonSettings);
        $('#spkiTable').DataTable(commonSettings);
        $('#laporanPekerjaanTable').DataTable(commonSettings);
        $('#jsaTable').DataTable(commonSettings);
        $('#historiAlatTable').DataTable(commonSettings);
        $('#riwayatGudangTable').DataTable(commonSettings);
        $('#garduIndukTable').DataTable(commonSettings);
        $('#jaringanTable').DataTable(commonSettings);
    });


    var ctx1 = document.getElementById("chart-line").getContext("2d");
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>