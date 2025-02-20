window.onscroll = function () { myfunc() }

var navbar = document.getElementById('navbar');
var topPx = navbar.offsetTop;
// alert(topPx)

function myfunc() {
    if(window.scrollY >= topPx) {
        navbar.classList.add('navbar-fixed');
    }else{
        navbar.classList.remove('navbar-fixed');
    }
}

// function logoutFunc() {
//     event.preventDefault();
//     document.getElementById('logout-form').submit();
// }

// JavaScript for toggling the side navbar
// const toggleBtn = document.getElementById('toggleBtn');
// const sideNavbar = document.getElementById('sidenav');
// const mainContent = document.getElementById('mainContent');

// toggleBtn.addEventListener('click', () => {
//     sideNavbar.classList.toggle('collapsed');
//     mainContent.classList.toggle('collapsed');
// });