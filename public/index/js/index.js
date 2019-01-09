let length = chart.getTotalLength();
let rid = null;
chart.style.strokeDasharray = length;
chart.style.strokeDashoffset = length;
let frames = length;
let point1, point2;
function Frame() {
  rid = requestAnimationFrame(Frame);
  chart.style.strokeDashoffset = frames;

  point1 = chart.getPointAtLength(length - frames);
  point2 = chart.getPointAtLength((length - frames + 2) % length);
  angle = Math.atan2(point2.y - point1.y, point2.x - point1.x);

  arrow.setAttribute(
    "transform",
    "translate(" +
      [point1.x, point1.y] +
      ")" +
      "rotate(" +
      angle * 180 / Math.PI +
      ")"
  );

  frames-=2;

  if (frames <= 2) {
    cancelAnimationFrame(rid);
    rid = null;
  }
}

Frame();


document.body.addEventListener("click",()=>{
  if(rid){
    cancelAnimationFrame(rid);
    rid=null;
  }
  frames = length;
  Frame();
})