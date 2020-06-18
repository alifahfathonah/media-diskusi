<!-- Begin Page Content -->
<div class="container-fluid" id="group_diskusi">

  <div class="row justify-content-end">
    <div class="col-md-4">
      <div class="input-group">
        <input type="search" v-model="search.cariGroupDiskusi" @keyup="cariGroupDiskusi" class="form-control form-control-sm" id="cariGroupDiskusi" name="cariGroupDiskusi" placeholder="Cari group" autocomplete="off">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="rounded bg-white ml-3 mb-3 mr-3 mx-auto" style="width: 18rem;" v-for="group in groupDiskusi">
      <img :src="gambar(group.group_image)" class="card-img-top" style="width: 18rem; height: 14rem;">
      <div class="card-body">
        <i class="fas fa-users"></i> Group
        <h6 class="card-title text-dark">{{ group.group_name }}</h6>
        <i class="fas fa-info-circle"></i> Deskripsi
        <p class="card-text text-dark"><small>{{ group.group_desc }}</small></p>
        <i class="fas fa-user-edit"></i> Dibuat oleh
        <p class="card-text"><small class="text-muted">Admin 3 mins ago</small></p>
        <button class="btn btn-danger btn-sm float-left mb-3" @click="keluarGroup(userData.id, group.id_grup)">Keluar <i class="fas fa-times"></i></button>
        <button class="btn btn-dark btn-sm float-right mb-3" @click="gabungGroup(userData.id, group.id_grup)">Gabung <i class="fas fa-hands-helping"></i></button>
      </div>
    </div>
    <div v-if="emptyResult" class="col-md-12">
      <div class="alert alert-secondary text-center">No Record Found!</div>
    </div>
  </div>

  <pagination :current_page="currentPage" :row_count_page="rowCountPage" @page-update="pageUpdate" :total_groups="totalGroups" :page_range="pageRange">
  </pagination>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->