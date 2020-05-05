<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
  scroll-behavior: smooth;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  /*background-color: red;*/
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 50%;
  transition: 0.5s;
}

#myBtn:hover {
  background-color: yellow;
  opacity: 1;
  padding-bottom:25px;
}


img{
  float: bottom-right;
  width: 30px;
  height: 30px;
}
</style>
</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="icons\topbtn.png"></button>
<script class="col-lg col-sm">
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 40px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</body>
</html>
