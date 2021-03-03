function validar() {
    var name, rut, direccion, comprado, expresion, patron;
    name = document.getElementById("name").value;
    rut = document.getElementById("rut").value;
    direccion = document.getElementById("direccion").value;
    comprado = document.getElementById("comprado").value;
    cantidad = document.getElementById("n1").value;
    //Esto de abajo es para que permita ingresar letras de la a hasta la z en mayuscula o minuscula y con espacio.
    patron = /^[a-zA-Z\s]*$/;
    
    
    
    if(name === "" || rut === "" || direccion === "" || comprado === "" || cantidad === "" ){
        alert("Todos los campos son obligatorios.");
        return false;
    }
    
    else if (name.search(patron) || direccion.search(patron) || comprado.search(patron)){
        alert("Solo se perminte letras");
      return false;  
    }
    else if(name.length > 2 ){
        alert("El nombre de la empresa es muy largo.");
    }
    else if(rut.length>30){
        alert("El rut es muy largo.");
        return false;
    }
    else if(direccion.length>30){
        alert("La direccion es muy larga.");
        return false;
    }
    else if(comprado.length>30){
        alert("Comprado por es muy largo");
        return false;
    }
    else if(isNaN(cantidad)){
        alert("La cantidad ingresada no es un numero.");
        return false;
    }
    else if(name.String.fromCharCode()){
        alert("Solo se puede ingresar texto campo nombre."); return false;
    }
    else if(direccion.String.fromCharCode()){
        alert("Solo se puede ingresar texto campo direccion."); return false;
    }
    else if(comprado.String.fromCharCode()){
        alert("Solo se puede ingresar texto campo comprado po."); return false;
    }
    
}
    