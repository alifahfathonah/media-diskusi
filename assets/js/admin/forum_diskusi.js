import config from "./config.js";

var vue = new Vue({
	el: "#forum_diskusi",
	data: {
		url: config,
		forumDiskusi: [],
		search: { cariForumDiskusi: "" },
		emptyResult: false,

		// pagination
		currentPage: 0,
		rowCountPage: 5,
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
					console.log(response.data.forum);
				} else {
					vue.getData(response.data.forum);
				}
			});
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
