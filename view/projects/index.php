<?php include ROOT.'\view\layouts\header.php';?>
<main class="projects-list">
    <?php foreach ($projectList as $projectItem):?>
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top">
                <img src="/template/img/shopaholic.png" alt="">
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
</main>
<?php include ROOT.'\view\layouts\footer.php';?>