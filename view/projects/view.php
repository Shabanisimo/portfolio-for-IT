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
</main>
<?php include ROOT.'\view\layouts\footer.php';?>

