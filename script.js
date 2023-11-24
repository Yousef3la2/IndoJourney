const header = document.querySelector("header");

let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
menu.classList.toggle('bx-x'); 
navbar.classList.toggle('open')
};
/**  Time */

function startTime() {

   var today = new Date();

   // Add 5 hours to the current time
   today.setHours(today.getHours() + 5);

   var hr = today.getHours();
   var min = today.getMinutes();
   var sec = today.getSeconds();
   ap = (hr < 12) ? "AM" : "PM";
   hr = (hr == 0) ? 12 : hr;
   hr = (hr > 12) ? hr - 12 : hr;
   //Add a zero in front of numbers<10
   hr = checkTime(hr);
   min = checkTime(min);
   sec = checkTime(sec);
   document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
   
   var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
   var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
   var curWeekDay = days[today.getDay()];
   var curDay = today.getDate();
   var curMonth = months[today.getMonth()];
   var curYear = today.getFullYear();
   var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
   document.getElementById("date").innerHTML = date;
   
   var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
   if (i < 10) {
       i = "0" + i;
   }
   return i;
}
startTime();
