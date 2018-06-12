<?php include ROOT.'/view/layouts/header.php'; ?>
    <main>
    <section class="uk-padding">
    <h3>Список специалистов</h3>
    <table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>id</th>
            <th>User Name</th>
            <th>Get admin</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($userList as $userItem): ?>
        <tr>
            <td><?php echo $userItem['id']; ?></td>
            <td>
                <a href="/users/id<?php echo $userItem['id']; ?>">
                    <?php echo $userItem['Name']; echo ' '; echo $userItem['Surname']; ?>
                </a>
            </td>
            <td><button class="uk-button uk-button-primary adminButton" data-id="<?php echo $userItem['id']; ?>">Admin</button></td>
            <td><a href="<?php echo $userItem['id']; ?>" data-id="<?php echo $userItem['id']; ?>" class="uk-icon-link" uk-icon="file-edit"></a></td>
            <td><a class="deleteUser" data-id="<?php echo $userItem['id']; ?>" class="uk-icon-link" uk-icon="trash"></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</section>
<section class="uk-padding">
<?php if ($projectList) :?>

<h3>Список проектов</h3>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Date</th>
            <th>User name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($projectList as $projectItem): ?>
        <tr>
            <td><?php echo $projectItem['id']; ?></td>
            <td>
                <a href="/projects/project<?php echo $projectItem['id']; ?>">
                    <?php echo $projectItem['Title']; ?>
                </a>
            </td>
            <td><?php echo $projectItem['Date']; ?></td>
            <td>
                <a href="/users/id<?php echo $projectItem['User_id']; ?>">
                    <?php echo User::findUserNameById($projectItem['User_id']);?>
                </a>
            </td>
            <td><a uk-icon="file-edit" data-id="<?php echo $projectItem['Id'] ?>" href="/editproject/<?php echo $projectItem['id'] ?>"></a></td>
            <td><a uk-icon="trash" class="deleteProject" data-id="<?php echo $projectItem['id'] ?>"></a></td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <h3>Проектов нет</h3>
        <?php endif; ?>
    </tbody>
    </table>
</section>
<section class="uk-padding">
<?php if ($projectList) :?>

<h3>Список проектов</h3>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Date</th>
            <th>User name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($projectList as $projectItem): ?>
        <tr>
            <td><?php echo $projectItem['id']; ?></td>
            <td>
                <a href="/projects/project<?php echo $projectItem['id']; ?>">
                    <?php echo $projectItem['Title']; ?>
                </a>
            </td>
            <td><?php echo $projectItem['Date']; ?></td>
            <td>
                <a href="/users/id<?php echo $projectItem['User_id']; ?>">
                    <?php echo User::findUserNameById($projectItem['User_id']);?>
                </a>
            </td>
            <td><a uk-icon="file-edit" data-id="<?php echo $projectItem['Id'] ?>" href="/editproject/<?php echo $projectItem['id'] ?>"></a></td>
            <td><a uk-icon="trash" class="deleteProject" data-id="<?php echo $projectItem['id'] ?>"></a></td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <h3>Проектов нет</h3>
        <?php endif; ?>
    </tbody>
    </table>
</section>

    </main>
<?php include ROOT.'/view/layouts/footer.php'; ?>