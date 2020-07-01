<!-- modal tambah group -->
<modal v-if="modalTambah" @close="clearAll()">

  <h3 slot="head">Tambah Group</h3>

  <div slot="body" class="row">
    <div class="col-md-8">
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
    <div class="col-md-4">
      <div class="form-group">
        <label for="image">Icon Group</label>
        <div style="height: 230px; width: 200px;" class="border rounded" @click="$refs.image.click()">
          <label for="image" class="justify-content-center" @clik="">
            <input type="file" ref="image" @change="previewImage" name="group_image" style="display:none" id="image">
            <img :src="avatar" height="300px" width="200px" class="img-thumbnail">
          </label>
        </div>
      </div>
    </div>
  </div>
  <div slot="foot">
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" @click="clearAll()">Close</button>
    <button class="btn btn-sm btn-light" @click="tambahGroup"><i class="fas fa-download"></i> Buat</button>
  </div>

</modal>

<!-- modal ubah group -->
<modal v-if="modalUbah" @close="clearAll()">

  <h3 slot="head">Ubah Group</h3>

  <div slot="body" class="row">
    <div class="col-md-8">
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
    <div class="col-md-4">
      <div class="form-group">
        <label for="image">Icon Group</label>
        <div style="height: 230px; width: 200px;" class="border rounded" @click="$refs.image.click()">
          <label for="image" class="justify-content-center" @click="">
            <input type="file" ref="image" @change="previewImage" name="group_image" style="display:none" id="image">
            <img :src="avatar" height="300px" width="200px" class="img-thumbnail">
          </label>
        </div>
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
  <div slot="body" class="text-center h4">Apakah anda yakin? Data ini akan dihapus!</div>
  <div slot="foot">
    <button class="btn btn-danger" data-dismiss="modal" @click="modalHapus= false">Cancel</button>
    <button class="btn btn-light" @click="modalHapus = false; hapusGroup()">Delete</button>
  </div>
</modal>

<!-- modal verifikasi -->
<modal v-if="modalVerifikasi" @click="clearAll()">
  <h3 slot="head">Verifikasi</h3>
  <div slot="body">
    <div v-for="user in users">
      <ul class="list-group" v-for="u in user">
        <li class="list-group-item list-group-item-action my-1">
          {{ u.name }}
          <button class="btn btn-success btn-sm float-right ml-3" @click="terima(u.user_id, u.grup_id)">Terima</button>
          <button class="btn btn-secondary btn-sm float-right" @click="tolak(u.user_id, u.grup_id)">Tolak</button>
        </li>
      </ul>
    </div>
    <div v-if="emptyVerifikasi">
      <h4 class="text-center">Tidak ada user baru!</h4>
    </div>
  </div>
  <div slot="foot">
    <button class="btn btn-danger" data-dismiss="modal" @click="modalVerifikasi = false">Bata</button>
  </div>
</modal>