const flashMessageRole = $(".flash-message-role").data("message");

// FLASH MESSAGE
if (flashMessageRole) {
	swal({
		title: "Data Role berhasil",
		text: flashMessageRole,
		icon: "success",
		button: "OK",
	});
}

// TOMBOL HAPUS
$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	swal({
		title: "Apakah anda yakin?",
		text: "Anda akan menghapus data tersebut!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
		if (willDelete) {
			document.location.href = href;
		}
	});
});
