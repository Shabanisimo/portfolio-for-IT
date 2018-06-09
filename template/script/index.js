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

    console.log(projectId);

    $.ajax({
        url: '../ajax/deleteProject.php',
        type: 'post',
        data: {'projectId': projectId},
        success: function(data){
            console.log(data);
            $(this).parent().parent().hide(500);
            alert('Проект успешно удалён!');
        }
    });
    event.preventDefault();
});

