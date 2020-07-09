<!-- contents -->
<div class="main_content" id="verifikasi">

  <div class="main_content_inner">
    <h2 class="mt-lg-5"> Requested Join </h2>

    <div class="uk-child-width-1-3@m" uk-grid>

      <div v-for="verifikasi in usersVerifikasi">
        <div class="friend-card" v-for="v in verifikasi">
          <div class="uk-width-auto">
            <img :src="gambarUser(v.image)" alt="">
            <span class="online-dot"></span>
          </div>
          <div class="uk-width-expand">
            <h3> {{v.name}} </h3>
            <div class="friend-card-btns">
              <button class="button primary small mr-3" @click="accept(v.user_id, v.grup_id)"> Accept </button>
              <button class="button secondary small" @click="remove(v.user_id, v.grup_id)"> Remove </button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="col-lg-12" v-if="emptyResult">
      <div class="alert alert-danger text-center font-weight-bold">Tidak ada user baru!</div>
    </div>

    <div class="uk-flex uk-flex-center my-4">
      <a href="#" class="button secondary small px-11 circle"> View More </a>
    </div>
  </div>