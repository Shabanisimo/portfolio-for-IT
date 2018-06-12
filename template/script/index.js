$('.like').click(function (event) {

    projectId = $(this).attr('data-id');

    $this = event.target;

    if(!$(this).hasClass('active_h')) {
        $.ajax({
            url: '../ajax/likes.php',
            type: 'post',
            data: {'projectId': projectId},
            success: function (like) {
                $($this).addClass('active_h');
                $($this).find('.likes-count').text(parseInt($($this).find('.likes-count').text())+1);
            }
        });
    }
    else{
        $.ajax({
            url: '../ajax/delLikes.php',
            type: 'post',
            data: {'projectId': projectId},
            success: function (like) {
                $($this).removeClass('active_h');
                $($this).find('.likes-count').text(parseInt($($this).find('.likes-count').text())-1);
            }
        });
    }
    event.preventDefault();
});

$('.comment').click(function (event){


  let projectId = $('.comment').attr('data-project-id');
  let comment = $('.comment-text').val();

  $.ajax({
    url: '../ajax/comments.php',
    type: 'post',
    data: {'comment': comment,'id':projectId},
    success: function(data){
        console.log(data);
    }
  });
  event.preventDefault();
});

$('.edit').click(function (event){

    let name = $('.name').val();
    let surname = $('.surname').val();
    let email = $('.email').val();
    let telephone = $('.telephone').val();
    let about = $('.about').val();

    console.log(name, surname, email, telephone, about);

    $.ajax({
        url: '../ajax/changeUserInfo.php',
        type: 'post',
        data: {'name': name,'surname': surname, 'email': email, 'telephone': telephone, 'about': about},
        success: function(data){
            console.log(data);
        }
    });
    event.preventDefault();

});

$('.project-title').click(function (event){
    let projectId = $(this).attr('data-id');

    $.ajax({
        url: '../ajax/view.php',
        type: 'post',
        data: {'projectId': projectId},
        success: function(data){
            window.location.href = "/projects/"+projectId;
        }
    });
    event.preventDefault();
});

$('.editPassword').click(function (event){
    let password = $('.password').val();

    $.ajax({
        url: '../ajax/changePassword.php',
        type: 'post',
        data: {'password': password},
        success: function(data){
            console.log(data);
        }
    });
    event.preventDefault();
});

$('.deleteProject').click(function (event){

    let projectId = $(this).attr('data-id');
    $(this).parent().parent().hide(500);

    $.ajax({
        url: '../ajax/deleteProject.php',
        type: 'post',
        data: {'projectId': projectId},
        success: function(data){
            console.log(data);
            $(this).parent().parent().hide(500);
        }
    });
    event.preventDefault();
});


$('.addVacancy').click(function (event){

    let form = $('.addVacancy-block').serialize();
    console.log(form);

    $.ajax({
        url: '../ajax/addVacancy.php',
        type: 'post',
        data: form,
        success: function(data){
            console.log(data);
            alert("Ваша вакансия опубликована");
        }
    });
    event.preventDefault();
});

$('.editVacancy').click(function (event){

    let form = $('.editVacancy-block').serialize();
    console.log(form);

    $.ajax({
        url: '../ajax/editVacancy.php',
        type: 'post',
        data: form,
        success: function(data){
            console.log(data);
            alert("Ваша вакансия исправлена");
        }
    });
    event.preventDefault();
});

$('.deleteVacancy').click(function (event){

    let vacancyId = $(this).attr('data-id');

    $.ajax({
        url: '../ajax/deleteVacancy.php',
        type: 'post',
        data: {'vacancyId': vacancyId},
        success: function(data){
            console.log(data);
            $(this).parent().parent().hide(500);
        }
    });
    event.preventDefault();
});

$('.adminButton').click(function (event){
    let id = $(this).attr('data-id');

    $.ajax({
        url: '../ajax/getUserAdmin.php',
        type: 'post',
        data: {'id': id},
        success: function(data){
            console.log(data);
            $(this).parent().parent().hide(500);
        }
    });
    event.preventDefault();
});
