/**  ======= PENGINGAT =======
 * jika ingin melakukan import & export pada browser maka gunakan
 * type="module" pada tag script pada file html
 * catatan : lakukan itu pada semua file yang memiliki syntax import & export.
 */
import Config from "./config.js";

var vue = new Vue({
	el: "#group",
	data: {
		url: Config, // config merupakan variabel berisi base url dari file config.js
		groups: [],
		totalGroups: 0,
		user: [],
		emptyResult: false,
		allGroups: false,
		joinedGroups: false,
		myGroups: false,
		joinGrup: {
			id_user: "",
			id_grup: "",
		},
	},
	created() {
		this.getAllGroup();
	},
	methods: {
		getAllGroup() {
			axios.get(this.url + "group/getAllGroup").then((response) => {
				// Arrow function ECMAScript 6
				if (response.data.groups == null) {
					vue.emptyResult = true;
					vue.groups = null;
					vue.totalGroups = 0;
				} else {
					vue.allGroups = true;
					vue.myGroups = false;
					vue.joinedGroup = false;
					vue.emptyResult = false;
					vue.groups = response.data.groups;
					vue.user = response.data.user;
					vue.totalGroups = vue.groups.length;
				}
			});
		},

		getMyGroup() {
			axios.get(this.url + "group/getMyGroup").then((response) => {
				if (response.data.groups == null) {
					vue.emptyResult = true;
					vue.groups = null;
					vue.totalGroups = 0;
				} else {
					vue.allGroups = false;
					vue.myGroups = true;
					vue.joinedGroups = false;
					vue.emptyResult = false;
					vue.groups = response.data.groups;
					vue.user = response.data.user;
					vue.totalGroups = vue.groups.length;
				}
			});
		},

		getJoinedGroup() {
			axios.get(this.url + "group/getJoinedGroup").then((response) => {
				if (response.data.groups == null) {
					vue.emptyResult = true;
					vue.groups = null;
					vue.totalGroups = 0;
				} else {
					vue.allGroups = false;
					vue.myGroups = false;
					vue.joinedGroups = true;
					vue.emptyResult = false;
					vue.user = response.data.user;

					vue.groups = []; // bersihkan data sebelumnya lalu masukan data baru
					for (let i = 0; i < response.data.groups.length; i++) {
						for (let j = 0; j < response.data.groups[i].length; j++) {
							vue.groups.push(response.data.groups[i][j]);
						}
					}
					vue.totalGroups = vue.groups.length;
				}
			});
		},

		tambahGroup() {
			this.groupBaru.group_image = this.selectedFile; // upload gambar
			var formData = vue.formData(vue.groupBaru);
			axios.post(this.url + "group/tambahGroup", formData).then((response) => {
				// Arrow function ECMAScript 6
				if (response.data.error) {
					vue.formValidate = response.data.msg;
				} else {
					vue.successMSG = response.data.success;
				}
			});
		},

		ubahGroup() {
			vue.groupData.group_image = this.selectedFile;
			var formData = vue.formData(vue.groupData);
			axios.post(this.url + "group/ubahGroup", formData).then((response) => {
				// Arrow function ECMAScript 6
				if (response.data.error) {
					vue.formValidate = response.data.msg;
				} else {
					vue.successMSG = response.data.success;
				}
			});
		},

		cariGroup() {
			var formData = vue.formData(vue.search);
			axios.post(this.url + "group/cariGroup", formData).then((response) => {
				// Arrow function ECMAScript 6
				if (response.data.groups == null) {
					vue.noResult();
				} else {
					vue.getData(response.data.groups);
				}
			});
		},

		getVerifikasi() {
			let formData = vue.formData(vue.groupData);
			axios
				.post(this.url + "group/getVerifikasi", formData)
				.then((response) => {
					if (response.data.user == null) {
						this.noVerifikasiResult();
					} else {
						this.celarDataVerifikasi(response.data.user);
					}
				});
		},

		join(idUser, idGrup) {
			vue.joinGrup.id_user = idUser;
			vue.joinGrup.id_grup = idGrup;
			let formData = vue.formData(vue.joinGrup);

			axios.post(this.url + "group/join", formData).then((response) => {
				if (response.data.status) {
					console.log(response.data.pesan);
					Swal.fire({
						icon: "success",
						title: "Group",
						text: response.data.pesan,
					});
				} else {
					console.log(response.data.pesan);
					Swal.fire({
						icon: "success",
						title: "Group",
						text: response.data.pesan,
					});
				}
			});
		},

		gambarGroup(namaFile) {
			return this.url + "assets/img/group/" + namaFile;
		},

		previewImage(e) {
			this.selectedFile = e.target.files[0];
			let image = e.target.files[0];
			let reader = new FileReader();
			reader.readAsDataURL(image);
			reader.onload = (e) => {
				this.avatar = e.target.result;
			};
		},

		formData(obj) {
			var formData = new FormData();
			for (var key in obj) {
				formData.append(key, obj[key]);
			}
			return formData;
		},

		route(destination) {
			return this.url + destination;
		},
	},
});
