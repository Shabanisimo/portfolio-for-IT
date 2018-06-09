<?php include ROOT.'/view/layouts/header.php'; ?>
<main>
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
                    <?php $user = User::findUserNameById($projectItem['User_id']); echo $user['Name']; echo ' '; echo $user['Surname']; ?>
                </a>
            </td>
            <td><a  data-id="<?php echo $projectItem['Id'] ?>" href="/edit/project/<?php echo $projectItem['id'] ?>" class="uk-icon-link" uk-icon="file-edit"></a></td>
            <td><a  class="deleteProject" data-id="<?php echo $projectItem['id'] ?>" class="uk-icon-link" uk-icon="trash"></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</main>
<?php include ROOT.'/view/layouts/footer.php'; ?>