/*
Author       : Dreamguys
Template Name: Kanakku - Bootstrap Admin Template
Version      : 1.0
*/

(function($) {
    "use strict";

	// Variables declarations

	var $wrapper = $('.main-wrapper');
	var $pageWrapper = $('.page-wrapper');
	var $slimScrolls = $('.slimscroll');

	// Sidebar
	var Sidemenu = function () {
		this.$menuItem = $('#sidebar-menu a');
	};

	function init() {
		var $this = Sidemenu;
		$('#sidebar-menu a').on('click', function (e) {
			if ($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if (!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(350);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
			} else if ($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
		$('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
	}

	// image file upload cover-image image
	if($('#cover-image').length > 0) {
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#cover-image').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#cover_upload").change(function(){
			readURL(this);
		});
	}

	// Sidebar popup overlay

	if($('.popup-toggle').length > 0) {
		$(".popup-toggle").click(function(){
			$(".toggle-sidebar").addClass("open-filter");
		  });
		  $(".sidebar-closes").click(function(){
			$(".toggle-sidebar").removeClass("open-filter");
		  });
	}

	if($('.win-maximize').length > 0) {
		$('.win-maximize').on('click', function(e){
			if (!document.fullscreenElement) {
				document.documentElement.requestFullscreen();
			} else {
				if (document.exitFullscreen) {
					document.exitFullscreen();
				}
			}
		})
	}

	//   View all Show hide One
	if($('.viewall-One').length > 0) {
	$(document).ready(function () {
		$(".viewall-One").hide();
		$(".viewall-button-One").click(function () {
		  $(this).text($(this).text() === "Close All" ? "View All" : "Close All");
		  $(".viewall-One").slideToggle(900);
		});
	  });
	}

	//   View all Show hide Two
	if($('.viewall-Two').length > 0) {
		$(document).ready(function () {
			$(".viewall-Two").hide();
			$(".viewall-button-Two").click(function () {
			  $(this).text($(this).text() === "Close All" ? "View All" : "Close All");
			  $(".viewall-Two").slideToggle(900);
			});
		});
	}

	// Sidebar Initiate
	init();

	// Mobile menu sidebar overlay
	$('body').append('<div class="sidebar-overlay"></div>');
	$(document).on('click', '#mobile_btn', function () {
		$wrapper.toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').toggleClass('menu-opened');
		return false;
	});

	// Sidebar overlay
	$(".sidebar-overlay").on("click", function () {
		$wrapper.removeClass('slide-nav');
		$(".sidebar-overlay").removeClass("opened");
		$('html').removeClass('menu-opened');
	});

	// Page Content Height
	if ($('.page-wrapper').length > 0) {
		var height = $(window).height();
		$(".page-wrapper").css("min-height", height);
	}

	// Page Content Height Resize
	$(window).resize(function () {
		if ($('.page-wrapper').length > 0) {
			var height = $(window).height();
			$(".page-wrapper").css("min-height", height);
		}
	});

	// Select 2
	if ($('.select').length > 0) {
		$('.select').each(function() {
			const dom = $(this);

			const placeholder = dom.attr('placeholder') ?? undefined;
			const withSearch = dom.data('search');

			const opts = {
				minimumResultsForSearch: withSearch ? undefined : -1,
				width: '100%',
				placeholder,
			};

			if (dom.attr('placeholder')) {
				opts.placeholder = dom.attr('placeholder');
			}

			dom.select2(opts);
			dom.on('select2:open', function (e) {
				setTimeout(() => {
					const search = $('input[type=search].select2-search__field');
					if (search && search.length > 0) {
						search[0].focus();
					}
				}, 200);
			});
		})
	}

	// Datetimepicker

	if($('.datetimepicker').length > 0 ){
		$('.datetimepicker').each(function() {
			const dom = $(this);
			const format = dom.attr('datetimepicker-format') ?? 'DD-MM-YYYY';
			dom.datetimepicker({
				format: format,
				date: dom.val() ?? new Date(),
				icons: {
					up: "fas fa-angle-up",
					down: "fas fa-angle-down",
					next: 'fas fa-angle-right',
					previous: 'fas fa-angle-left'
				}
			});

		});
	}

    if($('.timepicker').length > 0) {
		$('.timepicker').datetimepicker({
			format: "HH:mm",
			icons: {
				up: "fa fa-angle-up",
				down: "fa-solid fa-angle-down",
				next: 'fa-solid fa-angle-right',
				previous: 'fa-solid fa-angle-left'
			}
		});
	}

	// Datatable

	// Datatable
    if ($('.datatable').length > 0) {

        // Init datatable with export buttons
        const dtLang = {
            config: {
                "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "&nbsp;_MENU_",
                "sLoadingRecords": '<i class="fa fa-spinner fa-spin fa-fw"></i><span class="sr-only">Memuat</span> Memuat...',
                "sProcessing": "Memproses...",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext":     "Selanjutnya",
                    "sLast":     "Terakhir"
                }
            },
            menu:{
                entries: "entri",
                allEntries: "Semua entri",
            }
        };

		$('.datatable').each(function() {
			const domTable = $(this);
			const useKeyTable = domTable.hasClass('datatable-keytable')
				? true
				: false;

			const useScrollX = domTable.hasClass('datatable-scroll-x');
			const searchInputs = [];

			const notinit = domTable.hasClass('noinit') || domTable.hasClass('no-init') || domTable.hasClass('nofilter');
			if (!notinit) {
				const thead = domTable.find('thead');
				thead.append(thead.find('tr').clone(true));

				// Add a search box in thead, to search by individual column
				domTable.find('thead').find('tr:eq(1)').find('th').each(function(i) {
					const column = $(this);
					let title = column.text();
					if (column.attr('datatable-skip-search')) {
						column.html('');
						return;
					}
	
					if (title && !['#','Aksi', ''].includes(title)) {
						const searchInput = $(`<input type="text" name="input-search[${i}]" target-column="${i}" class="form-control form-control-sm" placeholder="&#x1F50D;" style="min-width:100px">`);
						searchInputs.push(searchInput);
						column.html(searchInput);
					} else {
						$(this).html('');
					}
				});
			}

			const orderAttr = domTable.attr('datatable-order');
			let order = [[0,'asc']];
			if (orderAttr) {
				try {
					order = JSON.parse(orderAttr.replaceAll("'", `"`));
				} catch (error) {}
			}

			const table = domTable.DataTable({
				keys: useKeyTable,
				scrollX: useKeyTable || useScrollX,
				orderCellsTop: true,
				order: order,
				dom: '<"row"<"col-md-5 dt-feat-right"l><"col-md-7 dt-toolbar-right">>rtip',
				lengthMenu: [
					[25, 50, 100,-1],
					[`25 ${dtLang.menu.entries}`, `50 ${dtLang.menu.entries}`, `100 ${dtLang.menu.entries}`,dtLang.menu.allEntries]
				],
				oLanguage: dtLang.config,
			});

			for(const searchInput of searchInputs) {
				const targetColumn = parseInt(searchInput.attr('target-column'));
				searchInput.on('keyup change', function() {
					if (table.column(targetColumn).search() !== this.value) {
						table.column(targetColumn)
							.search(this.value)
							.draw();
					}
				});
			}
		});

	}


	// Sidebar Slimscroll

	if ($slimScrolls.length > 0) {
		$slimScrolls.slimScroll({
			height: 'auto',
			width: '100%',
			position: 'right',
			size: '7px',
			color: '#ccc',
			allowPageScroll: false,
			wheelStep: 10,
			touchScrollStep: 100
		});
		var wHeight = $(window).height() - 60;
		$slimScrolls.height(wHeight);
		$('.sidebar .slimScrollDiv').height(wHeight);
		$(window).resize(function () {
			var rHeight = $(window).height() - 60;
			$slimScrolls.height(rHeight);
			$('.sidebar .slimScrollDiv').height(rHeight);
		});
	}

	// Password Show

	if($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $(".pass-input");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}

	// Small Sidebar
	$(document).on('click', '#toggle_btn', function () {
		if ($('body').hasClass('mini-sidebar')) {
			$('body').removeClass('mini-sidebar');
			$('.subdrop + ul').slideDown();
		} else {
			$('body').addClass('mini-sidebar');
			$('.subdrop + ul').slideUp();
		}
		setTimeout(function () {
			// mA.redraw();
			// mL.redraw();
		}, 300);
		return false;
	});

	$(document).on('mouseover', function (e) {
		e.stopPropagation();
		if ($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
			var targ = $(e.target).closest('.sidebar').length;
			if (targ) {
				$('body').addClass('expand-menu');
				$('.subdrop + ul').slideDown();
			} else {
				$('body').removeClass('expand-menu');
				$('.subdrop + ul').slideUp();
			}
			return false;
		}
	});

	$(document).on('click', '#filter_search', function() {
		$('#filter_inputs').slideToggle("slow");
	});

	// Tooltip

	if($('[data-bs-toggle="tooltip"]').length > 0) {
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		  return new bootstrap.Tooltip(tooltipTriggerEl)
		})
	}

	// Popover

	if($('.popover-list').length > 0) {
		var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
		var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		  return new bootstrap.Popover(popoverTriggerEl)
		})
	}

	// Country Code Selection
	if($('#mobile_code').length > 0) {
		$( '#mobile_code' ).intlTelInput( {
			initialCountry: "in",
			separateDialCode: true,
		});
	}

	// Toggle
	if($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function() {
			$(this).toggleClass("feather-eye feather-eye-off");
			var input = $(".pass-input");
			if (input.attr("type") == "password") {
				input.attr("type", "password");
			} else {
				input.attr("type", "text");
			}
		});
	}

	//Advance Tabs
	$(".next").click(function () {
		const nextTabLinkEl = $(".nav-tabs .active")
			.closest("li")
			.next("li")
			.find("a")[0];
		const nextTab = new bootstrap.Tab(nextTabLinkEl);
		nextTab.show();
	});

	$(".previous").click(function () {
		const prevTabLinkEl = $(".nav-tabs .active")
			.closest("li")
			.prev("li")
			.find("a")[0];
		const prevTab = new bootstrap.Tab(prevTabLinkEl);
		prevTab.show();
	});




})(jQuery);