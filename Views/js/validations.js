function validateEndDate() {
	if(document.getElementById('availabilityEnd').value<document.getElementById('availabilityStart').value) 
		document.getElementById('availabilityEnd').setCustomValidity('Esta fecha debe ser mayor a la fecha inicial');
	else 
		document.getElementById('availabilityEnd').setCustomValidity('');
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
tiempo = Date.now();
fechaActual = formatDate(tiempo);
console.log(fechaActual);
function validateStartDate(){
    if(document.getElementById('availabilityStart').value< fechaActual)
        document.getElementById('availabilityStart').setCustomValidity('start date must be equal or greater than current date');
    else
        document.getElementById('availabilityStart').setCustomValidity('');
}

function validcuil(cuit) //recibe un string
	{
		if (cuit.length != 13) return 0; //si el largo del string es menor a 13, retorna 0 la funcion
		
		var rv = false;
		var resultado = 0;
		var cuit_nro = cuit.replace("-", ""); //reemplaza guiones por espacios
		var codes = "6789456789";
		var cuit_long = parseInt(cuit_nro); //convierte string a int
		var verificador = parseInt(cuit_nro[cuit_nro.length-1]);
		var x = 0;
		
		while (x < 10)
		{
			var digitoValidador = parseInt(codes.substring(x, x+1));
			if (isNaN(digitoValidador)) digitoValidador = 0;
			var digito = parseInt(cuit_nro.substring(x, x+1));
			if (isNaN(digito)) digito = 0;
			var digitoValidacion = digitoValidador * digito;
			resultado += digitoValidacion;
			x++;
		}
		resultado = resultado % 11;
		rv = (resultado == verificador);
		return rv;
	}

function validateCuil()
{
    cuil = validcuil(document.getElementById('Cuil').value);
    if(cuil == false){
        document.getElementById('Cuil').setCustomValidity("invalid cuil");
    }else{
        document.getElementById('Cuil').setCustomValidity('');
    }
    console.log(cuil);
    
}



