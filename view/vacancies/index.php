<?php include ROOT.'\view\layouts\header.php';?>
<main>
    <h1 class="uk-margin-left">Список вакансий</h1>
    <?php
    if ($vacancyList) :?>
    <div class="vacancy-list">
    <?php foreach ($vacancyList as $vacancyItem):?>
        <div class="uk-card uk-card-default uk-grid-collapse vacancy-item" uk-grid>
            <div class="">
                <div class="uk-card-body">
                    <h3><a href="/vacancy/<?php echo $vacancyItem['id']; ?>"><?php echo $vacancyItem['Position']; ?></a></h3>
                    <p class=""><a href="/users/id<?php echo $vacancyItem['Company_id']; ?>"><?php echo User::findUserNameById($vacancyItem['Company_id']); ?></a></p>
                    <p><?php echo $vacancyItem['About']; ?></p>
                    <div>З/п: 
                    <?php if($vacancyItem['Min'] || $vacancyItem['Max']) :?>
                        <?php if($vacancyItem['Min']): ?>    
                            <span>от <?php echo $vacancyItem['Min']; ?></span>
                        <?php endif ?>
                        <?php if($vacancyItem['Max']): ?>    
                            <span>до <?php echo $vacancyItem['Max']; ?></span>
                        <?php endif ?>
                    <?php else :?>
                        <span>Не указана</span>
                    <?php endif ?>
                    </div>
                </div>
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