<?php include ROOT.'\view\layouts\header.php';?>

        <main class="reg-auth-container">
            <?php if(isset($errors)) echo $errors; ?>
            <form class="reg-auth-block"  action="" method="POST">
                <h2 class="reg-auth__title">Authorisation</h2>
                <ul class="reg-auth__list">
                    <li class="reg-auth__item">
                        <label class="uk-form-label" for="login">Login</label>
                        <input type="text" class="js-login uk-input" required id="login" name="login">
                    </li>
                    <li class="reg-auth__item" for="password">
                        <label class="uk-form-label">Password</label>
                        <input type="password" class="js-password uk-input" name="password" minlength="5" required id="password">
                    </li>
                    <li class="reg-auth__item">
                        <button type="submit" class="uk-button uk-button-primary  reg-auth__button" name="companyLogin">
                            Authorization
                        </button>
                    </li>
                    <li>
                        <a href="/companyRegistration">Registration!</a>
                    </li>
                </ul>
            </form>
        </main>
    </div>
    <?php include ROOT.'\view\layouts\footer.php';?>