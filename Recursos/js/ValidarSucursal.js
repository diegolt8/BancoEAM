function validarSucursal(tipo){
    
    var formulario = document.getElementById("formSuc");
    document.getElementById("txtType").value = tipo; 
    
    
    if (tipo === "save"){
        if(document.getElementById("txtNombreSuc").value !== "" &&
                document.getElementById("txtDirSuc").value !== "" &&
                document.getElementById("txtMuniSuc").value !== "" &&
                document.getElementById("txtGerenteSuc").value !== "") {
            formulario.submit();
        } else {
            alert("Ingrese todos los datos");
        }
    }
       if(tipo === "search"){
        if(document.getElementById("txtNombreSuc").value !== ""){
            formulario.submit();
        }else{
            alert("Por favor ingrese el nombre de la sucursal a buscar");
        }
    }
        if (tipo === "update"){
         if(document.getElementById("txtNombreSuc").value !== "" &&
                document.getElementById("txtDirSuc").value !== "" &&
                document.getElementById("txtMuniSuc").value !== "" &&
                document.getElementById("txtGerenteSuc").value !== "") {
            formulario.submit();
        } else{
            alert("Por favor realice una busqueda previa o Ingrese todos los datos");
        }
    } 
    
    if(tipo === "delete"){
        if(document.getElementById("txtNombreSuc").value !== ""){
            formulario.submit();
        }else{
            alert("Por favor realice una busqueda previa para poder eliminar");
        }
    }
       
    if(tipo === "list"){
        formulario.submit();
    }
}