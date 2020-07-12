<!-- contents -->
<div class="main_content">


    <div class="main_content_inner p-sm-0 ml-sm-4">

        <h1> Create New Group </h1>

        <div class="uk-position-relative" uk-grid>
            <div class="uk-width-1-4@m uk-flex-last@m pl-sm-0">

                <nav class="responsive-tab style-3 setting-menu" uk-sticky="top:30 ; offset:100; media:@m ;bottom:true; animation: uk-animation-slide-top">
                    <ul>
                        <li><a href="#"> <i class="uil-scenery"></i> Avatar & Cover </a></li>
                        <li><a href="#"> <i class="uil-trash-alt"></i> Delete Group </a></li>
                    </ul>
                </nav>

            </div>

            <div class="uk-width-2-3@m mt-sm-3 pl-sm-0 p-sm-4">

                <div class="uk-card-default rounded">
                    <div class="p-3">
                        <h5 class="mb-0"> Group Info </h5>
                    </div>
                    <hr class="m-0">
                    <form class="uk-child-width-1-2@s uk-grid-small p-4" uk-grid>
                        <div>
                            <h5 class="uk-text-bold mb-2"> First Name </h5>
                            <input type="text" class="uk-input" placeholder="First Name">
                        </div>
                        <div>
                            <h5 class="uk-text-bold mb-2"> Second Name </h5>
                            <input type="text" class="uk-input" placeholder="Second Name">
                        </div>
                        <div>
                            <h5 class="uk-text-bold mb-2"> Major </h5>
                            <select class="uk-select">
                                <option> Informatics </option>
                                <option> Information System </option>
                                <option> Informatic Management </option>
                                <option> Visual Communication Design </option>
                                <option> Other </option>
                            </select>
                        </div>
                        <div>
                            <h5 class="uk-text-bold mb-2"> Group Description </h5>
                            <input type="text" class="uk-input" placeholder="Group Description">
                        </div>
                        <div>
                            <h5 class="uk-text-bold mb-2"> Photo Profile </h5>
                            <!-- ini aku kurang tau ya mas, input type image. Mungkin fungsinya untuk upload foto aja -->
                            <input type="image" class="uk-input">
                        </div>
                        <div>
                            <h5 class="uk-text-bold mb-2"> Cover </h5>
                            <input type="image" class="uk-input">
                        </div>
                    </form>

                    <div class="uk-flex uk-flex-right p-4">
                        <button class="button soft-primary mr-2"> Cancel </button>
                        <button class="button primary"> Create Group </button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>