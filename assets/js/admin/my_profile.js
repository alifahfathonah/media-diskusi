import config from "./config.js";

var vue = new Vue({
	el: "#my_profile",
	data: {
		url: config,
		user: [],
		emptyResult: false,
	},
	created() {
		this.getUser();
	},
	methods: {
		getUser() {
			axios.get(this.url + "user/getUser").then((response) => {
				if (response.data.status) {
					vue.emptyResult = false;
					vue.user = response.data.user;
				} else {
					vue.emptyResult = true;
					vue.user = null;
				}
			});
		},

		gambarUser(namaFile) {
			return this.url + "assets/img/profile/" + namaFile;
		},

		route(destination) {
			return this.url + destination;
		},
	},
});
