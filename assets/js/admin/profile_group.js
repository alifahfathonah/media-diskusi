import config from "./config.js";

var vue = new Vue({
	el: "#profile_group",
	data: {
		url: config,
		group: {},
		user: {},
		postingan: [],
		members: [],
		emptyResult: false,
		emptyResultMembers: false,
		emptyResultPostingan: false,
		formValidate: [],
		avatar: null,
		selectedFile: null,
		postDiskusi: {
			text_content: "",
			image: "",
		},
		postingBerhasil: false,
		pesanPostingBerhasil: "",
		pesanPostingGagal: "",
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
					vue.postingBerhasil = false;
					vue.pesanPostingBerhasil = "";
					vue.pesanPostingGagal = response.data.pesan;
				} else {
					vue.postingBerhasil = true;
					vue.pesanPostingBerhasil = "Diskusi berhasil diposting!";
					vue.postDiskusi.text_content = "";
					vue.postDiskusi.image = "";
					vue.avatar = null;
					vue.selectedFile = null;
					this.getGroup();
				}
			});
		},

		getPostingan() {
			axios.get(this.url + "group/getPostingan").then((response) => {
				if (response.data.status) {
					vue.postingan = response.data.postingan;
					vue.emptyResultPostingan = false;
				} else {
					vue.emptyResultPostingan = true;
					vue.postingan = null;
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
			this.pesanPostingGagal = "";
			this.postingBerhasil = false;
			this.pesanPostingBerhasil = "";
		},

		getGroup() {
			axios.get(this.url + "group/getGroup").then((response) => {
				if (!response.data.status) {
					vue.emptyResult = true;
					vue.group = null;
					vue.user = null;
				} else {
					vue.group = response.data.group;
					vue.user = response.data.user;
					vue.emptyResult = false;
					this.getPostingan();
					this.getMembersGroup();
				}
			});
		},

		getMembersGroup() {
			axios.get(this.url + "group/getMembersGroup").then((response) => {
				if (response.data.status) {
					for (let i = 0; i < response.data.members.length; i++) {
						for (let j = 0; j < response.data.members[i].length; j++) {
							vue.members.push(response.data.members[i][j]);
						}
					}
					vue.emptyResultMembers = false;
				} else {
					vue.members = null;
					vue.emptyResultMembers = true;
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
