window.setInterval(function(){
var d =new Date();
var UTC =  new Date(d.getTime() + (d.getTimezoneOffset()*60000));
var pstdate = new Date(UTC.getTime() - ((7*60)*60000));
var hrs=pstdate.getHours();
var min=pstdate.getMinutes();
var don="AM"
if (hrs>=12) {
don="PM"
if (hrs>12) { hrs-=12 }
}
if (hrs==0) { hrs=12 }
if (hrs<10) { hrs="0"+hrs }
if (min<10) { min="0"+min }
document.getElementById("time").innerHTML=hrs+":"+min+" "+don;
},1000);