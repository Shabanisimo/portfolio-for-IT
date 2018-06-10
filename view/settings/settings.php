<?php include ROOT.'\view\layouts\header.php';?>
    <main class="settings-container">
        <section class="settings-block">
            <form class="uk-margin-left settings" method="POST" action="">
            <h2>Change info</h2>
                <label class="uk-lable" for="name">Name</label>
                <input class="uk-input uk-margin-bottom name settings_item" name="name" id="name" value="<?php echo $name;  ?>"></input>
                <?php if(User::checkUserType($_SESSION['user']) == 1) :?>
                    <label class="uk-lable" for="surname">Surname</label>
                    <input class="uk-input uk-margin-bottom surname settings_item" name="surname" id="surname" value="<?php echo $surname;  ?>"></input>
                <?php endif; ?>
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
                <h2>Change password</h2>
                    <label class="uk-lable" for="newpass">Change password</label>
                    <input type="password" class="uk-input uk-margin-bottom password settings_item" name="newpass" id="password"></input>
                    <button class="uk-button uk-button-primary editPassword" type="submit" name="editpass">Send</button>
                </form >
                <?php if(User::checkUserType($_SESSION['user']) == 1) :?>
                <div class="setting__project-list uk-margin-small-left uk-margin-large-top">
                <h2>User project list</h2>
                    <table class="uk-table uk-table-hover uk-table-divider">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Project name</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($projectList as $vacancyItem): ?>
                            <tr data-id="<?php echo $vacancyItem['Id'] ?>">
                                <td><?php echo $vacancyItem['Id'] ?></td>
                                <td><a href="/projects/<?php echo $vacancyItem['Id'] ?>"><?php echo $vacancyItem['Title'] ?></a></td>
                                <td><?php echo $vacancyItem['Date'] ?></td>
                                <td><a uk-icon="file-edit" data-id="<?php echo $vacancyItem['Id'] ?>" href="/editproject/<?php echo $vacancyItem['Id'] ?>"></a></td>
                                <td><a uk-icon="trash" class="deleteProject" data-id="<?php echo $vacancyItem['Id'] ?>"></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="setting__project-list uk-margin-small-left uk-margin-large-top">
                <h2>Company vacancy list</h2>
                    <table class="uk-table uk-table-hover uk-table-divider">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Vacancy position</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($vacancyList as $vacancyItem): ?>
                            <tr data-id="<?php echo $vacancyItem['id'] ?>">
                                <td><?php echo $vacancyItem['id'] ?></td>
                                <td><a href="/vacancy/<?php echo $vacancyItem['id'] ?>"><?php echo $vacancyItem['Position'] ?></a></td>
                                <td><?php echo $vacancyItem['Date'] ?></td>
                                <td><a uk-icon="file-edit" data-id="<?php echo $vacancyItem['id'] ?>" href="/editvacancies/<?php echo $vacancyItem['id'] ?>"></a></td>
                                <td><a uk-icon="trash" class="deleteVacancy" data-id="<?php echo $vacancyItem['id'] ?>"></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <script src="lib/jquery-3.3.1.min.js"></script>
    <script src="script/index.js"></script>
<?php include ROOT.'\view\layouts\footer.php';?>
