<!-- Begin Page Content -->
<div class="container-fluid" id="diskusi">

  <div class="row">

    <div class="col-lg-12">
      <ul class="list-group list-group-flush mb-3">
        <!-- batas bawah ini yang akan di loop -->
        <li class="list-group-item list-group-item-action" v-for="group in groupDiskusi">
          <div class="row">
            <div class="col-md-8">
              <a :href="route('diskusi/forum/' + group.id_grup)" style="text-decoration: none !important;">
                <img :src="gambar(group.group_image)" class="img-thumbnail rounded-circle" height="50px" width="50px">
                <span class="text-dark font-weight-bold">{{ group.group_name }}</span>
                <br>
                <small class="text-secondary">120.20 percakapan</small>
              </a>
            </div>
            <div class="col-md-4">
              <a :href="route('diskusi/forum/' + group.id_grup)" class="text-secondary" style="text-decoration: none !important;">
                <div class="mt-4 text-success">Lihat percakapan</div>
              </a>
            </div>
          </div>
        </li>
        <li v-if="emptyResult" class="list-group-item text-center font-weight-bold h4">
          <div class="col-md-12 alert alert-secondary">No Record Found!</div>
        </li>
      </ul>

      <pagination :current_page="currentPage" :row_count_page="rowCountPage" @page-update="pageUpdate" :total_groups="totalGroups" :page_range="pageRange">
      </pagination>

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->