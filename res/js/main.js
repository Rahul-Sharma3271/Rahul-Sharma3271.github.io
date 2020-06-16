/*
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    var mybutton = document.getElementById("myBtn");
    if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
*/


function hide_view() {
    let x = document.getElementsByClassName("view");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
}

function view(ids) {
    hide_view();
    for (i = 0; i < ids.length; i++) {
        document.getElementById(ids[i]).style.display = "";
    }
}
