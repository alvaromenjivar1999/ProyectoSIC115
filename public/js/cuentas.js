var btn = document.getElementById("btnAgregar");
var tabla = document.getElementById('tablacuentas');
var num =0;
var cuentas = [{}];
btn.addEventListener('click',function(){
    agregarFila();
});
function agregarFila(){
    num++;
    var row = tabla.insertRow(-1);
    row.insertCell(0).innerHTML= num.toString();
    var numeroDeCuenta = row.insertCell(1);
    var nombre = row.insertCell(2);
    var debe = row.insertCell(3);
    var haber = row.insertCell(4);
    row.insertCell(5).innerHTML='<button onclick="aceptarCuenta(event)" type="button" class="btn btn-success mr-1">Aceptar</button>';
    row.insertCell(6).innerHTML='<button onclick="editar(event)" type="button" class="btn btn-danger">Editar</button>';
    row.insertCell(7).innerHTML='<button  type="button" class="btn btn-danger mr-1">Eliminar</button>';

    numeroDeCuenta.innerHTML ='<input type="text">';
    nombre.innerHTML='<input type="text">';
    debe.innerHTML='<input type="text">';
    haber.innerHTML='<input type="text">';
}
function aceptarCuenta(event){
    var arrInput =currentInputs(event);

    var objeto = {
        numeroDeCuenta:arrInput[0].value,
        nombre:arrInput[1].value,
        debe:arrInput[2].value,
        haber:arrInput[3].value
    };
    cuentas.push(objeto);
    console.log(objeto);
    arrInput[0].disabled = true;
    arrInput[1].disabled = true;
    arrInput[2].disabled = true;
    arrInput[3].disabled = true;
}
function editar(event){
    let arr = currentInputs(event);
    arr.forEach(i => {
        i.disabled = false;
    });
    /*arr[0].disabled = false;
    arr[1].disabled = false;
    arr[2].disabled = false;
    arr[3].disabled = false;*/
}
function currentInputs(event){    
    var fila = event.currentTarget.parentElement.parentElement;
    var numeroDeCuenta = fila.children[1].firstElementChild;
    var nombre = fila.children[2].firstElementChild;
    var debe = fila.children[3].firstElementChild;
    var haber = fila.children[4].firstElementChild;
    return [numeroDeCuenta , nombre , debe , haber];
}