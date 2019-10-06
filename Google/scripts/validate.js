
function validate(str) {
  var xhttp;

    var n1=form["qty" + 1].value;
    var n2=form["qty" + 2].value;


  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML =this.responseText;
      
    }
  };
  xhttp.open("GET", "validate.php?n1="+n1+"&n2"=n2, true);
  xhttp.send();   
}

function validat(form) {
  alert(form["qty" + 1].value);
  alert(form["qty" + 2].value);
}