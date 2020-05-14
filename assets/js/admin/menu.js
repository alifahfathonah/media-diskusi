$(function () {
	// variabel global yang akan diakses semua fungsi didalamnya
	const baseUrl = "http://localhost/kuliah/pkl/media-diskusi/";
	/**
	 * fungsi untuk ubah menu pada menu management
	 */
	$(".tampilModalUbahMenu").on("click", function () {
		const id = $(this).data("id");

		const controllerMethodGetMenu = "menu/getubahmenu";
		const controllerMethodUbahMenu = "menu/ubahmenu";

		$("#formUbahMenu").attr("action", `${baseUrl}${controllerMethodUbahMenu}`);

		$.ajax({
			url: `${baseUrl}${controllerMethodGetMenu}`,
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#idUbahMenu").val(data.id);
				$("#menuUbahMenu").val(data.menu);
			},
		});
	});

	/**
	 * fungsi untuk ubah submenu pada menu management
	 */
	$(".tampilModalUbahSubmenu").on("click", function () {
		const id = $(this).data("id");

		const controllerMethodGetSubmenu = "menu/getubahsubmenu";
		const controllerMethodUbahSubmenu = "menu/ubahsubmenu";

		$("#formUbahSubmenu").attr(
			"action",
			`${baseUrl}${controllerMethodUbahSubmenu}`
		);

		$.ajax({
			url: `${baseUrl}${controllerMethodGetSubmenu}`,
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#idUbah").val(data.id);
				$("#titleUbah").val(data.title);
				$("#menuIdUbah").val(data.menu_id);
				$("#urlUbah").val(data.url);
				$("#iconUbah").val(data.icon);
				$("#is_activeUbah").val(data.is_active);
			},
		});
	});

	/**
	 * fungsi untuk validasi form tambah sub menu
	 */
	$("#formTambahSubMenu").on("submit", function (e) {
		let isValid = true;

		let title = $("#title").val();
		let menuId = $("#menu_id").val();
		let url = $("#url").val();
		let icon = $("#icon").val();
		let isActive = $("#is_active").val();

		if (title == "") {
			e.preventDefault();
			$("#pesanErrorTitle").html("Title harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorTitle").html("");
		}

		if (menuId == "") {
			e.preventDefault();
			$("#pesanErrorMenu").html("Menu harus dipilih!");
			isValid = false;
		} else {
			$("#pesanErrorMenu").html("");
		}

		if (url == "") {
			e.preventDefault();
			$("#pesanErrorUrl").html("URL harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorUrl").html("");
		}

		if (icon == "") {
			e.preventDefault();
			$("#pesanErrorIcon").html("Icon harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorIcon").html("");
		}

		if (isActive == "") {
			e.preventDefault();
			$("#pesanErrorIsActive").html("Is Active harus dicentang!");
			isValid = false;
		} else {
			$("#pesanErrorIsActive").html("");
		}

		return isValid;
	});

	/**
	 * fungsi untuk validasi form ubah sub menu
	 */
	$("#formUbahSubMenu").on("click", function (e) {
		let isValid = true;

		let title = $("#titleUbah").val();
		let menuId = $("#menuIdUbah").val();
		let url = $("#urlUbah").val();
		let icon = $("#iconUbah").val();
		let isActive = $("#is_activeUbah").val();

		if (icon == "") {
			e.preventDefault();
			$("#pesanErrorIconUbah").html("Icon harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorIconUbah").html("");
		}

		if (isActive == "") {
			e.preventDefault();
			$("#pesanErrorIsActiveUbah").html("Is Active harus dicentang!");
			isValid = false;
		} else {
			$("#pesanErrorIsActiveUbah").html("");
		}

		if (title == "") {
			e.preventDefault();
			$("#pesanErrorTitleUbah").html("Title harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorTitleUbah").html("");
		}

		if (menuId == "") {
			e.preventDefault();
			$("#pesanErrorMenuUbah").html("Menu harus dipilih!");
			isValid = false;
		} else {
			$("#pesanErrorMenuUbah").html("");
		}

		if (url == "") {
			e.preventDefault();
			$("#pesanErrorUrlUbah").html("URL harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorUrlUbah").html("");
		}

		return isValid;
	});

	/**
	 * fungsi untuk validasi form tambah menu
	 */
	$("#formTambahMenu").on("submit", function (e) {
		let isValid = true;

		let menu = $("#menuTambah").val();

		if (menu == "") {
			e.preventDefault();
			$("#pesanErrorMenuTambah").html("Menu harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorMenuTambah").html("");
		}

		return isValid;
	});

	/**
	 * fungsi untuk validasi form ubah menu
	 */
	$("#formUbahMenu").on("submit", function (e) {
		let isValid = true;

		let menu = $("#menuUbahMenu").val();

		if (menu == "") {
			e.preventDefault();
			$("#pesanErrorMenuUbah").html("Menu harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorMenuUbah").html("");
		}

		return isValid;
	});
});
