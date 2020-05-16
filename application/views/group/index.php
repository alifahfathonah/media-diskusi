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
        <span class="text text-white">Tambah Group</span>
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
          <tr class="bg-dark text-white">
            <th scope="col">#</th>
            <th scope="col">Group</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="group in groups">
            <th scope="row">{{ group.id }}</th>
            <td>{{ group.group_name }}</td>
            <td>{{ group.group_desc }}</td>
            <td>
              <button class="btn btn-success btn-sm" @click="modalUbah = true; pilihGroup(group)" data-toggle="modal" data-target="#groupModal"><i class="fas fa-edit"></i></button>
              <button class="btn btn-danger btn-sm" @click="modalHapus = true; pilihGroup(group)" data-toggle="modal" data-target="#groupModal"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
          <tr v-if="emptyResult">
            <td colspan="9" rowspan="4" class="text-center h1">No Record Found</td>
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