<?php include ROOT.'\view\layouts\header.php';?>
    <main class="settings-container">
        <section>
            <form class="uk-form-width-large uk-margin-top uk-margin-left" method="POST" cation="">
                <label class="uk-lable" for="name">Name</label>
                <input class="uk-input uk-margin-bottom" name="name" id="name" value="<?php echo $name;  ?>"></input>
                <label class="uk-lable" for="surname">Surname</label>
                <input class="uk-input uk-margin-bottom" name="surname" id="surname" value="<?php echo $surname;  ?>"></input>
                <label class="uk-lable" for="email">Email</label>
                <input class="uk-input uk-margin-bottom" name="email" id="email" value="<?php echo $email;  ?>"></input>
                <label class="uk-lable" for="telephone">Telephone</label>
                <input class="uk-input uk-margin-bottom" name="telephone" id="telephone" value="<?php echo $telephone; ?>"></input>
                <label class="uk-lable" for="about">About me</label>
                <textarea class="uk-input" name="about" id="about"><?php echo $about; ?></textarea>
                <button class="uk-button uk-button-primary uk-margin-top" type="submit" name="edit">Send</button>
            </form>
        </section>
    </main>
    <script src="lib/jquery-3.3.1.min.js"></script>
    <script src="script/index.js"></script>
<?php include ROOT.'\view\layouts\footer.php';?>
