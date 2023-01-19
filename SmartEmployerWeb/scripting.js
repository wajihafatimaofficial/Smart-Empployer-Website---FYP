function openNav() {
  var accbutton = document.getElementById("accBtn");
document.getElementById("mySidenav").style.width = "300px";
accbutton.style.display = "none";
}

function closeNav() {
var accbutton = document.getElementById("accBtn");
document.getElementById("mySidenav").style.width = "0";
accbutton.style.display = "block";
}


$('#monochrome').click(function(){

  document.getElementById("navbar").style.backgroundColor = "black";
  document.getElementById("accBtn").style.backgroundColor = "black";
  document.getElementById("scrollBtn").style.backgroundColor = "black";
  document.getElementById("section1").style.backgroundColor = "#232324";
  document.getElementById("section3").style.backgroundColor = "#232324";
  document.getElementById("section5").style.backgroundColor = "#232324";

  document.getElementById("section2").style.backgroundColor = "#828385";
  document.getElementById("section4").style.backgroundColor = "#828385";

  document.getElementById("copyrightfooter").style.backgroundColor = "black";
  
  document.getElementById("subfooter").style.backgroundColor = "#828385";

  var nodeList = document.querySelectorAll("h1,p");
  for (let i = 0; i < nodeList.length; i++) {

    nodeList[i].style ="color: white !important";

}




var nodeList2 = document.querySelectorAll(".goog-te-combo");
for (let j = 0; j < nodeList2.length; j++) {

nodeList2[j].style ="background-color: #828385 !important";

}

});

//language translator
      function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
  }
   
  
        $(window).on('load',function(){
          localStorage.setItem("location", window.location.href);
   //hide google powered by 
  $(".goog-logo-link").empty();
    $('.goog-te-gadget').html($('.goog-te-gadget').children());

  
  });
  
      $(document).ready(function () {


  
// Detect offline/online mode in simple way.
window.addEventListener('online',  updateOnlineStatus);
window.addEventListener('offline', updateOnlineStatus);

function updateOnlineStatus(event) {
if(navigator.onLine){
  
  location.reload();
}
else{

window.location.replace('offlinePage.html');
}

}  
  

  
  
    
    
    
    });