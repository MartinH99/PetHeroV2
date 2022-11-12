function validateEndDate() {
	if(document.getElementById('availabilityEnd').value<document.getElementById('availabilityStart').value) 
		document.getElementById('availabilityEnd').setCustomValidity('end date must be greater than start date');
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
		if (cuit.length != 11) return 0; //si el largo del string es distinto a 11, retorna 0 la funcion
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

function validatePassword()
{
	if(document.getElementById('Password').value.length < 6){
		document.getElementById('Password').setCustomValidity("password must be at least 6 characters long");
	}else{
		document.getElementById('Password').setCustomValidity('');
	}
}



