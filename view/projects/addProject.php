<?php include ROOT.'\view\layouts\header.php';?>
<div class="uk-padding">
            <div class="">
                <h2 class="uk-modal-title">Add project</h2>
            </div>
            <form action="" class="add-poject__block" uk-overflow-auto method="POST" enctype="multipart/form-data">
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
                <div class="uk-text-right">
                    <button class="uk-button uk-button-primary" type="submit" name="addProject">Save</button>                    
                </div>    
            </form>
</div>
<?php include ROOT.'\view\layouts\footer.php';?>