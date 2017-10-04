let start = new Date().getTime();

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function makeAppear(){

  let top = Math.random()*300;
  let left = Math.random()*500;
  let size = (Math.random()*200) + 100;

  if(Math.random() > 0.5){
    document.getElementById("shape").style.borderRadius="50%";
  } else {
    document.getElementById("shape").style.borderRadius="0%";
  }

  document.getElementById("shape").style.top=top + "px";

  document.getElementById("shape").style.left=left + "px";

  document.getElementById("shape").style.width=size + "px";

  document.getElementById("shape").style.height=size + "px";

  document.getElementById("shape").style.display="block";

  document.getElementById("shape").style.backgroundColor=getRandomColor();

  start = new Date().getTime();

}

function appearAfterDelay(){

        setTimeout(makeAppear, Math.random()*2000);

}

appearAfterDelay();

document.getElementById("shape").onclick=function(){

  document.getElementById("shape").style.display="none";

  let end = new Date().getTime();

  let time= ((end-start) / 1000);

  document.getElementById("time-result").innerHTML=time + " seconds";

  appearAfterDelay();

}