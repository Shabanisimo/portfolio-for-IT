<?php include ROOT.'/view/layouts/header.php'; ?>
    <main>
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
            <td><a href="<?php echo $projectItem['id']; ?>" data-id="<?php echo $projectItem['id']; ?>" class="uk-icon-link" uk-icon="star"></a></td>
            <td><a href="<?php echo $projectItem['id']; ?>" data-id="<?php echo $projectItem['id']; ?>" class="uk-icon-link" uk-icon="file-edit"></a></td>
            <td><a href="<?php echo $projectItem['id']; ?>" data-id="<?php echo $projectItem['id']; ?>" class="uk-icon-link" uk-icon="trash"></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </main>
<?php include ROOT.'/view/layouts/footer.php'; ?>