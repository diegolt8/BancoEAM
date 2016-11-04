/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validarDepar(tipo) {

    var formulario = document.getElementById("formReg");
    document.getElementById("txtType").value = tipo;

    if (tipo === "save") {
        if (document.getElementById("txtNombre").value !== "" &&
                document.getElementById("cbpais").value !== "" &&
                document.getElementById("txtApellido").value !== "" ) {
            formulario.submit();
        } else {
            alert("ingrese todos los datos");
        }

    }
    if(tipo === "update"){
        if(document.getElementById("txtNombre").value !== "" &&
                document.getElementById("cbpais").value !== "" &&
                document.getElementById("txtApellido").value !== ""){
            formulario.submit();
        }else{
            alert("Ingrese todos los datos");
        }
      }
      
       if(tipo === "delete"){
        if(document.getElementById("txtNombre").value !== "") {
            formulario.submit();
        }else{
            alert("por favor ingrese el nickname a eliminar");
        }
     }
     if(tipo === "search"){
        if(document.getElementById("txtNombre").value !== "") {
            formulario.submit();
        }else{
            alert("por favor ingrese el nickname del empleado que desea buscar");
        }
     }
     if (tipo === "list") {
        formulario.submit();
    }
    
    }
