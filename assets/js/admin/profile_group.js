import config from "./config.js";

var vue = new Vue({
	el: "#profile_group",
	data: {
		url: config,
		group: {},
		user: {},
		postingan: [],
		emptyResult: false,
		emptyResultPostingan: false,
		formValidate: [],
		avatar: null,
		selectedFile: null,
		postDiskusi: {
			text_content: "",
			image: "",
		},
	},

	created() {
		this.getGroup();
	},

	methods: {
		posting() {
			if (this.selectedFile != null) {
				this.postDiskusi.image = this.selectedFile;
			}
			let formData = vue.formData(vue.postDiskusi);
			axios.post(this.url + "group/posting", formData).then((response) => {
				if (response.data.error) {
					vue.formValidate = response.data.pesan;
					console.log(response.data.pesan);
					console.log(response.data.test);
				} else {
					// vue.pesanBerhasil = response.data.berhasil;
					console.log(response.data.pesan);
					console.log(response.data.test);
					Swal.fire({
						title: "Forum Diskusi",
						text: response.data.pesan,
						icon: "success",
						button: "OK",
					});
					vue.postDiskusi.text_content = "";
					vue.postDiskusi.image = "";
					vue.avatar = null;
					vue.selectedFile = null;
				}
			});
		},

		getPostingan() {
			axios.get(this.url + "group/getPostingan").then((response) => {
				if (response.data.status) {
					vue.postingan = response.data.postingan;
				} else {
					vue.emptyResultPostingan = true;
				}
			});
		},

		previewImage(e) {
			vue.selectedFile = e.target.files[0];
			let image = e.target.files[0];
			let reader = new FileReader();
			reader.readAsDataURL(image);
			reader.onload = (e) => {
				vue.avatar = e.target.result;
			};
		},

		cancelPost() {
			this.postDiskusi.text_content = "";
			this.postDiskusi.image = "";
			this.formValidate = false;
			this.avatar = null;
			this.selectedFile = null;
		},

		getGroup() {
			axios.get(this.url + "group/getGroup").then((response) => {
				if (!response.data.status) {
					vue.emptyResult = true;
				} else {
					vue.group = response.data.group;
					vue.user = response.data.user;
					this.getPostingan();
				}
			});
		},

		gambarGroup(file) {
			return this.url + "assets/img/group/" + file;
		},

		gambarUser(file) {
			return this.url + "assets/img/profile/" + file;
		},

		gambarPostingan(file) {
			return this.url + "assets/img/forum_diskusi/" + file;
		},

		route(destination) {
			return this.url + destination;
		},

		formData(obj) {
			let formData = new FormData();
			for (let key in obj) {
				formData.append(key, obj[key]);
			}
			return formData;
		},
	},
});
