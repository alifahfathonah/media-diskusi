import config from "./config.js";

var vue = new Vue({
	el: "#forum_diskusi",
	data: {
		url: config,
		forumDiskusi: [],
		search: { cariForumDiskusi: "" },
		emptyResult: false,
		forum_diskusi: {
			text_content: "",
			image: "",
		},
		formValidate: [],
		avatar: null,
		selectedFile: null,

		// pagination
		currentPage: 0,
		rowCountPage: 100,
		totalForumDiskusi: 0,
		pageRange: 2,
	},

	created() {
		this.tampilSemuaForum();
	},

	methods: {
		tampilSemuaForum() {
			axios.get(this.url + "diskusi/tampilSemuaForum").then((response) => {
				if (response.data.forum == false) {
					vue.noResult();
				} else {
					vue.getData(response.data.forum);
				}
			});
		},

		postDiskusi() {
			this.forum_diskusi.image = this.selectedFile;
			let formData = vue.formData(vue.forum_diskusi);
			axios
				.post(this.url + "diskusi/postDiskusi", formData)
				.then((response) => {
					if (response.data.error) {
						vue.formValidate = response.data.pesan;
					} else {
						vue.pesanBerhasil = response.data.berhasil;
						swal({
							title: "Forum Diskusi",
							text: vue.pesanBerhasil,
							icon: "success",
							button: "OK",
						});
						this.forum_diskusi.text_content = "";
						this.forum_diskusi.image = "";
						this.avatar = null;
						this.selectedFile = null;
						this.refresh();
					}
				});
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

		batal() {
			this.forum_diskusi.text_content = "";
			this.forum_diskusi.image = "";
			this.formValidate = false;
			this.avatar = null;
			this.selectedFile = null;
			this.refresh();
		},

		formData(obj) {
			let formData = new FormData();
			for (let key in obj) {
				formData.append(key, obj[key]);
			}
			return formData;
		},

		gambarForum(namaFile) {
			return this.url + "assets/img/forum_diskusi/" + namaFile;
		},

		gambarUser(namaFile) {
			return this.url + "assets/img/profile/" + namaFile;
		},

		noResult() {
			vue.emptyResult = true;
			vue.forumDiskusi = null;
			vue.totalForumDiskusi = 0;
		},

		getData(forumDiskusi) {
			vue.emptyResult = false;
			vue.totalForumDiskusi = forumDiskusi.length;
			vue.forumDiskusi = forumDiskusi.slice(
				vue.currentPage * vue.rowCountPage,
				vue.currentPage * vue.rowCountPage + vue.rowCountPage
			);

			if (vue.forumDiskusi.length == 0 && vue.currentPage > 0) {
				vue.pageUpdate(vue.currentPage - 1);
				vue.clearAll();
			}
		},

		pageUpdate(pageNumber) {
			vue.currentPage = pageNumber;
			vue.refresh();
		},

		clearAll() {
			vue.refresh();
		},

		refresh() {
			vue.search.cariForumDiskusi ? vue.cari() : vue.tampilSemuaForum();
		},
	},
});
