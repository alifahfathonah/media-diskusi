<!-- Begin Page Content -->
<div class="container-fluid" id="group">

  <div class="row">

    <transition enter-active-class="animated fadeInLeft" leave-active-class="animated fadeOutRight">
      <div class="notification is-success text-center px-5 top-middle alert alert-success" role="alert" v-if="successMSG" @click="successMSG = false">Data group berhasil {{successMSG}}</div>
    </transition>

    <div v-if="successMSG" @click="successMSG = false">{{ sweetalertMSG() }}</div>

    <div class="col-lg-8">
      <!-- button tambah -->
      <button class="btn btn-sm btn-dark btn-icon-split" @click="modalTambah= true" data-toggle="modal" data-target="#groupModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text text-white">Buat Group</span>
      </button>
    </div>

    <div class="col-lg-4 justify-content-end">
      <!-- input cari -->
      <div class="input-group">
        <input type="search" v-model="search.text" @keyup="cariGroup" class="form-control form-control-sm" id="cariGroup" name="cariGroup" placeholder="Cari group" autocomplete="off">
      </div>
    </div>

    <div class="col-lg-12 mt-2">

      <!-- batas list -->
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item">
          <div class="row text-dark font-weight-bold">
            <div class="col-md-4">Group</div>
            <div class="col-md-4">Description</div>
            <div class="col-md-2">Jumlah Peserta</div>
            <div class="col-md-2">Manage</div>
          </div>
        </li>
        <!-- batas bawah ini yang akan di loop -->
        <li class="list-group-item list-group-item-action" v-for="group in groups">
          <div class="row">
            <div class="col-md-4">
              <a :href="route('group/profilegroup')" style="text-decoration: none !important;">
                <img :src="gambarGroup(group.group_image)" class="img-thumbnail rounded-circle" height="50px" width="50px">
                <span class="text-dark font-weight-bold">{{ group.group_name }}</span>
                <br>
                <small class="text-secondary">Dibuat oleh <span class="text-success">{{ group.name }}</span> {{ timestampConvert(group.date_created) }}</small>
              </a>
            </div>
            <div class="col-md-4">
              <a :href="route('diskusi')" class="text-secondary" style="text-decoration: none !important;">
                <div class="text-dark">{{ group.group_desc }}</div>
              </a>
            </div>
            <div class="col-md-2">
              <div class="text-dark">{{ group.jumlah_peserta }} <i class="fas fa-users text-warning"></i></div>
            </div>
            <div class="col-md-2">
              <div class="dropdown mt-3">
                <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button class="dropdown-item bg-success" @click="modalUbah = true; pilihGroup(group)" data-toggle="modal" data-target="#groupModal"><i class="fas fa-edit"></i> Ubah</button>
                  <a href="" class="dropdown-item bg-light"><i class="fas fa-universal-access"></i> Verifikasi</a>
                  <button class="dropdown-item bg-danger" @click="modalHapus = true; pilihGroup(group)" data-toggle="modal" data-target="#groupModal"><i class="fas fa-trash"></i> Hapus</button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li v-if="emptyResult" class="list-group-item text-center font-weight-bold h4">
          <div class="col-md-12 alert alert-secondary">No Record Found!</div>
        </li>
      </ul>
      <!-- batas akhir list -->

      <pagination :current_page="currentPage" :row_count_page="rowCountPage" @page-update="pageUpdate" :total_groups="totalGroups" :page_range="pageRange">
      </pagination>

    </div>
  </div>

  <!-- Modal Group -->
  <?php require 'modal.php'; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->