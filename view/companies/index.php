<?php include ROOT.'\view\layouts\header.php';?>
<main>
    <h1 class="uk-margin-left">Список вакансий</h1>
    <?php if ($companyList) :?>
    <div class="vacancy-list">
    <?php foreach ($companyList as $companyItem):?>
        <div class="uk-card uk-card-default uk-grid-collapse vacancy-item" uk-grid>
            <div class="">
                <div class="uk-card-body">
                    <h3><a href="/vacancy/<?php echo $companyItem['id']; ?>"><?php echo $companyItem['Position']; ?></a></h3>
                    <p class=""><a href="/users/id<?php echo $companyItem['id']; ?>"><?php echo User::findUserNameById($companyItem['id']); ?></a></p>
                    <p><?php echo $companyItem['About']; ?></p>
                    <div>З/п: 
                    <?php if($companyItem['Min'] || $companyItem['Max']) :?>
                        <?php if($companyItem['Min']): ?>    
                            <span>от <?php echo $companyItem['Min']; ?></span>
                        <?php endif ?>
                        <?php if($companyItem['Max']): ?>    
                            <span>до <?php echo $companyItem['Max']; ?></span>
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