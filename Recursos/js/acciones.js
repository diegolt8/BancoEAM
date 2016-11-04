/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function logIn(tipo){
    
    var formulario = document.getElementById("formLogIn");
    document.getElementById("txtTypeLog").value = tipo;
    if(formulario.checkValidity()){
        return true;
    }else{
        return false;
    }
}


