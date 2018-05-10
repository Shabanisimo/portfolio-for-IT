<?php include ROOT.'\view\layouts\header.php';?>
<main class="project">
    <section class="project--header">
        <img class="project--header_img" src="/template/img/shopaholic.png">
    </section>
    <section class="project--info">
        <time><?php echo $projectItem['Date']; ?></time>
        <p><?php echo $projectItem['User_id']; ?></p>
        <h1><?php echo $projectItem['Title']; ?></h1>
        <p><?php echo $projectItem['Description']; ?></p>
        <a></a>
    </section>
    <section>
    <?php foreach($commentList as $commentItem):?>
    <article class="uk-comment uk-comment-primary uk-margin-bottom">
        <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
                <img class="uk-comment-avatar" src="../docs/images/avatar.jpg" width="80" height="80" alt="">
            </div>
            <div class="uk-width-expand">
                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="/users/<?php echo $commentItem['user_id'];?>"><?php $user = User::findUserNameById($commentItem['user_id']); echo $user['name'].' '.$user['surname']; ?></a></h4>
                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                    <li><?php echo $commentItem['date'];?></li>
                </ul>
            </div>
        </header>
        <div class="uk-comment-body">
            <p><?php echo $commentItem['comment'];?></p>
        </div>
    </article>
    <?php endforeach;?>
    </section>
</main>
<?php include ROOT.'\view\layouts\footer.php';?>

