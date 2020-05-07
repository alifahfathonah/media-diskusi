/**
 * untuk mengubah access menu pada role access
 */
function changeAccessMenu() {
	$(".form-check-input").on("click", function () {
		const menuId = $(this).data("menu");
		const roleId = $(this).data("role");

		const baseUrl = "http://localhost/kuliah/pkl/media-diskusi/";

		$.ajax({
			url: base_url + "admin/changeaccess",
			type: "post",
			data: {
				menuId: menuId,
				roleId: roleId,
			},
			success: function () {
				document.location.href = baseUrl + "admin/roleaccess/" + roleId;
			},
		});
	});
}

changeAccessMenu();

/**
 * untuk menampilkan nama file pada ubah gambar profile user
 */
function tampilNamaFileUpload() {
	$(".custom-file-input").on("change", function () {
		let fileName = $(this).val().split("\\").pop();
		$(this).next(".custom-file-label").addClass("selected").html(fileName);
	});
}

tampilNamaFileUpload();
