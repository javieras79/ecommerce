//Cuando se carga la ventana se ejecuta el código siguiente.
window.onload = function(){
  //Capturamos el formulario
    
	var id = document.getElementById("cat");
	id.addEventListener('focusout', function(eventoSubmit){cargaCodigo(eventoSubmit)});    
}

//A la función gestionarEnvio se le pasa el evento submit.
function gestionarEnvio(eventoSubmit){
    if(eventoSubmit){
        		eventoSubmit.preventDefault();
                cargaCodigo();
				return;
    }
}

function inicializa_xhr() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest(); 
	} else if (window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP"); 
	} 
}

function cargaCodigo() {
    var id=document.getElementById("cat").value;
    solicitud=inicializa_xhr();        
    if(solicitud){
        solicitud.onreadystatechange = procesoCodigo;
        solicitud.open("GET", "mtoArticles.php", true);
		solicitud.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		solicitud.send("id="+id+"&editar=SI");        
    } 

}

function procesoCodigo(){
    
    if(solicitud.readyState == 4) {
        if(solicitud.status == 200) {
            var respuesta = solicitud.responseText;            
            document.getElementById("cad").value = respuesta;
        }
    }
}