<!-- Begin Page Content -->
<div class="container-fluid" id="group">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">

    <transition enter-active-class="animated fadeInLeft" leave-active-class="animated fadeOutRight">
      <div class="notification is-success text-center px-5 top-middle alert alert-success" role="alert" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
    </transition>

    <div class="col-lg-8">
      <!-- Button Tambah -->
      <button class="btn btn-sm btn-primary btn-icon-split" @click="modalTambah= true" data-toggle="modal" data-target="#groupModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text text-white">Buat Group</span>
      </button>
    </div>
    <!-- Button Cari -->
    <div class="col-lg-4 justify-content-end">
      <div class="input-group">
        <input type="search" v-model="search.text" @keyup="cariGroup" class="form-control form-control-sm" id="cariGroup" name="cariGroup" placeholder="Cari group" autocomplete="off">
      </div>
    </div>

    <div class="col-lg-12 mt-2">

      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">Group</th>
            <th scope="col">Description</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="group in groups">
            <td>
              <a href="<?= base_url('menu/'); ?>" style="text-decoration: none !important;">
                <img src="<?= base_url('assets/img/icons/stiki.png') ?>" alt="" class="img-thumbnail rounded-circle" height="50px" width="50px">
                <span class="text-dark font-weight-bold">{{ group.group_name }}</span>
                <br>
                <small class="text-secondary">Dibuat oleh <span class="text-success">{{ group.name }}</span> {{ timestampConvert(group.date_created) }}</small>
              </a>
            </td>
            <td>{{ group.group_desc }}</td>
            <td>
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button class="dropdown-item bg-success" @click="modalUbah = true; pilihGroup(group)" data-toggle="modal" data-target="#groupModal"><i class="fas fa-edit"></i> Ubah</button>
                  <button class="dropdown-item bg-danger" @click="modalHapus = true; pilihGroup(group)" data-toggle="modal" data-target="#groupModal"><i class="fas fa-trash"></i> Hapus</button>
                </div>
              </div>
            </td>
          </tr>
          <tr v-if="emptyResult">
            <td colspan="9" rowspan="4" class="text-center h1 alert alert-danger">No Record Found</td>
          </tr>
        </tbody>
      </table>

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