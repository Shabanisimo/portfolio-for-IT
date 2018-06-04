<?php include ROOT.'\view\layouts\header.php';?>
        <main class="reg-auth-container">
            <?php if (isset($errors) && is_array($errors)) :?>
                <ul>
                    <?php foreach($errors as $error) :?>
                        <li>-<?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
                    <form class="reg-auth-block" action="#" method="POST">
                        <h2 class="reg-auth__title">Company registartion</h2>
                        <ul class="reg-auth__list">
                            <li class="reg-auth__item">
                                <label>Login</label>
                                <input type="text" name="login" id="login" class="uk-input" value="<?php echo $login; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="uk-input" value="<?php echo $password; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Name</label>
                                <input type="text" name="title" id="title" class="uk-input" value="<?php echo $title; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Email</label>
                                <input type="text" name="website" id="website" class="uk-input" value="<?php echo $website; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Telephone</label>
                                <input type="text" name="telephone" id="telephone" class="uk-input" value="<?php echo $telephone; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <button type="submit" class="uk-button uk-button-primary reg-auth__button" name="companySignup">
                                    Registration
                                </button>
                            </li>
                        </ul>
                    </form>
        </main>
    </div>
    <?php include ROOT.'\view\layouts\footer.php';?>