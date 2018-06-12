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
                        <h2 class="reg-auth__title">Регистрация компании</h2>
                        <ul class="reg-auth__list">
                            <li class="reg-auth__item">
                                <label>Логин</label>
                                <input type="text" name="login"  minlength="4" required id="login" class="uk-input" value="<?php echo $login; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Пароль</label>
                                <input type="password" name="password" autocomplete="login" minlength="8" required id="password" class="uk-input" value="<?php echo $password; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Наименование</label>
                                <input type="text" name="title" id="title"  minlength="1" required class="uk-input" value="<?php echo $title; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Email</label>
                                <input type="email" name="email" required id="email" class="uk-input" value="<?php echo $website; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Номер телефона</label>
                                <input type="text" name="telephone" id="telephone" class="uk-input" value="<?php echo $telephone; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <button type="submit" class="uk-button uk-button-primary reg-auth__button" name="companySignup">
                                    Регистрация
                                </button>
                            </li>
                        </ul>
                    </form>
        </main>
    </div>
    <?php include ROOT.'\view\layouts\footer.php';?>