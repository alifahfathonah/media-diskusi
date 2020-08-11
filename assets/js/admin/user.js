import config from "./config.js";

var vue = new Vue({
	el: "#user",
	data: {
		url: config,
		post: [],
		comment: [],
		emptyResult: false,
		emptyResultComment: false,
	},

	created() {
		this.getMyPost();
	},

	methods: {
		getMyPost() {
			axios.get(this.url + "user/getMyPost").then((response) => {
				if (response.data.status) {
					vue.post = response.data.post;
					vue.comment = response.data.comment;
					vue.emptyResult = false;
					vue.emptyResultComment = false;
				} else {
					vue.emptyResult = true;
					vue.post = null;
					vue.comment = null;
					vue.emptyResult = true;
				}
			});
		},

		gambarUser(fileNeme) {
			return this.url + "assets/img/profile/" + fileNeme;
		},

		gambarForum(fileNeme) {
			return this.url + "assets/img/forum_diskusi/" + fileNeme;
		},
	},
});
