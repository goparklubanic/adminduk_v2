function loadContent(id,url) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
     document.getElementById(id).innerHTML = xhr.responseText;
    }
  };
  xhr.open("GET", url, true);
  xhr.send();
}
