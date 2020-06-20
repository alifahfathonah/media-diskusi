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
		rowCountPage: 8,
		totalGroups: 0,
		pageRange: 2,
	},

	created() {
		// this.tampilSemuaData();
	},

	methods: {
		tampilSemuaData() {
			axios.get(this.url + "diskusi/tampilSemuaData").then((response) => {
				if (response.data.groupDiskusi == null) {
					vue.noResult();
				} else {
					vue.getData(response.data.groupDiskusi);
					vue.userData = response.data.userData;
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
			var formData = new FormData();
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
	},
});
