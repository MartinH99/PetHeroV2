function validateEndDate() {
	if(document.getElementById('fechaFinal').value<document.getElementById('fechaInicial').value) 
		document.getElementById('fechaFinal').setCustomValidity('Esta fecha debe ser mayor a la fecha inicial');
	else 
		document.getElementById('fechaFinal').setCustomValidity('');
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
    if(document.getElementById('fechaInicial').value< fechaActual)
        document.getElementById('fechaInicial').setCustomValidity('aaaaa');
    else
        document.getElementById('fechaInicial').setCustomValidity('');
}