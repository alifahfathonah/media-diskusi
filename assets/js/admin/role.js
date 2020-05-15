/**
 * jika ingin melakukan import & export pada browser maka gunakan
 * typ="module" pada tag script pada file html
 * catatan : lakukan itu pada semua file yang memiliki syntax import & export.
 */
import Config from "./config.js";

/**
 * untuk modal ubah role pada menu admin
 */
$(function () {
	// sesuaikan dengan base url pada config/config.php dari codeigniter
	const baseUrl = Config;

	// fungsi untuk mengubah nama role
	$(".tampilModalUbahRole").on("click", function () {
		const id = $(this).data("id");

		const controllerMethodGetRole = "admin/getubahrole";
		const controllerMethodUbahRole = "admin/ubahrole";

		$("#formUbahRole").attr("action", `${baseUrl}${controllerMethodUbahRole}`);

		$.ajax({
			url: `${baseUrl}${controllerMethodGetRole}`,
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#roleUbah").val(data.role);
				$("#idUbah").val(data.id);
			},
			error: function (xhr, status, error) {
				let errorMessage = xhr.status + " : " + xhr.statusText;
				console.log("Error : " + errorMessage);
			},
		});
	});

	/**
	 * untuk mengubah access menu pada role access
	 */
	function changeAccessMenu() {
		$(".change-role-access").on("click", function () {
			const menuId = $(this).data("menu");
			const roleId = $(this).data("role");

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

	/**
	 * fungsi untuk validasi form tambah role
	 */
	$("#formTambahRole").on("submit", function (e) {
		let isValid = true;

		let role = $("#roleTambah").val();

		if (role == "") {
			e.preventDefault();
			$("#pesanErrorRoleTambah").html("Nama Role harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorRoleTambah").html("");
		}

		return isValid;
	});

	/**
	 * fungsi untuk validasi form ubah role
	 */
	$("#formUbahRole").on("submit", function (e) {
		let isValid = true;

		let role = $("#roleUbah").val();

		if (role == "") {
			e.preventDefault();
			$("#pesanErrorRoleUbah").html("Nama Role harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorRoleUbah").html("");
		}

		return isValid;
	});
});
