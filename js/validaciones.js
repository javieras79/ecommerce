function validarAlta(){

    if(!validaNombre()){
        return false;
    }
    if(!validaApellidos()){
        return false;
    }
    if(!validaEmail()){
        return false;
    }
    if(!validaNick()){
        return false;
    }
    if(!validaPsw()){
        return false;
    }

    return true;
}

    function validaNombre(){
        //Guarda el valor del elemento nombre en una variable
        var nombre=document.getElementById("nombre").value;
        //Comprobamos si cumple alguna de estas condiciones.
        if (nombre=="" || nombre.length==0){
            alert('El nombre es obligatorio');
            return false;
        }
        return true;
    }

    function validaApellidos(){
    //Guarda el valor del elemento nombre en una variable
    var apell=document.getElementById("apellidos").value;
    //Comprobamos si cumple alguna de estas condiciones.
    if (apell=="" || apell.length==0){
        alert('Los apellidos son obligatorios');
        return false;
    }
    return true;
}

    function validaEmail(){
        var exp_email=/^(.+\@.+\..+)$/;
        var email=document.getElementById("email").value;
        if(exp_email.test(email)==false){
            alert('El formato de mail no es correcto');
            return false;
        }
        return true;

}

function validaNick(){
    //Guarda el valor del elemento nombre en una variable
    var nick=document.getElementById("nick").value;
        if (nick=="" || nick.length==0){
        alert('El Usuario es obligatorio');
        return false;
    }
    return true;
}

    function validaPsw(){
    //Guarda el valor del elemento nombre en una variable
    var psw=document.getElementById("pasw").value;
    //Comprobamos si cumple alguna de estas condiciones.
    if (psw=="" || psw.length==0){
        alert('El password es obligatorio');
        return false;
    }
    return true;
}