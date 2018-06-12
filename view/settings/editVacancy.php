<?php include ROOT.'\view\layouts\header.php';?>
<div class="uk-padding">
            <div class="">
                <h2 class="uk-modal-title">Изменение вакансии</h2>
            </div>
            <form action="" class=" editVacancy-block" uk-overflow-auto method="POST" enctype="multipart/form-data" data-id="<?php echo $vacancyItem['id']; ?>">
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-name">Должность</label>
                    <input type="text" class="uk-input  uk-margin-small-top" minlength="1" required id="position" name="position" value="<?php echo $vacancyItem['Position']; ?>">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Требуемый опыт работы</label>
                    <textarea name="experience" class="uk-textarea  uk-margin-small-top" minlength="1" required id="experience"><?php echo $vacancyItem['Experience']; ?></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-lang">Описание должности</label>
                    <textarea type="text" class="uk-textarea  uk-margin-small-top" minlength="1" required id="about" name="about"><?php echo $vacancyItem['About']; ?></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Обязанности</label>
                    <textarea name="duty" class="uk-textarea  uk-margin-small-top" minlength="1" required id="duty"><?php echo $vacancyItem['Duty']; ?></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Требования</label>
                    <textarea name="demands" class="uk-textarea  uk-margin-small-top" minlength="1" required id="demands"><?php echo $vacancyItem['Demands']; ?></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Условия</label>
                    <textarea name="conditions" class="uk-textarea  uk-margin-small-top" minlength="1" required id="conditions"><?php echo $vacancyItem['Conditions']; ?></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Адрес</label>
                    <input name="address" class="uk-input  uk-margin-small-top" id="address" minlength="1" required value="<?php echo $vacancyItem['Address']; ?>">
                </div>
                <div class="uk-margin uk-flex">
                    <div class="uk-margin-right">
                        <label class="uk-form-label" for="input_proj-name">Минимальная з/п (руб.)</label>
                        <input type="text" class="uk-input  uk-margin-small-top" id="min" name="min" value="<?php echo $vacancyItem['Min']; ?>">
                    </div>
                    <div>
                        <label class="uk-form-label" for="input_proj-name">Максимальная з/п (руб.)</label>
                        <input type="text" class="uk-input  uk-margin-small-top" id="max" name="max" value="<?php echo $vacancyItem['Max']; ?>">
                    </div>
                </div>
                <div class="uk-text-right">
                    <button class="uk-button uk-button-primary editVacancy" type="submit">Изменить</button>                    
                </div>    
                <input class="uk-hidden" id="id" name="id" value="<?php echo $vacancyItem['id']; ?>"> 
            </form>
</div>
<?php include ROOT.'\view\layouts\footer.php';?>  