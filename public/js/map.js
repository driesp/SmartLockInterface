var canvas = document.getElementById("clickCanvas");
var context = canvas.getContext("2d");
parentSize = canvas.parentNode.getBoundingClientRect();
canvas.width  = parentSize.width;
canvas.height = parentSize.height;

function mouseOverArea(e,div)
{
  var d = document.getElementById(div);
  console.log(e.clientX);
  console.log(e.clientY);
  d.style.left = e.clientX - parentSize.left  + 50 +'px';
  d.style.top = e.clientY - parentSize.top + 'px';
  d.style.display = 'block';
}
function mouseOutArea(e,div)
{
  var d = document.getElementById(div);
  d.style.left = 0;
  d.style.top = 0;
  d.style.display = 'none';
}
