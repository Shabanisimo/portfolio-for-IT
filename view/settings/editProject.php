<?php include ROOT.'\view\layouts\header.php';?>
    <main class="settings-container">
        <section class="settings-block">
        <form action="" class="edit-poject__block" method="POST" enctype="multipart/form-data">
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-name">Project name</label>
                    <input type="text" class="uk-input" id="project_name" name="project_name" value="<?php echo $projectItem['Title'] ?>">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-lang">Project lenguage</label>
                    <input type="text" class="uk-input" id="project_lang" name="project_lang" value="<?php echo $projectItem['Language'] ?>">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Description</label>
                    <textarea name="description" class="uk-input" id="description" ><?php echo $projectItem['About']; ?></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="link">Link</label>
                    <input type="text" class="uk-input" id="proj_link" name="proj_link" value="<?php echo $projectItem['Link'] ?>">
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
                <div class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                    <button class="uk-button uk-button-primary" type="submit" name="editProject">Save</button>                    
                </div>    
            </form> 
        </section>
    </main>
    <script src="lib/jquery-3.3.1.min.js"></script>
    <script src="script/index.js"></script>
<?php include ROOT.'\view\layouts\footer.php';?>