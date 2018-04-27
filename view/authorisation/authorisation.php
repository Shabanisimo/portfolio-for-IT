<?php include ROOT.'\view\layouts\header.php';?>

        <main class="reg-auth-container">
            <form class="reg-auth-block"  action="" method="POST">
                <h2>Authorisation</h2>
                <ul class="reg-auth__list">
                    <li class="reg-auth__item">
                        <label>Login</label>
                        <input type="text" class="js-login" required id="login" name="login">
                    </li>
                    <li class="reg-auth__item">
                        <label>Password</label>
                        <input type="password" class="js-password" name="password" minlength="5" required id="password">
                    </li>
                    <li class="reg-auth__item">
                        <button type="submit" name="login">
                            Authorization
                        </button>
                    </li>
                    <li>
                        <a href="registration.php">Registration!</a>
                    </li>
                </ul>
            </form>
        </main>
    </div>
    <?php include ROOT.'\view\layouts\footer.php';?>
