/**
 * untuk modal ubah role pada menu admin
 */
$(function () {
	$(".modalTambahRole").on("click", function () {
		$("#newRoleModalLabel").html("Tambah Role");
		$(".modal-footer button[type=submit]").html("Tambah");
		$("#formTambahRole input[type=text]").val("");
	});

	$(".modalUbahRole").on("click", function () {
		$("#newRoleModalLabel").html("Ubah Role");
		$(".modal-footer button[type=submit]").html("Ubah");

		const id = $(this).data("id");
		const baseUrl = "http://localhost/kuliah/pkl/media-diskusi/";
		const controller = "admin";
		const methodGetRole = "getubahrole";
		const methodUbahRole = "ubahrole";

		$("#formTambahRole").attr(
			"action",
			`${baseUrl}${controller}/${methodUbahRole}`
		);

		$.ajax({
			url: `${baseUrl}${controller}/${methodGetRole}`,
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#role").val(data.role);
				$("#id").val(data.id);
			},
		});
	});
});
