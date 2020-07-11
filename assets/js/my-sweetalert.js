const flashMessageRole = $(".flash-message-role").data("message");

// FLASH MESSAGE
if (flashMessageRole) {
	Swal.fire({
		title: "Data Role berhasil",
		text: flashMessageRole,
		icon: "success",
	});
}

// TOMBOL HAPUS
$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Anda akan menghapus data tersebut!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
