
function main(){
function ani1() {
  let f1 = document.querySelector(".flower.f1");

  if (scrollY >= 200) {
    f1.style.transform = "translate(-250px,-250px)";
  } else {
    f1.style.transform = "translate(0px,0px)";
  }
}

function ani2() {
  let f2 = document.querySelector(".flower.f2");

  if (scrollY >= 200) {
    f2.style.transform = "translate(100px,-100px)";
  } else {
    f2.style.transform = "translate(0px,0px)";
  }
}

function ani3() {
  let f3 = document.querySelector(".flower.f3");

  if (scrollY >= 200) {
    f3.style.transform = "translate(-200px,200px)";
  } else {
    f3.style.transform = "translate(0px,0px)";
  }
}

function ani4() {
  let f4 = document.querySelector(".flower.f4");

  if (scrollY >= 200) {
    f4.style.transform = "translate(150px,150px)";
  } else {
    f4.style.transform = "translate(0px,0px)";
  }
}

//https://codepen.io/osublake/pen/QqPqbN

// var html = document.documentElement;
// var body = document.body;

// var scroller = {
//   target: document.querySelector("#scroll-containe"),
//   ease: 0.1, // <= scroll speed
//   endY: 0,
//   y: 0,
//   resizeRequest: 1,
//   scrollRequest: 0,
// };

// var requestId = null;

// TweenLite.set(scroller.target, {
//   rotation: 0.01,
//   force3D: true,
// });

// window.addEventListener("load", onLoad);

// function onLoad() {
//   updateScroller();
//   window.focus();
//   window.addEventListener("resize", onResize);
//   document.addEventListener("scroll", onScroll);
// }

// function updateScroller() {
//   var resized = scroller.resizeRequest > 0;

//   if (resized) {
//     var height = scroller.target.clientHeight;
//     body.style.height = height + "px";
//     scroller.resizeRequest = 0;
//   }

//   var scrollY = window.pageYOffset || html.scrollTop || body.scrollTop || 0;

//   scroller.endY = scrollY;
//   scroller.y += (scrollY - scroller.y) * scroller.ease;

//   if (Math.abs(scrollY - scroller.y) < 0.05 || resized) {
//     scroller.y = scrollY;
//     scroller.scrollRequest = 0;
//   }

//   TweenLite.set(scroller.target, {
//     y: -scroller.y,
//   });

//   requestId =
//     scroller.scrollRequest > 0 ? requestAnimationFrame(updateScroller) : null;
// }

// function onScroll() {
//   scroller.scrollRequest++;
//   if (!requestId) {
//     requestId = requestAnimationFrame(updateScroller);
//   }
// }

// function onResize() {
//   scroller.resizeRequest++;
//   if (!requestId) {
//     requestId = requestAnimationFrame(updateScroller);
//   }
// }

window.addEventListener("scroll", ani1);
window.addEventListener("scroll", ani2);
window.addEventListener("scroll", ani3);
window.addEventListener("scroll", ani4);
}

document.addEventListener("DOMContentLoaded", main)