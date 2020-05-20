/**  ======= PENGINGAT =======
 * jika ingin melakukan import & export pada browser maka gunakan
 * type="module" pada tag script pada file html
 * catatan : lakukan itu pada semua file yang memiliki syntax import & export.
 */
import Config from "./config.js";

Vue.component("modal", {
	//modal
	template: `
	<!-- Modal -->
	<transition enter-active-class="animated rollIn" leave-active-class="animated rollOut">
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="groupModalLabel" aria-hidden="true" id="groupModal">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-dark text-white">
				<slot name="head"></slot>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit('close')">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<slot name="body"></slot>
				</div>
				<div class="modal-footer bg-dark text-white">
				<slot name="foot"></slot>
				</div>
			</div>
		</div>
	</div>
</transition>
`,
});

var vue = new Vue({
	el: "#group",
	data: {
		url: Config, // config merupakan variabel berisi base url dari file config.js
		modalTambah: false,
		modalUbah: false,
		modalHapus: false,
		groups: [],
		search: { text: "" },
		emptyResult: false,
		groupBaru: {
			group_name: "",
			group_desc: "",
			group_image: "",
		},
		avatar: null,
		selectedFile: null,
		groupData: {},
		formValidate: [],
		successMSG: "",

		// pagination
		currentPage: 0,
		rowCountPage: 5,
		totalGroups: 0,
		pageRange: 2,
	},
	created() {
		this.tampilSemuaGroup();
	},
	methods: {
		tampilSemuaGroup() {
			axios.get(this.url + "group/tampilSemuaGroup").then(function (response) {
				if (response.data.groups == null) {
					vue.noResult();
				} else {
					vue.getData(response.data.groups);
				}
			});
		},

		tambahGroup() {
			var formData = vue.formData(vue.groupBaru);
			axios
				.post(this.url + "group/tambahGroup", formData)
				.then(function (response) {
					if (response.data.error) {
						vue.formValidate = response.data.msg;
					} else {
						vue.successMSG = response.data.msg;
						vue.clearAll();
						vue.clearMSG();
						vue.hideModal();
					}
				});
		},

		ubahGroup() {
			var formData = vue.formData(vue.groupData);
			axios
				.post(this.url + "group/ubahGroup", formData)
				.then(function (response) {
					if (response.data.error) {
						vue.formValidate = response.data.msg;
					} else {
						vue.successMSG = response.data.success;
						vue.clearAll();
						vue.clearMSG();
						vue.hideModal();
					}
				});
		},

		cariGroup() {
			var formData = vue.formData(vue.search);
			axios
				.post(this.url + "group/cariGroup", formData)
				.then(function (response) {
					if (response.data.groups == null) {
						vue.noResult();
					} else {
						vue.getData(response.data.groups);
					}
				});
		},

		timestampConvert(timestamp) {
			let date = new Date(timestamp * 1000);
			let tahun = date.getFullYear();
			let bulan = date.getMonth();
			let tanggal = date.getDate();
			return moment([tahun, bulan, tanggal]).fromNow();
		},

		hapusGroup() {
			var formData = vue.formData(vue.groupData);
			axios
				.post(this.url + "group/hapusGroup", formData)
				.then(function (response) {
					if (!response.data.error) {
						vue.successMSG = response.data.success;
						vue.clearAll();
						vue.clearMSG();
						vue.hideModal();
					}
				});
		},

		gambarGroup(namaFile) {
			return this.url + "assets/img/group/" + namaFile;
		},

		previewFile(e) {
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

		getData(groups) {
			vue.emptyResult = false;
			vue.totalGroups = groups.length;
			vue.groups = groups.slice(
				vue.currentPage * vue.rowCountPage,
				vue.currentPage * vue.rowCountPage + vue.rowCountPage
			); // slice the result for pagination

			// if the record is empty, go back a page
			if (vue.groups.length == 0 && vue.currentPage > 0) {
				vue.pageUpdate(vue.currentPage - 1);
				vue.clearAll();
			}
		},

		pageUpdate(pageNumber) {
			vue.currentPage = pageNumber;
			vue.refresh();
		},

		clearAll() {
			vue.groupBaru = {
				group_name: "",
				group_desc: "",
			};
			vue.formValidate = false;
			vue.modalTambah = false;
			vue.modalUbah = false;
			vue.modalHapus = false;
			vue.avatar = null;
			vue.selectedFile = null;
			vue.refresh();
		},

		pilihGroup(group) {
			vue.groupData = group;
		},

		clearMSG() {
			setTimeout(function () {
				vue.successMSG = "";
			}, 3000);
		},

		noResult() {
			vue.emptyResult = true;
			vue.groups = null;
			vue.totalGroups = 0;
		},

		hideModal() {
			if (!vue.modalUbah) {
				$("#groupModal").modal("hide");
			}
			if (!vue.modalHapus) {
				$("#groupModal").modal("hide");
			}
			if (!vue.modalTambah) {
				$("#groupModal").modal("hide");
			}
		},

		refresh() {
			vue.search.text ? vue.cariGroup() : vue.tampilSemuaGroup();
		},
	},
});
