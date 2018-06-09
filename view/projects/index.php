<?php include ROOT.'\view\layouts\header.php';?>
<main>
    <h1 class="uk-margin-left">Список проектов</h1>
    <?php
      if ($projectList) :?>
    <div class="projects-list">
    <?php foreach ($projectList as $projectItem):?>
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top">
                <img src="/upload/images/<?php echo $projectItem['Image']; ?>" alt="">
            </div>
            <div class="uk-card-body">
                <a class="uk-card-title project-title"  data-id="<?php echo $projectItem['id']; ?>" href="/projects/<?php echo $projectItem['id']; ?>"><?php echo $projectItem['Title']; ?></a>
                <p>Language: <?php echo $projectItem['Language']; ?></p>
            </div>
            <?php if(!User::isGuest()) :?>
            <div class="uk-card-footer likes project-card__footer" >
                <button class="like uk-button <?php if(Project::checkLike($projectItem['id'], $_SESSION['user']) == true) echo "active_h";?>" data-id="<?php echo $projectItem['id']; ?>">
                    <span class="likes-count"><a uk-icon="heart"></a><?php echo $projectItem['Likes']; ?></span>
                </button>
                <span><span uk-icon="comments" class="comment-icon"></span><?php echo $count = Project::commentsCount($projectItem['id']); ?></span>
            </div>
            <?php else :?>
            <div class="uk-card-footer likes project-card__footer" >
                <span><span uk-icon="heart" class="heart-icon"></span><?php echo $projectItem['Likes']; ?></span>
                <span><span uk-icon="comments" class="comment-icon"></span><?php echo $count = Project::commentsCount($projectItem['id']); ?></span>
            </div>
            <?php endif; ?>
        </div>
    <?php endforeach;?>
</div>
<div>
    <?php echo $pagination->get(); ?>
</div>
    <?php endif; ?>
</main>
<?php include ROOT.'\view\layouts\footer.php';?>