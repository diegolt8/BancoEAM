function validar(tipo){
    
    var formulario = document.getElementById("formBan");
    document.getElementById("txtType").value = tipo; 
    
    
    if (tipo === "save"){
        if(document.getElementById("txtNombreBan").value !== "" &&
                document.getElementById("txtNitBan").value !== "" &&
                document.getElementById("txtMisionBan").value !== "" &&
                document.getElementById("txtVisionBan").value !== "" &&
                document.getElementById("txtSedeBan").value !== "") {
            formulario.submit();
        } else {
            alert("Ingrese todos los datos");
        }
    }
       if(tipo === "search"){
        if(document.getElementById("txtNitBan").value !== ""){
            formulario.submit();
        }else{
            alert("Por favor ingrese el NIT del banco a buscar");
        }
    }
        if (tipo === "update"){
         if(document.getElementById("txtNombreBan").value !== "" &&
                document.getElementById("txtNitBan").value !== "" &&
                document.getElementById("txtMisionBan").value !== "" &&
                document.getElementById("txtVisionBan").value !== "" &&
                document.getElementById("txtSedeBan").value !== ""){
            formulario.submit();
        } else{
            alert("Por favor realice una busqueda previa o Ingrese todos los datos");
        }
    } 
    
    if(tipo === "delete"){
        if(document.getElementById("txtNitBan").value !== ""){
            formulario.submit();
        }else{
            alert("Por favor realice una busqueda previa para poder eliminar");
        }
    }
       
    if(tipo === "list"){
        formulario.submit();
    }
}