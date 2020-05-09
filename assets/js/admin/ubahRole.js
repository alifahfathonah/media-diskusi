/**
 * untuk modal ubah role pada menu admin
 */
$(function () {
	// fungsi untuk mengubah nama role
	$(".tampilModalUbahRole").on("click", function () {
		const id = $(this).data("id");

		const baseUrl = "http://localhost/kuliah/pkl/media-diskusi/";
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
				$("#role").val(data.role);
				$("#id").val(data.id);
			},
			error: function (xhr, status, error) {
				let errorMessage = xhr.status + " : " + xhr.statusText;
				console.log("Error : " + errorMessage);
			},
		});
	});
});
