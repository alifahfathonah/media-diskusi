/**
 * untuk mengubah access menu pada role access
 */
function changeAccessMenu() {
	$(".change-role-access").on("click", function () {
		const menuId = $(this).data("menu");
		const roleId = $(this).data("role");

		const baseUrl = "http://localhost/kuliah/pkl/media-diskusi/";
		const controllerMethodChange = "admin/changeroleaccess";
		const controllerMethodRole = "admin/roleaccess";

		$.ajax({
			url: `${baseUrl}${controllerMethodChange}`,
			type: "post",
			data: {
				menuId: menuId,
				roleId: roleId,
			},
			success: function () {
				document.location.href = `${baseUrl}${controllerMethodRole}/${roleId}`;
			},
		});
	});
}

changeAccessMenu();

/**
 * fungsi untuk mengubah level user
 */
function changeUserAccess() {
	$(".change-user-access").on("click", function () {
		const userId = $(this).data("userid");
		const roleId = $(this).data("roleid");
		console.log(userId);
		console.log(roleId);

		const baseUrl = "http://localhost/kuliah/pkl/media-diskusi/";
		const controllerMethodChange = "admin/changeuseraccess";
		const controllerMethodUserAccess = "admin/useraccess";

		$.ajax({
			url: `${baseUrl}${controllerMethodChange}`,
			type: "post",
			data: {
				userId: userId,
				roleId: roleId,
			},
			success: function () {
				document.location.href = `${baseUrl}${controllerMethodUserAccess}`;
			},
		});
	});
}
changeUserAccess();

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
