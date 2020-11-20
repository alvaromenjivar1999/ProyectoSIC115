var btnAgregar = document.getElementById("btnAgregar");
var btnGuardar = document.getElementById("btnGuardar");
var tabla = document.getElementById('tablacuentas');
var num =0;
var cuentas = [];
var flag = true;
function getId(){
    console.log("paso")
    var id = document.getElementById('partidaTitle').getAttribute('data-partidaid');
    console.log(id);
    return id;
}

btnAgregar.addEventListener('click',function(){
    agregarFila();
    btnGuardar.style.visibility="visible";
});
btnGuardar.addEventListener('click', function(){
    guardar();
    
});
function agregarFila(){
    if(!flag) {alert("No puedes agregar otra cuenta si no has aceptado la anterior"); return 0;}
    flag = false;
    num++;
    var row = tabla.tBodies[0].insertRow(-1);
    var nr= row.insertCell(0);
    nr.innerHTML= num.toString();
    nr.class="nr-ch";
    var numeroDeCuenta = row.insertCell(1);
    var nombre = row.insertCell(2);
    let debe = row.insertCell(3);
    let haber = row.insertCell(4);
    row.insertCell(5).innerHTML='<button onclick="aceptarCuenta(event)" type="button" class="btn btn-success mr-1">Aceptar</button>';
    row.insertCell(6).innerHTML='<button onclick="editar(event)" type="button" class="btn btn-danger">Editar</button>';
    row.insertCell(7).innerHTML='<button onclick="eliminar(event)" type="button" class="btn btn-danger mr-1">Eliminar</button>';

    numeroDeCuenta.innerHTML ='<input class="form-control" type="text">';
    nombre.innerHTML='<input  class="form-control" type="text">';
    debe.innerHTML='<input  class="form-control"  type="text" value="0">';
    
    haber.innerHTML='<input  class="form-control"  type="text" value="0">';
    
}
function aceptarCuenta(event){
    flag = true;
    let arr =currentInputs(event);
    arr.forEach(i => {
        i.disabled = true;
    });
    event.currentTarget.disabled = true;
}
function editar(event){
    if(!flag) {alert("No puedes editar esta cuenta si no has aceptado todas las cuentas"); return 0;}
    flag = false;
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
    flag =true;
    let  tr = event.currentTarget.parentElement.parentElement;
    tabla.tBodies[0].deleteRow(tr.rowIndex-1);
    refrescarColumnas()
}
function guardar(){
    if(!flag) {alert("No puedes guardar si no has aceptado todas las cuentas"); return 0;}
    console.log("guardando");
    let trs = document.querySelectorAll("tbody > tr");
    for(let i = 0; i< trs.length; i++){
        console.log(i);
        let tds = trs[i].querySelectorAll("td"); 
            
        var numeroDeCuenta = parseInt(tds[1].firstElementChild.value).toString();
        var nombre = tds[2].firstElementChild.value;
        if(numeroDeCuenta==""){alert ("El campo 'numero de cuenta' es obligatorio, cuenta numero" + (i+1).toString()); return 0; }
        
        if(nombre==""){alert ("El campo 'nombre' de cuenta es obligatorio, cuenta numero" + (i+1).toString()); return 0; }
        var debe = tds[3].firstElementChild.value;
        var haber = tds[4].firstElementChild.value;
        
        if(debe=="") debe = "0";//validando


        if(haber=="") haber = "0";
        
        cuentas.push({
            numeroDeCuenta:numeroDeCuenta,
            nombre:nombre,
            debe:debe,
            haber:haber        
        });
       }
    
    console.log(cuentas);
    //enviarDatos();
   
}

function enviarDatos(){
    var ruta = '/registrarCuentas';

    console.log(ruta);
    $.ajax({
        type: "POST",
        url: ruta,
        data: {'cuentas':cuentas,'partidaId':getId()},
        async: true,
        dataType: "json",
        success: function(data){
            console.log(data['cuentas']);
            btnGuardar.disabled = true;
            window.location.href = "/registrar"; //para mientras devuelve a registrar.
        }
    });
    cuentas = []; //limpiando las cuentas para evitar duplicidad de datos
}
function refrescarColumnas(){
let nr = document.querySelectorAll("tbody > tr");
for( var e= 0; e<nr.length; e++){
    nr[e].firstElementChild.innerHTML=(e+1).toString();
}
num =nr.length;
}