<?php include ROOT.'/view/layouts/header.php'; ?>
    <main class="user-profile">
        <section class="user-profile__info">
            <div class="user-profile__info_photo">
                <img src="">
            </div>
            <div class="user-profile__info_data">
                <h2 class="user-profile__info_data-name"> <?php echo $userItem['name'],' ',$userItem['surname']; ?> </h2>
                <p>Mobile number:   <?php echo $userItem['telephone']; ?> </p>
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
                                        <img src="/template/img/115-preview.png">
                                    </div>
                                    <div class="project-info uk-card-body">
                                        <a class="uk-card-title" href="/projects/<?php echo $userProjectItem['id']; ?>"><?php echo $userProjectItem['Title'];?></a>
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
    <?php include ROOT.'/view/layouts/footer.php'; ?>