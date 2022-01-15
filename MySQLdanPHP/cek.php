<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}
</style>
</head>
<body>

<p>Click the "Try it" button to toggle between hiding and showing the DIV element:</p>

<button onclick="myFunction()">Try it</button>

<div id="myDIV">
This is my DIV element.
</div>

<div id="myD">
This is my DIV element.
</div>

<p><b>Note:</b> The element will not take up any space when the display property set to "none".</p>

<script>
// function myFunction() {
  
//   if (x.style.display === "none") {
//     x.style.display = "block";
//   } else {
//     
//   }
// }
var x = document.getElementById("myDIV");
var y = document.getElementById("myD");
x.addEventListener("mouseover", function(){
  y.style.display = "none";
})

</script>

</body>
</html>

