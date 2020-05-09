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
});
