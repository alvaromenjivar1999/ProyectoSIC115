var btnAgregar = document.getElementById("btnAgregar");
var btnGuardar = document.getElementById("btnGuardar");
var tabla = document.getElementById('tablacuentas');
var num =0;
var cuentas = [];
btnAgregar.addEventListener('click',function(){
    agregarFila();
    btnGuardar.style.visibility="visible";
});
btnGuardar.addEventListener('click', function(){
    guardar();
    
});
function agregarFila(){
    num++;
    var row = tabla.tBodies[0].insertRow(-1);
    row.insertCell(0).innerHTML= num.toString();
    var numeroDeCuenta = row.insertCell(1);
    var nombre = row.insertCell(2);
    var debe = row.insertCell(3);
    var haber = row.insertCell(4);
    row.insertCell(5).innerHTML='<button onclick="aceptarCuenta(event)" type="button" class="btn btn-success mr-1">Aceptar</button>';
    row.insertCell(6).innerHTML='<button onclick="editar(event)" type="button" class="btn btn-danger">Editar</button>';
    row.insertCell(7).innerHTML='<button onclick="eliminar(event)" type="button" class="btn btn-danger mr-1">Eliminar</button>';

    numeroDeCuenta.innerHTML ='<input class="form-control" type="text">';
    nombre.innerHTML='<input  class="form-control" type="text">';
    debe.innerHTML='<input  class="form-control" type="text">';
    haber.innerHTML='<input  class="form-control" type="text">';
}
function aceptarCuenta(event){
    let arr =currentInputs(event);
    arr.forEach(i => {
        i.disabled = true;
    });
    event.currentTarget.disabled = true;
}
function editar(event){
    let arr = currentInputs(event);
    arr.forEach(i => {
        i.disabled = false;
    });
    let acept = event.currentTarget.parentElement.parentElement.getElementsByClassName("btn")[0];
    acept.disabled = false;
    console.log(acept);    
}
function currentInputs(event){    
    var fila = event.currentTarget.parentElement.parentElement;
    var numeroDeCuenta = fila.children[1].firstElementChild;
    var nombre = fila.children[2].firstElementChild;
    var debe = fila.children[3].firstElementChild;
    var haber = fila.children[4].firstElementChild;
    return [numeroDeCuenta , nombre , debe , haber];
}
function eliminar(event){
    let  tr = event.currentTarget.parentElement.parentElement;
    tabla.tBodies[0].deleteRow(tr.rowIndex-1);
}
function guardar(){
    console.log("guardando");
    let trs = document.querySelectorAll("tbody > tr");
    for(let i = 0; i< trs.length; i++){
        console.log(i);
        let tds = trs[i].querySelectorAll("td"); 
            
        var numeroDeCuenta = tds[1].firstElementChild.value;
        var nombre = tds[2].firstElementChild.value;
        var debe = tds[3].firstElementChild.value;
        var haber = tds[4].firstElementChild.value;
        cuentas.push({
            numeroDeCuenta:numeroDeCuenta,
            nombre:nombre,
            debe:debe,
            haber:haber        
        });
       }
    
    console.log(cuentas);
    enviarDatos();
}

function enviarDatos(){
    var ruta = Routing.generate('registrarCuentas');
    console.log(ruta);
    $.ajax({
        type: "POST",
        url: ruta,
        data: {'cuentas':cuentas},
        async: true,
        dataType: "json",
        success: function(data){
            console.log(data['cuentas']);
        }
    });
}