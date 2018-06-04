<?php include ROOT.'\view\layouts\header.php';?>
<main class="project">
    <section class="project--header">
        <img class="project--header_img" src="/upload/images//<?php echo $projectItem['Image'] ?>">
    </section>
    <section class="project--info">
        <div class="uk-flex">
            <date class=" uk-margin-right"><?php echo $projectItem['Date']; ?></date> 
            <p class="uk-margin-remove">by <a href="/users/id<?php echo $projectItem['User_id'] ?>"><?php echo $projectItem['User_name'].' '.$projectItem['User_surname']; ?></a></p>
        </div>
        <h1><?php echo $projectItem['Title']; ?></h1>
        <p><?php echo $projectItem['Description']; ?></p>
        <a href="<?php echo $projectItem['Link']; ?>" target="_blank">Project link</a>
    </section>
    <section>
    <?php if(!User::isGuest()) : ?>
        <form action="/projects/<?php echo $projectItem['id']?>" method="POST" class="comment-block">
            <textarea class="comment-text" name="comment-text"></textarea>
            <button class="uk-button uk-button-primary comment" type="submit" name="comment" data-project-id="<?php echo $projectItem['id'] ?>">Comment</button>
        </form>
    <?php endif; ?>
    <?php foreach($commentList as $commentItem):?>
    <article class="uk-comment uk-comment-primary uk-margin-bottom">
        <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
                <img class="uk-comment-avatar" src="../docs/images/avatar.jpg" width="80" height="80" alt="">
            </div>
            <div class="uk-width-expand">
                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="/users/id<?php echo $commentItem['user_id'];?>"><?php $user = Project::getUserName($commentItem['user_id']); echo $user['name'].' '.$user['surname']; ?></a></h4>
                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                    <li><?php echo $commentItem['date'] = str_replace("/", ".",$commentItem['date']);?></li>
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

