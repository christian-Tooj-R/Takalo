function modif(){
    var form = document.getElementById("myform");
    var input = document.getElementsByTagName('input');
    var parag = document.getElementsByClassName('cat');
    var bouton = document.getElementById("bouton");
    form.id = "theform";
    form.setAttribute("action","hehey.php");
    form.setAttribute("method","post");
    for(let i=1;i<6;i++){
        input[i+1].type="text";
        parag[i].setAttribute("hidden","hidden");
    }
    bouton.removeAttribute("onclick");
    bouton.innerHTML="<button id=bouton class=btn btn-primary type=submit>Modifier</button>";
}


window.addEventListener("click", function () {
    
    function sendData() {
      var xhr;
      try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
      catch (e)
      {
          try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
          catch (e2) 
          {
             try {  xhr = new XMLHttpRequest();  }
             catch (e3) {  xhr = false;   }
           }
      }

      
    
  
      var formData = new FormData(form);

      
    xhr.onreadystatechange  = function() 
    {
       if(xhr.readyState  == 4){
        if(xhr.status  == 200) {
            var resultat = JSON.parse(xhr.responseText);
            /*******/
          var parag = document.getElementsByClassName('cat');
            var input = document.getElementsByTagName('input');
          for(let i=1;i<6;i++){
              input[i+1].type = "hidden";
              parag[i].removeAttribute("hidden");
          }
          parag[3].innerHTML="<p>"+resultat['name']+"</p>";
          parag[4].innerHTML="<p>"+resultat['description']+"</p>";
          parag[5].innerHTML="<p>"+resultat['prixestime']+"</p>";
        } else {
            document.dyn="Error code " + xhr.status;
        }
		}
    };
  
      xhr.addEventListener("error", function(event) {
        alert('Oups! Quelque chose s\'est mal passé.');
      });
  
      xhr.open("POST", "http://localhost/prope/profil/thejson");
  
      xhr.send(formData);
    }
  
    var form = document.getElementById("theform");
  
    form.addEventListener("submit", function (event) {
    event.preventDefault(); 
  
      sendData();
    });
  });