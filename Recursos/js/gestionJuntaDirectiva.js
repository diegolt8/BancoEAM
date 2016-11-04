// JavaScript Document

function validarSocio(tipo) {

    var formulario = document.getElementById("formSocio");
    document.getElementById("txtType").value = tipo;

    if (tipo === "save") {
        if (document.getElementById("txtNombre").value !== "" &&
                document.getElementById("txtApellido").value !== "" &&
                document.getElementById("txtId").value !== "" &&
                document.getElementById("txtFechaNac").value !== "" &&
                document.getElementById("selCiudadNac").value !== -1) {
            formulario.submit();

        } else {
            alert("Ingrese todos los datos");
        }

    }

    if (tipo === "update") {
        if (document.getElementById("txtNombre").value !== "" &&
                document.getElementById("txtApellido").value !== "" &&
                document.getElementById("txtId").value !== "" &&
                document.getElementById("txtFechaNac").value !== "" &&
                document.getElementById("selCiudadNac").value !== -1) {				
            formulario.submit();
        } else {
            alert("Debe realizar una busqueda previa o ingresar todos los datos");
        }

    }

    if (tipo === "delete") {
        if (document.getElementById("txtId").value !== "") {
            formulario.submit();
        } else {
            alert("Por favor ingrese la cedula del socio que desea eliminar");
        }
    }

    if (tipo === "search") {
        if (document.getElementById("txtId").value !== "") {
            formulario.submit();
        } else {
            alert("Por favor ingrese la cedula del socio que desea buscar");
        }
    }
	
	if(tipo === "list"){
		if(document.getElementById("selDptoNac").value !== -1){
			formulario.submit();
		}else{
			alert("Por favor seleccione un estado o departamento");
		}
	}

}