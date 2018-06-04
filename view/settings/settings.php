<?php include ROOT.'\view\layouts\header.php';?>
    <main class="settings-container">
        <section class="settings-block">
            <form class="uk-margin-top uk-margin-left settings" method="POST" action="">
                <label class="uk-lable" for="name">Name</label>
                <input class="uk-input uk-margin-bottom name settings_item" name="name" id="name" value="<?php echo $name;  ?>"></input>
                <label class="uk-lable" for="surname">Surname</label>
                <input class="uk-input uk-margin-bottom surname settings_item" name="surname" id="surname" value="<?php echo $surname;  ?>"></input>
                <label class="uk-lable" for="email">Email</label>
                <input class="uk-input uk-margin-bottom email settings_item" name="email" id="email" value="<?php echo $email;  ?>"></input>
                <label class="uk-lable" for="telephone">Telephone</label>
                <input class="uk-input uk-margin-bottom telephone settings_item" name="telephone" id="telephone" value="<?php echo $telephone; ?>"></input>
                <label class="uk-lable" for="about">About me</label>
                <textarea class="uk-input about settings_item" name="about" id="about"><?php echo $about; ?></textarea>
                <button class="uk-button uk-button-primary uk-margin-top edit" type="submit" name="edit">Send</button>
            </form>
            <div class="settings">
                <form class="uk-margin-top uk-margin-left settings" method="POST" cation="">
                    <label class="uk-lable" for="newpass">Change password</label>
                    <input type="password" class="uk-input uk-margin-bottom password settings_item" name="newpass" id="password"></input>
                    <button class="uk-button uk-button-primary editPassword" type="submit" name="editpass">Send</button>
                </form>
            </div>
        </section>
    </main>
    <script src="lib/jquery-3.3.1.min.js"></script>
    <script src="script/index.js"></script>
<?php include ROOT.'\view\layouts\footer.php';?>
