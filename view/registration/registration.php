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
                        <h2 class="reg-auth__title">Регистрация</h2>
                        <ul class="reg-auth__list">
                            <li class="reg-auth__item">
                                <label>Логин</label>
                                <input type="text" name="login" id="login" minlength="4" required class="uk-input" value="<?php echo $login; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Пароль</label>
                                <input type="password" name="password" minlength="8" required id="password" class="uk-input" value="<?php echo $password; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Имя</label>
                                <input type="text" name="name" id="name" minlength="1" required class="uk-input" value="<?php echo $name; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Фамилия</label>
                                <input type="text" name="surname" id="surname" minlength="1" required class="uk-input" value="<?php echo $surname; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Email</label>
                                <input type="email" name="email" id="email" required class="uk-input" value="<?php echo $email; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <label>Номер телефона</label>
                                <input type="text" name="telephone" id="telephone" class="uk-input" value="<?php echo $telephone; ?>">
                            </li>
                            <li class="reg-auth__item">
                                <button type="submit" class="uk-button uk-button-primary reg-auth__button" name="signup">
                                    Регистрация
                                </button>
                            </li>
                        </ul>
                    </form>
        </main>
    </div>
    <?php include ROOT.'\view\layouts\footer.php';?>
