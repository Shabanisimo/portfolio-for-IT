/*$('.like').click(function (event) {

  if(!$('.like').hasClass('active_h')) {
    console.log("2");
      $.ajax({
          url: '../ajax/likes.php',
          type: 'post',
          data: {'place': getUrlParameter('p')},
          success: function (like) {
              $('.like').addClass('active_h');
          }
      });
  }
  else{
      $.ajax({
          url: '../ajax/delLikes.php',
          type: 'post',
          data: {'place': getUrlParameter('p')},
          success: function (like) {
              $('.like').removeClass('active_h');
          }
      });
  }
  event.preventDefault();
});*/

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
