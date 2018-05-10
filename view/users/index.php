<?php include ROOT.'/view/layouts/header.php'; ?>
    <main class="user-profile">
        <section class="user-profile__info">
            <div class="user-profile__info_photo">
                <img src="/template/img/Mkcu9Q1GHsQ.jpg">
            </div>
            <div class="user-profile__info_data">
                <h2 class="user-profile__info_data-name"> <?php echo $userItem['name'],' ',$userItem['surname']; ?> </h2>
                <p>Mobile number:   <?php echo $userItem['telephone']; ?> </p>
                <p>E-mail: <a href=""> <?php echo $userItem['email']; ?> </a></p>
                <p>About: <?php echo $userItem['about']; ?></p>
            </div>
        </section>
        <button class="add-project_btn uk-button uk-button-primary uk-text-right uk-margin-top" href="#modal-overflow" uk-toggle>Add project</button>
        <section class="user-profile__portfolio">
        <?php foreach ($userProjectList as $userProjectItem):?>
            <div class="user-profile__project uk-card-default">
                <div class="project-photo uk-card-media-top uk-inline-clip uk-transition-toggle" tabindex="0">
                    <img src="/template/img/115-preview.png">
                </div>
                <div class="project-info uk-card-body">
                    <a class="uk-card-title" href="/projects/<?php echo $userProjectItem['id']; ?>"><?php echo $userProjectItem['Title'];?></a>
                    <p>Language: <?php echo $userProjectItem['Language'];?></p>
                </div>
            </div>
        <?php endforeach;?>
        </section>
    </main> 
    <div class="modal"  id="modal-overflow" uk-modal>
        <div class="modal-guts uk-modal-dialog">
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Add prject</h2>
            </div>
            <form class="add-poject__block uk-modal-body" uk-overflow-auto>
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-name">Project name</label>
                    <input type="text" class="uk-input" id="input_proj-name" name="project_name">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-lang">Project lenguage</label>
                    <input type="text" class="uk-input" id="input_proj-lang" name="project_lang">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_load-file">File</label>
                    <input type="file" id="input_load-file">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Description</label>
                    <textarea name="description" class="uk-input" id="textarea_description"></textarea>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                    <button class="uk-button uk-button-primary" type="button">Save</button>                    
                </div>    
            </form>    
        </div>
    </div> 
<?php include ROOT.'/view/layouts/footer.php'; ?>