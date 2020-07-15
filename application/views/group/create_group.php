<!-- contents -->
<div class="main_content" id="create_group">


	<div class="main_content_inner">

		<h1> Create New Group </h1>

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

					<form action="<?= base_url('group/createGroup'); ?>" method="POST" enctype="multipart/form-data" class="uk-child-width-1-2@s uk-grid-small p-4" uk-grid>

						<div>
							<h5 class="uk-text-bold mb-2"> Group Name </h5>
							<input type="text" name="group_name" id="group_name" class="uk-input" placeholder="Group Name" value="<?= set_value('group_name'); ?>">
							<small class="text-danger"><?= form_error('group_name'); ?></small>
						</div>
						<div>
							<h5 class="uk-text-bold mb-2"> Category </h5>
							<select class="uk-select" name="group_category" id="group_category">
								<option value="Networking"> Networking </option>
								<option value="Design"> Design </option>
								<option value="Programming"> Programming </option>
								<option value="Game"> Game </option>
								<option value="Music Digital"> Music Digital </option>
								<option value="Artificial Intelligence"> Artificial Intelligence </option>
								<option value="Data Science"> Data Science </option>
							</select>
						</div>
						<div>
							<h5 class="uk-text-bold mb-2"> Group Description </h5>
							<input type="text" name="group_desc" id="group_desc" class="uk-input" placeholder="Group Description" value="<?= set_value('group_desc'); ?>">
							<small class="text-danger"><?= form_error('group_desc'); ?></small>
						</div>
						<div>
							<h5 class="uk-text-bold mb-2"> Photo Profile </h5>
							<!-- ini aku kurang tau ya mas, input type image. Mungkin fungsinya untuk upload foto aja -->
							<input type="file" name="group_image" id="group_image" class="uk-input">
						</div>

						<div>
							<button type="submit" class="button soft-primary"> Create Group </button>
						</div>
						<div>
							<a href="<?= base_url('group'); ?>" class="button soft-danger float-right text-decoration-none"> Cancel </a>
						</div>

					</form>

				</div>

			</div>

		</div>

	</div>
</div>