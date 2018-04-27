let form = '[data-form]',
    menuBtn = '[data-menu-btn]',
    menu = '[data-menu]',
    menuAside = '[data-menu-aside]',
    classBodyFix = 'fixed',
    classMenuActive = 'menu--active';

$(menuBtn).on('click', function() {
    toggleMenu();
  });
  
  $(menuAside).on('click', function() {
    toggleMenu();
  });

function toggleMenu(){
  $(menu).toggleClass(classMenuActive);
  $('body').toggleClass(classBodyFix);
}

//pop-up
var modal = document.querySelector("#modal");
var modalOverlay = document.querySelector("#modal-overlay");
var closeButton = document.querySelector("#close-button");
var openButton = document.querySelector("#open-button");

closeButton.addEventListener("click", function() {
  modal.classList.toggle("closed");
  modalOverlay.classList.toggle("closed");
});

openButton.addEventListener("click", function() {
  modal.classList.toggle("closed");
  modalOverlay.classList.toggle("closed");
});