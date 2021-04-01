window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar-change").className = "navbar-style";
    } else {
        document.getElementById("navbar-change").className = "";
    }
}