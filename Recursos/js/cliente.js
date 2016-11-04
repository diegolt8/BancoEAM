/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validarCliente(tipo) {

    var formulario = document.getElementById("formReg");
    document.getElementById("txtType").value = tipo;

    if (tipo === "save") {
        if (document.getElementById("txtNombre").value !== "" &&
                document.getElementById("txtApellido").value !== "" &&
                document.getElementById("txtNickname").value !== "" &&
                document.getElementById("txtPassword").value !== "" &&
                document.getElementById("txtPasswordv").value !== "" &&
                document.getElementById("txtCargo").value === "Cliente") {
            formulario.submit();
        } else {
            alert("ingrese todos los datos");
        }

    }
    
    }