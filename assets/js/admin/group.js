$(document).ready(function () {
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
});
