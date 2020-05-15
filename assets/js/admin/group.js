/**
 * jika ingin melakukan import & export pada browser maka gunakan
 * typ="module" pada tag script pada file html
 * catatan : lakukan itu pada semua file yang memiliki syntax import & export.
 */
import Config from "./config.js";

$(document).ready(function () {
	// base url sesuaikan dengan config dari codeigniter
	const baseUrl = Config;

	/**
	 * fungsi untuk validasi form tambah group
	 */
	$("#formTambahGroup").on("submit", function (e) {
		let isValid = true;

		let namaGroup = $("#namaGroupTambah").val();
		let deskripsiGroup = $("#deskripsiGroupTambah").val();

		if (namaGroup == "") {
			e.preventDefault();
			$("#pesanErrorNamaGroupTambah").html("Nama group harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorNamaGroupTambah").html("");
		}

		if (deskripsiGroup == "") {
			e.preventDefault();
			$("#pesanErrorDeskripsiGroupTambah").html("Deskripsi group harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorDeskripsiGroupTambah").html("");
		}

		return isValid;
	});

	/**
	 * fungsi untuk validasi form ubah group
	 */
	$("#formUbahGroup").on("submit", function (e) {
		let isValid = true;

		let namaGroup = $("#namaGroupUbah").val();
		let deskripsiGroup = $("#deskripsiGroupUbah").val();

		if (namaGroup == "") {
			e.preventDefault();
			$("#pesanErrorNamaGroupUbah").html("Nama group harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorNamaGroupUbah").html("");
		}

		if (deskripsiGroup == "") {
			e.preventDefault();
			$("#pesanErrorDeskripsiGroupUbah").html("Deskripsi group harus diisi!");
			isValid = false;
		} else {
			$("#pesanErrorDeskripsiGroupUbah").html("");
		}

		return isValid;
	});

	$(".tampilModalUbahGroup").on("click", function () {
		const id = $(this).data("id");

		const controllerMethodGetGroup = "group/getubahgroup";
		const controllerMethodUbahGroup = "group/ubahgroup";

		$("#formUbahGroup").attr(
			"action",
			`${baseUrl}${controllerMethodUbahGroup}`
		);

		$.ajax({
			url: `${baseUrl}${controllerMethodGetGroup}`,
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#namaGroupUbah").val(data.group_name);
				$("#deskripsiGroupUbah").val(data.group_desc);
				$("#idGroupUbah").val(data.id);
			},
		});
	});
});
