import config from "./config.js";

var vue = new Vue({
	el: "#diskusi",
	data: {
		url: config,
		groupDiskusi: [],
		userData: [],
		search: { cariDiskusi: "" },
		emptyResult: false,
		idUserIdGrup: {
			id_user: "",
			id_grup: "",
		},

		// pagination
		currentPage: 0,
		rowCountPage: 5,
		totalGroups: 0,
		pageRange: 2,
	},

	created() {
		this.tampilSemuaData();
	},

	methods: {
		tampilSemuaData() {
			axios.get(this.url + "diskusi/tampilSemuaData").then((response) => {
				if (response.data.data == null) {
					vue.noResult();
				} else {
					vue.getData(response.data.data);
					console.log(vue.groupDiskusi);
				}
			});
		},

		getData(groupDiskusi) {
			vue.emptyResult = false;
			vue.totalGroups = groupDiskusi.length;
			vue.groupDiskusi = groupDiskusi.slice(
				vue.currentPage * vue.rowCountPage,
				vue.currentPage * vue.rowCountPage + vue.rowCountPage
			);

			if (vue.groupDiskusi.length == 0 && vue.currentPage > 0) {
				vue.pageUpdate(vue.currentPage - 1);
				vue.clearAll();
			}
		},

		formData(obj) {
			let formData = new FormData();
			for (var key in obj) {
				formData.append(key, obj[key]);
			}
			return formData;
		},

		noResult() {
			vue.emptyResult = true;
			vue.groupDiskusi = null;
			vue.totalGroups = 0;
		},

		pageUpdate(pageNumber) {
			vue.currentPage = pageNumber;
			vue.refresh();
		},

		clearAll() {
			vue.refresh();
		},

		gambar(namaFile) {
			return this.url + "assets/img/group/" + namaFile;
		},

		refresh() {
			vue.search.cariDiskusi ? vue.cari() : vue.tampilSemuaData();
		},

		route(destination) {
			return this.url + destination;
		},
	},
});
