/**  ======= PENGINGAT =======
 * jika ingin melakukan import & export pada browser maka gunakan
 * type="module" pada tag script pada file html
 * catatan : lakukan itu pada semua file yang memiliki syntax import & export.
 */

import Config from "./config.js";

var vue = new Vue({
	el: "#diskusi",
	data: {
		url: Config,
		groupDiskusi: [],
		search: { cariGroupDiskusi: "" },
		emptyResult: false,

		// pagination
		currentPage: 0,
		rowCountPage: 8,
		totalGroups: 0,
		pageRange: 2,
	},
	created() {
		this.tampilSemuaGroup();
	},
	methods: {
		tampilSemuaGroup() {
			axios.get(this.url + "diskusi/tampilSemuaGroup").then((response) => {
				if (response.data.groupDiskusi == null) {
					vue.noResult();
				} else {
					vue.getData(response.data.groupDiskusi);
				}
			});
		},

		cariGroupDiskusi() {
			var formData = vue.formData(vue.search);
			axios.post(this.url + "diskusi/cariGroup", formData).then((response) => {
				if (response.data.groupDiskusi == null) {
					vue.noResult();
				} else {
					vue.getData(response.data.groupDiskusi);
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
			vue.search.text ? vue.cariGroup() : vue.tampilSemuaGroup();
		},
	},
});
