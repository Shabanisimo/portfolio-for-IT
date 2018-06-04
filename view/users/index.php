<?php include ROOT.'/view/layouts/header.php';?>
    <main class="user-profile">
        <section class="user-profile__info">
            <div class="user-profile__photo-block">
                <img src="" class="user-profile__photo">
            </div>
            <div class="user-profile__info_data">
                <h2 class="user-profile__info_data-name"> <?php echo $userItem['name'],' ',$userItem['surname']; ?> </h2>
                <?php if ($userItem['telephone'] != '') :?>
                    <p>Mobile number:   <?php echo $userItem['telephone']; ?> </p>
                <?php endif; ?>
                <p>E-mail: <a href=""> <?php echo $userItem['email']; ?> </a></p>
                <p>About: <?php echo $userItem['about']; ?></p>
            </div>
        </section>
        <hr class="uk-divider-icon">
        <?php if($userAccount == true) :?>
            <?php echo '<button class="add-project_btn uk-button uk-button-primary uk-text-right uk-margin-top" href="#modal-overflow" uk-toggle>Add project</button>'; ?>
        <?php endif; ?>
        <section class="user-profile__portfolio uk-margin-top">
            <div uk-slider>
                <div class="uk-position-relative">
                    <div class="uk-slider-container uk-light">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-4@m">
                            <?php foreach ($userProjectList as $userProjectItem):?>
                                <li class="user-profile__project uk-card-default uk-margin-left">
                                    <div class="project-photo uk-card-media-top uk-inline-clip uk-transition-toggle" tabindex="0">
                                        <img src="../upload/images/<?php echo $userProjectItem['Image']; ?>">
                                    </div>
                                    <div class="project-info uk-card-body">
                                        <a class="uk-card-title" href="/projects/<?php echo $userProjectItem['Id']; ?>"><?php echo $userProjectItem['Title'];?></a>
                                        <p>Language: <?php echo $userProjectItem['Language'];?></p>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="uk-hidden@s uk-light">
                        <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                    <div class="uk-visible@s">
                        <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right-out  uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
            </div>
        </section>
    </main> 
    <div class="modal"  id="modal-overflow" uk-modal>
        <div class="modal-guts uk-modal-dialog">
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Add prject</h2>
            </div>
            <form action="" class="add-poject__block uk-modal-body" uk-overflow-auto method="POST" enctype="multipart/form-data">
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-name">Project name</label>
                    <input type="text" class="uk-input" id="project_name" name="project_name">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-lang">Project lenguage</label>
                    <input type="text" class="uk-input" id="project_lang" name="project_lang">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Description</label>
                    <textarea name="description" class="uk-input" id="description"></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="link">Link</label>
                    <input type="text" class="uk-input" id="proj_link" name="proj_link">
                </div>
                <div class="uk-margin js-upload uk-width-1-1" uk-form-custom>
                    <div class="js-upload uk-placeholder uk-text-center">
                        <span uk-icon="icon: cloud-upload"></span>
                        <span class="uk-text-middle">Load photo for project</span>
                        <div uk-form-custom>
                            <input type="file" name="image">
                            <span class="uk-link">selecting one</span>
                        </div>
                    </div>
                    <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                    <button class="uk-button uk-button-primary" type="submit" name="addProject">Save</button>                    
                </div>    
            </form>    
        </div>
    </div> 
<script>

    var bar = document.getElementById('js-progressbar');

    UIkit.upload('.js-upload', {

        url: '',
        multiple: true,

        beforeSend: function () {
            console.log('beforeSend', arguments);
        },
        beforeAll: function () {
            console.log('beforeAll', arguments);
        },
        load: function () {
            console.log('load', arguments);
        },
        error: function () {
            console.log('error', arguments);
        },
        complete: function () {
            console.log('complete', arguments);
        },

        loadStart: function (e) {
            console.log('loadStart', arguments);

            bar.removeAttribute('hidden');
            bar.max = e.total;
            bar.value = e.loaded;
        },

        progress: function (e) {
            console.log('progress', arguments);

            bar.max = e.total;
            bar.value = e.loaded;
        },

        loadEnd: function (e) {
            console.log('loadEnd', arguments);

            bar.max = e.total;
            bar.value = e.loaded;
        },

        completeAll: function () {
            console.log('completeAll', arguments);

            setTimeout(function () {
                bar.setAttribute('hidden', 'hidden');
            }, 1000);

            alert('Upload Completed');
        }

    });

</script>
<?php include ROOT.'/view/layouts/footer.php'; ?>