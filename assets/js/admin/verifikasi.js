import config from "./config.js";

var vue = new Vue({
	el: "#verifikasi",
	data: {
		url: config,
		usersVerifikasi: [],
		emptyResult: false,
		verify: {
			user_id: "",
			grup_id: "",
		},
	},
	created() {
		this.getVerifikasi();
	},
	methods: {
		getVerifikasi() {
			axios.get(this.url + "verifikasi/getVerifikasi").then((response) => {
				if (response.data.user == null) {
					vue.emptyResult = true;
					vue.usersVerifikasi = null;
				} else {
					vue.emptyResult = false;
					vue.usersVerifikasi = response.data.user;
				}
			});
		},

		accept(idUser, idGrup) {
			vue.verify.user_id = idUser;
			vue.verify.grup_id = idGrup;
			let formData = vue.formData(vue.verify);
			axios.post(this.url + "verifikasi/accept", formData).then((response) => {
				if (response.data.result) {
					this.getVerifikasi();
					Swal.fire({
						title: "Group",
						text: response.data.pesan,
						icon: "success",
						button: "OK",
					});
				}
			});
		},

		remove(idUser, idGrup) {
			vue.verify.user_id = idUser;
			vue.verify.grup_id = idGrup;
			let formData = vue.formData(vue.verify);
			axios.post(this.url + "verifikasi/remove", formData).then((response) => {
				if (response.data.result) {
					this.getVerifikasi();
					Swal.fire({
						title: "Group",
						text: response.data.pesan,
						icon: "success",
						button: "OK",
					});
				}
			});
		},

		formData(obj) {
			let formData = new FormData();
			for (let key in obj) {
				formData.append(key, obj[key]);
			}
			return formData;
		},

		gambarUser(namaFile) {
			return this.url + "assets/img/profile/" + namaFile;
		},
	},
});
