$(".form-check-input").on("click", function () {
	const menuId = $(this).data("menu");
	const roleId = $(this).data("role");

	const base_url = "http://localhost/kuliah/pkl/media-diskusi/";

	$.ajax({
		url: base_url + "admin/changeaccess",
		type: "post",
		data: {
			menuId: menuId,
			roleId: roleId,
		},
		success: function () {
			document.location.href = base_url + "admin/roleaccess/" + roleId;
		},
	});
});

/**
 * sampai ke 9 lanjut ke 10
 */
