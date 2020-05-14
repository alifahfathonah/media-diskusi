$(document).ready(function () {
	/**
	 * fungsi untuk validasi form tambah group
	 */
	$("#formTambahGroup").on("submit", function (e) {
		const isValid = true;

		let namaGroup = $("#namaGroupTambah").val();
		let deskripsiGroup = $("#deskripsiGroupTambah").val();

		if (namaGroup == "" || deskripsiGroup == "") {
			e.preventDefault();
			$("#pesanErrorNamaGroupTambah").html("Nama group harus diisi!");
			$("#pesanErrorDeskripsiGroupTambah").html("Deskripsi group harus diisi!");
			isValid = false;
		}

		return isValid;
	});
});
