<!-- modal tambah group -->
<modal v-if="modalTambah" @close="clearAll()">

  <h3 slot="head">Tambah Group</h3>

  <div slot="body" class="row">
    <div class="col-md">
      <div class="form-group">
        <label>Nama Group</label>
        <input type="text" class="form-control" :class="{'is-invalid': formValidate.group_name}" name="group_name" v-model="groupBaru.group_name">

        <div class="has-text-danger text-danger" v-html="formValidate.group_name"> </div>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea cols="35" rows="5" :class="{'is-invalid': formValidate.group_desc}" name="group_desc" v-model="groupBaru.group_desc" class="form-control"></textarea>
        <div class="has-text-danger text-danger" v-html="formValidate.group_desc"> </div>
      </div>
    </div>
  </div>
  <div slot="foot">
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" @click="clearAll()">Close</button>
    <button class="btn btn-sm btn-light" @click="tambahGroup"><i class="fas fa-download"></i> Tambah</button>
  </div>

</modal>

<!-- modal ubah group -->
<modal v-if="modalUbah" @close="clearAll()">

  <h3 slot="head">Ubah Group</h3>

  <div slot="body" class="row">
    <div class="col-md">
      <div class="form-group">
        <label>Nama Group</label>
        <input type="text" class="form-control" :class="{'is-invalid': formValidate.group_name}" name="group_name" v-model="groupData.group_name">

        <div class="has-text-danger text-danger" v-html="formValidate.group_name"> </div>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea cols="35" rows="5" :class="{'is-invalid': formValidate.group_desc}" name="group_desc" v-model="groupData.group_desc" class="form-control"></textarea>
        <div class="has-text-danger text-danger" v-html="formValidate.group_desc"> </div>
      </div>
    </div>
  </div>
  <div slot="foot">
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" @click="clearAll()">Close</button>
    <button class="btn btn-sm btn-light" @click="ubahGroup"><i class="fas fa-download"></i> Ubah</button>
  </div>

</modal>

<!-- modal hapus group -->
<modal v-if="modalHapus" @close="clearAll()">
  <h3 slot="head">Hapus</h3>
  <div slot="body" class="text-center">Apakah anda yakin? Data ini akan dihapus!</div>
  <div slot="foot">
    <button class="btn btn-danger" @click="modalHapus = false">Cancel</button>
    <button class="btn btn-light" @click="modalHapus = false; hapusGroup()">Delete</button>
  </div>
</modal>