<?php include ROOT.'\view\layouts\header.php';?>
<main class="project">
    <section class="project--header">
        <?php if ($projectItem['Image']) :?>
            <img class="project--header_img" src="../upload/projects/<?php echo $projectItem['Image'] ?>">
        <?php endif; ?>
    </section>
    <section class="project--info">
        <div class="uk-flex">
            <date class=" uk-margin-right"><?php echo $projectItem['Date']; ?></date> 
            <p class="uk-margin-remove">by <a href="/users/id<?php echo $projectItem['User_id'] ?>"><?php echo $projectItem['User_name'].' '.$projectItem['User_surname']; ?></a></p>
        </div>
        <h1><?php echo $projectItem['Title']; ?></h1>
        <p><?php echo $projectItem['Description']; ?></p>
        <?php if ($projectItem['Link'] == '') :?>
            <a href="<?php echo htmlspecialchars((0 === strpos($projectItem['Link'], 'http')? $projectItem['Link']: 'http://' . $projectItem['Link'])); ?>" target="_blank">Project link</a>
        <?php endif; ?>
    </section>
    <section>
    <?php if(!User::isGuest()) : ?>
        <form action="/projects/<?php echo $projectItem['id']?>" method="POST" class="comment-block">
            <textarea class="comment-text uk-textarea"  minlength="1" required name="comment-text"></textarea>
            <button class="uk-button uk-button-primary comment" type="submit" name="comment" data-project-id="<?php echo $projectItem['id'] ?>">Comment</button>
        </form>
    <?php endif; ?>
    <?php foreach($commentList as $commentItem):?>
    <article class="uk-comment uk-comment-primary uk-margin-bottom comments">
        <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
            <div class="avatar-container">
            <?php if (User::getUserPhoto($commentItem['user_id'])): ?>
                <img src="../upload/images/<?php echo $image = User::getUserPhoto($commentItem['user_id']); ?>" class="avatar uk-comment-avatar" alt="">
            <?php else: ?>
                <img src="../upload/images/avatar_img.png" class="avatar uk-comment-avatar" alt="">
            <?php endif; ?>  
            </div>          
            </div>
            <div class="uk-width-expand">
                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="/users/id<?php echo $commentItem['user_id'];?>"><?php $user = Project::getUserName($commentItem['user_id']); echo $user['name'].' '.$user['surname']; ?></a></h4>
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

