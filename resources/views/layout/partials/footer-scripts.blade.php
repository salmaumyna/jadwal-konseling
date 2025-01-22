<!-- jQuery -->
<script src="{{ URL::asset('/assets/js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- Slimscroll JS -->

<!-- Slimscroll JS -->
<script src="{{ URL::asset('/assets/js/jquery.slimscroll.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ URL::asset('/assets/js/select2.min.js') }}"></script>

<!-- Data Table JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Datetimepicker JS -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script src="{{ URL::asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Custom JS -->
@vite(['resources/js/script.js'])

@auth
<script>
    var __DT_LANG = {
		config: {
			sEmptyTable: 'Tidak ada data yang tersedia pada tabel ini',
			sProcessing: 'Sedang memproses...',
			sLengthMenu: '&nbsp;_MENU_',
			sLoadingRecords: '<i class="fa fa-spinner fa-spin fa-fw"></i><span class="sr-only">Memuat</span> Memuat...',
			sProcessing: 'Memproses...',
			sZeroRecords: 'Tidak ditemukan data yang sesuai',
			sInfo: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
			sInfoEmpty: 'Menampilkan 0 sampai 0 dari 0 entri',
			sInfoFiltered: '(disaring dari _MAX_ entri keseluruhan)',
			sInfoPostFix: '',
			sSearch: 'Cari:',
			sUrl: '',
			oPaginate: {
				sFirst: 'Pertama',
				sPrevious: 'Sebelumnya',
				sNext: 'Selanjutnya',
				sLast: 'Terakhir',
			},
		},
		menu:{
			entries: 'entri',
			allEntries: 'Semua entri',
		},
	};

    var __DT_SSR_DEFAULT_CONFIG = {
        processing: true,
        serverSide: true,
        keys: false,
        scrollX: false,
        orderCellsTop: true,
        dom: '<"row"<"col-md-5 dt-feat-right"l><"col-md-7 dt-toolbar-right">>rtip',
        lengthMenu: [
            [25, 50, 100, -1],
            [`25 ${__DT_LANG.menu.entries}`, `50 ${__DT_LANG.menu.entries}`, `100 ${__DT_LANG.menu.entries}`, __DT_LANG.menu.allEntries],
        ],
        oLanguage: __DT_LANG.config,
        initComplete: function () {
            const searchInputs = [];
            const thead = $('table.datatable-ssr').find('thead');
            const tbody = $('table.datatable-ssr').find('tbody');
            thead.append(thead.find('tr').clone(true));

            // Add a search box in thead, to search by individual column
            $('table.datatable-ssr').find('thead').find('tr:eq(1)').find('th').each(function(i) {
                const column = $(this);
                let title = column.text();
                if (column.attr('datatable-skip-search')) {
                    column.html('');
                    return;
                }

                if (title && !['#','Aksi', '', 'No'].includes(title)) {
                    const searchInput = $(`<input type="text" name="input-search[${i}]" target-column="${i}" class="form-control form-control-sm" placeholder="&#x1F50D;" style="min-width:100px">`);
                    searchInputs.push(searchInput);
                    column.html(searchInput);
                } else {
                    $(this).html('');
                }

                column.attr('data-orderable', 'false');
            });

            for (const searchInput of searchInputs) {
                const targetColumn = parseInt(searchInput.attr('target-column'));
                searchInput.on('keyup change', function() {
                    if (table.column(targetColumn).search() !== this.value) {
                        table.column(targetColumn)
                            .search(this.value)
                            .draw();
                    }
                });
            }
        },
    };

    function wordWrapPerLine(text, maxLength = 75, wrapBreak = "<br>", lineSeparator = "\n") {
        const strings = text.split(lineSeparator);
        let output = "";
        strings.forEach((str, i) => {
            output += str.replace(new RegExp(`(.{1,${maxLength}})( |$)`, 'g'), '$1' + wrapBreak);
        });
        return output;
    }

    function wordWrap(str, maxWidth, newLineStr = "\n") {
        const whiteRegex = new RegExp(/^\s$/);
        let done = false;
        let res = '';
        while (str.length > maxWidth) {
            let found = false;
            // Inserts new line at first whitespace of the line
            for (i = maxWidth - 1; i >= 0; i--) {
                if (whiteRegex.test(str.charAt(i))) {
                    res = res + [str.slice(0, i), newLineStr].join('');
                    str = str.slice(i + 1);
                    console.log(str);
                    found = true;
                    break;
                }
            }

            if (!found) {
                res += [str.slice(0, maxWidth), newLineStr].join('');
                str = str.slice(maxWidth);
            }
        }
        return res + str;
    }

    function formatYMDToDMY(dateYmd, separator = '-') {
        const split = dateYmd.split('-');

        return split[2] + separator + split[1] + separator + split[0];
    }

    $(document).ready(function() {

    });
</script>
@endauth

<script>
    $('body').on('click', '.btn-delete,.btn-action', function(e) {
        e.preventDefault();
        const title = $(this).data('confirm-title') || "Anda yakin?";
        const text = $(this).data('confirm-text') || "Anda yakin menghapus data ini?";
        const icon = $(this).data('confirm-icon') || "warning";
        const method = $(this).data('action-method') || "delete";
        const action = $(this).data('action');

        if (!action) {
            return;
        }
        const methods = {
            "delete": `@method('delete')`,
            "put": `@method('put')`,
            "patch": `@method('patch')`,
        }

        swal({
                title,
                text,
                icon,
                buttons: [
                    "Batalkan",
                    "Ya, Lakukan"
                ]
            })
            .then(function(confirm) {
                if (confirm) {
                    const form = $(`<form action="${action}" method="POST">
                    @csrf
                    ${methods[method]}
                </form>`);
                    $('body').append(form);
                    form.submit();
                }
            });
    });
</script>
