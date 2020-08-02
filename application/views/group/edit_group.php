<!-- contents -->
<div class="main_content" id="create_group">


  <div class="main_content_inner">

    <h1> Edit Group "<?= $group[0]->group_name; ?>" </h1>

    <div class="uk-position-relative" uk-grid>

      <div class="uk-width-1-4@m uk-flex-last@m pl-sm-0 ml-5">

        <nav class="responsive-tab style-3 setting-menu" uk-sticky="top:30; offset:100; media:@m; bottom:true; animation: uk-animation-slide-top">
          <ul>
            <li><a href="#" class="text-decoration-none"> <i class="uil-scenery"></i> Avatar & Cover </a></li>
            <li><a href="#" class="text-decoration-none"> <i class="uil-trash-alt"></i> Delete Group </a></li>
          </ul>
        </nav>

      </div>

      <div class="uk-width-2-3@m pl-sm-0">

        <div class="uk-card-default rounded">
          <div class="p-3">
            <h5 class="mb-0"> Group Info </h5>
          </div>
          <hr class="m-0">

          <form action="<?= base_url('group/updateGroup/' . $group[0]->id_grup); ?>" method="POST" enctype="multipart/form-data" class="uk-child-width-1-2@s uk-grid-small p-4" uk-grid>

            <div>
              <h5 class="uk-text-bold mb-2"> Group Name </h5>
              <input type="text" name="group_name" id="group_name" class="uk-input" placeholder="Group Name" value="<?= $group[0]->group_name; ?>">
              <small class="text-danger"><?= form_error('group_name'); ?></small>
            </div>
            <div>
              <h5 class="uk-text-bold mb-2"> Category </h5>
              <select class="uk-select" name="group_category" id="group_category">
                <?php for ($i = 0; $i < sizeof($category); $i++) : ?>
                  <?php if ($category[$i] == $group[0]->group_category) : ?>
                    <option value="<?= $group[0]->group_category; ?>" selected><?= $group[0]->group_category; ?></option>
                  <?php else : ?>
                    <option value="<?= $category[$i]; ?>"><?= $category[$i]; ?></option>
                  <?php endif; ?>
                <?php endfor; ?>
              </select>
            </div>
            <div>
              <h5 class="uk-text-bold mb-2"> Group Description </h5>
              <input type="text" name="group_desc" id="group_desc" class="uk-input" placeholder="Group Description" value="<?= $group[0]->group_desc; ?>">
              <small class="text-danger"><?= form_error('group_desc'); ?></small>
            </div>
            <div>
              <h5 class="uk-text-bold mb-2"> Photo Profile </h5>
              <!-- ini aku kurang tau ya mas, input type image. Mungkin fungsinya untuk upload foto aja -->
              <input type="file" name="group_image" id="group_image" class="uk-input">
            </div>

            <div>
              <button type="submit" class="button soft-primary"> Update Group </button>
            </div>
            <div>
              <a href="<?= base_url('group/profileGroup/' . $group[0]->id_grup); ?>" class="button soft-danger float-right text-decoration-none"> Cancel </a>
            </div>

          </form>

        </div>

      </div>

    </div>

  </div>
</div>