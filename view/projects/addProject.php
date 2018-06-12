<?php include ROOT.'\view\layouts\header.php';?>
<div class="uk-padding">
            <div class="">
                <h2 class="uk-modal-title">Добавление проекта</h2>
            </div>
            <form action="" class="add-poject__block" uk-overflow-auto method="POST" enctype="multipart/form-data">
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-name">Название проекта</label>
                    <input type="text" class="uk-input" minlength="1" required id="project_name" name="project_name">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="input_proj-lang">Язык программирования</label>
                    <input type="text" class="uk-input" minlength="1" required id="project_lang" name="project_lang">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="textarea_description">Описание</label>
                    <textarea name="description" class="uk-textarea" id="description"></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="link">Ссылка</label>
                    <input type="text" class="uk-input" id="proj_link" name="proj_link">
                </div>
                <div class="uk-margin js-upload uk-width-1-1" uk-form-custom>
                    <div class="js-upload uk-placeholder uk-text-center">
                        <span uk-icon="icon: cloud-upload"></span>
                        <span class="uk-text-middle">Загрузите картинку для проекта</span>
                        <div uk-form-custom>
                            <input type="file" name="image">
                            <span class="uk-link">выбрать</span>
                        </div>
                    </div>
                    <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>
                </div>
                <div class="uk-text-right">
                    <button class="uk-button uk-button-primary" type="submit" name="addProject">Сохранить</button>                    
                </div>    
            </form>
</div>
<script>

    var bar = document.getElementById('js-progressbar');

    UIkit.upload('.js-upload', {

        url: '',
        multiple: true,

        beforeSend: function (environment) {
            console.log('beforeSend', arguments);

            // The environment object can still be modified here. 
            // var {data, method, headers, xhr, responseType} = environment;

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

            alert('Файл загружен');
        }

    });

</script>
<?php include ROOT.'\view\layouts\footer.php';?>