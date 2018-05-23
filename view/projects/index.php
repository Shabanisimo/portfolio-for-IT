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
                <a class="uk-card-title" href="/projects/<?php echo $projectItem['id']; ?>"><?php echo $projectItem['Title']; ?></a>
                <p>Language: <?php echo $projectItem['Language']; ?></p>
            </div>
            <div class="uk-card-footer">
                <a uk-icon="heart"></a>
                <span class="likes-count"><?php echo $projectItem['Likes']; ?></span>
            </div>
        </div>
    <?php endforeach;?>
</div>
<div>
    <?php echo $pagination->get(); ?>
</div>
    <?php endif; ?>
</main>
<?php include ROOT.'\view\layouts\footer.php';?>