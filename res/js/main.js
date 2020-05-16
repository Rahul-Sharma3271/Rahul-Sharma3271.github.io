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

function signup_form_view(x) {
    let student = document.getElementById("student-signup");
    let mentor = document.getElementById("mentor-signup");

    student.style.display = "none";
    mentor.style.display = "none";

    if (x == "student")
        student.style.display = "block";
    else if (x == "mentor")
        mentor.style.display = "block";
}