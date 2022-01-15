//ambil elemen yang dibutuhkan

var keyword = document.getElementById("key");
var t = document.getElementById("myL");
var container = document.getElementById("container");

keyword.addEventListener("keyup", function () {
  t.style.display = "none";
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById("con").innerHTML = this.responseText;
    }
  };

  xhr.open("GET", "mahasiswa.php?keyword=" + keyword.value, true);
  xhr.send();
});
