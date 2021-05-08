
// When the user scrolls the page, execute header_top
window.onscroll = function() {header_top()};

var header = document.getElementById("wrap");

var sticky = header.offsetTop;

function header_top() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky_nav");
  } else {
    header.classList.remove("sticky_nav");
  }
}
function scroll_to(link){

    link.scrollIntoView({
        behavior: 'auto',
        block: 'center',
        inline: 'center'
    });
    
}
