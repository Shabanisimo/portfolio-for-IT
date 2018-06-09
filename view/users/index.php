<?php include ROOT.'/view/layouts/header.php';?>
    <main class="user-profile">
        <section class="user-profile__info">
            <div class="user-profile__photo-block">
            <?php if ($userItem['image']): ?>
                <img src="../upload/images/<?php echo $userItem['image']; ?>" class="user-profile__photo">
            <?php else: ?>
                <img src="../upload/images/avatar_img.png" class="user-profile__photo">
            <?php endif; ?>
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
            <?php echo '<a class="add-project_btn uk-button uk-button-primary uk-text-right uk-margin-top" href="">Add project</a>'; ?>
        <?php endif; ?>
        <section class="user-profile__portfolio uk-margin-top">
            <div uk-slider>
                <div class="uk-position-relative">
                    <div class="uk-slider-container uk-light">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-4@m">
                            <?php foreach ($userProjectList as $userProjectItem):?>
                                <li class="user-profile__project uk-card-default uk-margin-left">
                                    <div class="project-photo uk-card-media-top uk-inline-clip uk-transition-toggle" tabindex="0">
                                        <img src="../upload/projects/<?php echo $userProjectItem['Image']; ?>">
                                    </div>
                                    <div class="project-info uk-card-body">
                                        <a class="uk-card-title project-title" data-id="<?php echo $userProjectItem['Id']; ?>" href="/projects/<?php echo $userProjectItem['Id']; ?>"><?php echo $userProjectItem['Title'];?></a>
                                        <p>Language: <?php echo $userProjectItem['Language'];?></p>
                                    </div>
                                    <?php if(!User::isGuest()) :?>
                                        <div class="uk-card-footer likes project-card__footer" >
                                            <button class="like uk-button <?php if(Project::checkLike($userProjectItem['Id'], $_SESSION['user']) == true) echo "active_h";?>" data-id="<?php echo $userProjectItem['Id']; ?>">
                                                <span class="likes-count"><a uk-icon="heart"></a><?php echo $userProjectItem['Likes']; ?></span>
                                            </button>
                                            <span><span uk-icon="comments" class="comment-icon"></span><span><?php echo Project::commentsCount($userProjectItem['Id']); ?></span></span>
                                        </div>
                                    <?php else :?>
                                        <div class="uk-card-footer likes project-card__footer" >
                                            <span><span uk-icon="heart" class="heart-icon"></span><?php echo $userProjectItem['Likes']; ?></span>
                                            <span><span uk-icon="comments" class="comment-icon"></span><span><?php echo Project::commentsCount($userProjectItem['Id']); ?></span></span>
                                        </div>
                                    <?php endif; ?>
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
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin project-list_dotnav"></ul>
            </div>
        </section>
    </main> 
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