<?php include ROOT.'\view\layouts\header.php';?>
<main class="vacancy">
    <section class="vacancy-block">
        <div class="vacancy-info">
            <h1><?php echo $vacancyItem['Position']; ?></h1>
            <div class="uk-flex">
                <date class=" uk-margin-right"><?php echo $vacancyItem['Date']; ?></date> 
                <p class="uk-margin-remove">by <a href="/users/id<?php echo $vacancyItem['Company_id'] ?>"><?php echo User::findUserNameById($vacancyItem['Company_id']); ?></a></p>
            </div>
            <p>Требуемый опыт: <?php echo $vacancyItem['Experience']; ?></p>
            <p><?php echo $vacancyItem['About']; ?></p>
            <h2>Обязанности:</h2>
            <p><?php echo $vacancyItem['Duty']; ?></p>
            <h2>Требования:</h2>
            <p><?php echo $vacancyItem['Demands']; ?></p>
            <h2>Мы предлагаем:</h2>
            <p><?php echo $vacancyItem['Conditions']; ?></p>
            <div>
                <h3>Адрес: <?php echo $vacancyItem['Address']; ?></h3>
                <div id="map"></div>
                <script>
                    function initMap() {
                        var uluru = {lat: 53.900, lng: 27.566};
                        var mapOptions = new google.maps.Map(document.getElementById('map'), {
                            zoom: 14,
                            center: uluru
                        });

                        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map, 
                            draggable: true,  
                            title: 'Hello World!'
                        });

                        marker.setMap(map);
                    }
                </script>
                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=${YOUR_KEY}&callback=initMap">
                </script>  
            </div>
        </div>
        <?php if(User::checkUserType($_SESSION['user']) == 1): ?>
        <div class="vacancy-send-form uk-margin-left">
            <?php if(!User::isGuest()) : ?>
                <h3>Отправить заявку</h3>
                <form action="/projects/<?php echo $vacancyItem['id']?>" method="POST" class="sendRequest">
                    <div>
                        <?php if(!User::checkUserEmail($_SESSION['user'])) :?>
                        <label >Email</label>
                        <input type="text" class="uk-input uk-margin-small-top uk-margin-bottom">
                        <?php endif; ?>
                        <?php if(!User::checkUserTelephone($_SESSION['user'])) :?>
                        <label >Telephone number</label>
                        <input type="text" class="uk-input uk-margin-small-top uk-margin-bottom">
                        <?php endif; ?>
                        <label>Оставьте сообщение:</label>
                        <textarea type="text" class="uk-input uk-margin-small-top"></textarea>
                    </div>
                    <button class="uk-button uk-button-primary uk-margin-top" type="submit" name="" data-project-id="<?php echo $vacancyItem['id'] ?>">Send</button>
                </form>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </section>
</main>
<?php include ROOT.'\view\layouts\footer.php';?>