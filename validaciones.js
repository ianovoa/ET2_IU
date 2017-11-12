/*
	Este archivo contiene las funciones de javascript que se utilizan para validar los atributos de los formularios de la pagina HTML
	Autor: 1i5bf7
	Fecha: 05/10/2017
*/


//comprueba que el formato del dni introducido sea correcto
function comprobarDni(campo){
	var numero; //numero (NIF) del DNI
 	var letr; //letra del DNI introducido
 	var letra; //todas las letras posibles para un DNI en orden
 	var expresion_regular_dni; //expresion regular de un DNI
 
 	expresion_regular_dni = /^[0-9]{8}[a-zA-Z]$/;
 
 	if(expresion_regular_dni.test (campo) == true){ //comprueba que cumpla el formato del atributo
		numero = campo.substr(0,campo.length-1);
		letr = campo.substr(caompo.length-1,1);
		numero = numero % 23;
		letra='TRWAGMYFPDXBNJZSQVHLCKET';
		letra=letra.substring(numero,numero+1);
		if (letra!=letr.toUpperCase()) { //comprueba que no tenga la letra erronea
			alert('Dni erroneo, la letra del NIF no se corresponde');
			campo.focus();
			return false;
		}else{ //si tiene la letra correcta es un dni valido
			return true;
		}
	}else{
		alert('Dni erroneo, formato no válido');
		campo.focus();
		return false;
   }
}

//comprueba que el formato del telefono introducido sea correcto
function comprobarTelf(campo){
	var formatoTelefono; //expresion regular de un numero de telefono
	
	formatoTelefono=/[0-9]{9}/;
	
	if(formatoTelefono.test (campo.value) == false){ //comprueba que cumpla el formato del atributo
		alert('Formato de telefono incorrecto');
		campo.focus();
		return false;
	}
	return true;
}

//comprueba que el formato del numero real introducido sea correcto
function comprobarReal(campo, numDecimales, valormenor, valormayor){
	var formatoReal; //expresion regular de un numero real
	var toret; //variable auxiliar utilizada para comprobar el numero de decimales
	var potencia; //variable auxiliar utilizada para comprobar el numero de decimales (resultado de la potencia)
	
	formatoReal = /^[0-9]+\.[0-9]+/;
	
	if(formatoReal.test(campo.value) == true){ //comprueba que cumpla el formato del atributo
		potencia = Math.pow(10, numDecimales.value);
		toret = campo.value*potencia;
		if(formatoReal.test(toret.value)==true){ //si sigue teniendo decimales es que tenia mas de los permitidos
			alert('Numero de decimales incorrecto, son necesarios '+numDecimales.value);
			campo.focus();
			return false;
		}
		if((campo.value>valormayor.value)||(campo.value<valormenor.value)){ //comprueba que campo este entre los valores dados
			alert('Valor incorrecto, el atributo '+campo.name+' debe ser maximo '+valormayor.value+' y minimo '+valormenor.value);
			campo.focus();
			return false;
		}
		else{
			return true;
		}
	}
	alert('El atributo '+campo.name+' no es un numero decimal');
	campo.focus();
	return false;
}

//comprueba que el formato del numero entero introducido sea correcto
function comprobarEntero(campo,valormenor,valormayor){
	var formatoNum; //expresion regular de un numero entero
	
	formatoNum = /[0-9]+/;
	
	if(formatoNum.test(campo.value)==false){ //comprueba que cumpla el formato del atributo
		alert('El atributo '+campo.name+' no es numerico');
		campo.focus();
		return false;
	}
	if((campo.value > valormayor.value) || (campo.value < valormenor.value)){ //comprueba que campo este entre los valores dados
		alert('Longitud incorrecta, el atributo '+campo.name+' debe ser maximo ');
		campo.focus();
		return false;
	}
	return true;
}

//comprueba que el formato del texto alfabetico introducido sea correcto
function comprobarAlfabetico(campo, size){
	var formatoLetras; //expresion regular de un texto alfanumerico
	
	formatoLetras = /[a-z A-Z]+/;
	
	if(formatoLetras.test(campo.value)==false){ //comprueba que cumpla el formato del atributo
		alert('El atributo '+campo.name+' no es alfabetico');
		campo.focus();
		return false;
	}
	if(campo.value.length>size){ //comprueba que el atributo no se pase de la longitud permitida
		alert('Longitud incorrecta, el atributo '+campo.name+' debe ser maximo '+size);
		campo.focus();
		return false;
	}
	return true;
}

//comprueba que el formato del correo introducido sea correcto
function comprobarCorreo(campo, size){
	var formatoCorreo; //expresion regular de un email
	
	formatoCorreo = /^[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]+/;
	
	if(formatoCorreo.test(campo.value)==false){ //comprueba que cumpla el formato del atributo
		alert('El atributo '+campo.name+' no es valido (A@A.A)');
		campo.focus();
		return false;
	}
	if(campo.value.length>size){ //comprueba que el atributo no se pase de la longitud permitida
		alert('Longitud incorrecta, el atributo '+campo.name+' debe ser maximo '+size);
		campo.focus();
		return false;
	}
	return true;
}

//comprueba que el formato del texto introducido sea correcto
function comprobarTexto(campo, size){
	if(campo.value.length>size){ //comprueba que el atributo no se pase de la longitud permitida
		alert('Longitud incorrecta, el atributo '+campo.name+' debe ser maximo '+size);
		campo.focus();
		return false;
	}
	return true;
}

//comprueba que el campo no este vacio
function comprobarVacio(campo){
	if((campo.value==null)||(campo.value.length==0)){ //comprueba si el campo esta vacio
		alert('El atributo '+campo.name+' no debe estar vacio');
		campo.focus();
		return false;
	}
	return true;
}

//funcion para mostar subopciones en el menu
function mostrar(num) {
	var visto = null; //inicializa el visto a null
	
	obj = document.getElementById(num);
	obj.style.display = (obj==visto) ? 'none' : 'block';
	if (visto != null){
		visto.style.display = 'none';
	}
	visto = (obj==visto) ? null : obj;
}