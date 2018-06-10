<?php include ROOT.'\view\layouts\header.php';?>
<div class="uk-padding">
            <div class="">
                <h2 class="uk-modal-title">Add vacancy</h2>
            </div>
            <form action="" class="add-poject__block addVacancy-block" uk-overflow-auto method="POST" enctype="multipart/form-data">
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-name">Должность</label>
                    <input type="text" class="uk-input  uk-margin-small-top" id="position" name="position">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Требуемый опыт работы</label>
                    <textarea name="experience" class="uk-input  uk-margin-small-top" id="experience"></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-lang">Описание должности</label>
                    <textarea type="text" class="uk-input  uk-margin-small-top" id="about" name="about"></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Обязанности</label>
                    <textarea name="duty" class="uk-input  uk-margin-small-top" id="duty"></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Требования</label>
                    <textarea name="demands" class="uk-input  uk-margin-small-top" id="demands"></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Условия</label>
                    <textarea name="conditions" class="uk-input  uk-margin-small-top" id="conditions"></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Адрес</label>
                    <input name="address" class="uk-input  uk-margin-small-top" id="address">
                </div>
                <div class="uk-margin uk-flex">
                    <div class="uk-margin-right">
                        <label class="uk-form-label" for="input_proj-name">Минимальная з/п</label>
                        <input type="text" class="uk-input  uk-margin-small-top" id="min" name="min">
                    </div>
                    <div>
                        <label class="uk-form-label" for="input_proj-name">Максимальная з/п</label>
                        <input type="text" class="uk-input  uk-margin-small-top" id="max" name="max">
                    </div>
                </div>
                <div class="uk-text-right">
                    <button class="uk-button uk-button-primary addVacancy" type="submit">Save</button>                    
                </div>    
            </form>
</div>
<?php include ROOT.'\view\layouts\footer.php';?>    