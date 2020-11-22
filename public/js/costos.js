var insumos=[];
var inputsInsumosInnerHTML ="";
var agregarFlag = false;
function traer_insumos(){
    var ruta ="/obtenerInsumos"
    $.ajax({
        type: "GET",
        url: ruta,
        data: {},
        async: true,
        dataType: "json",
        success: function(data){
            console.log(data);
            insumos = data;
            agregarFlag = true;
            getInsumoInputInnerHTML();            
            
        }
    });
}
function getInsumoInputInnerHTML(){
    //catalogo_de_cuentas
    //inputsInnerHTML
    var inputString ='<select onchange="actualizarCostoMp(event,true)" class="browser-default custom-select">';
    insumos["insumos"].forEach(insumo => {
    inputString +='<option>'+insumo['nombre']+" a $"+insumo['costo']+'</option>';
        
    });
    inputString += '</select>';
    inputsInsumosInnerHTML = inputString;
}

function agregarFilaMP(id){
    if(!agregarFlag) return 0;
    var tabla = document.getElementById(id);      
    var row = tabla.tBodies[0].insertRow(-1);  
    var fecha = row.insertCell(0);
    
    let tipoCosto = row.insertCell(1);
    let cantidad = row.insertCell(2);
    let costo = row.insertCell(3);
    fecha.innerHTML ='<input type="date">';
    tipoCosto.innerHTML=inputsInsumosInnerHTML;    
    cantidad.innerHTML='<input onchange="actualizarCostoMp(event,true)"  class="form-control"  type="text" value="0">';
    costo.innerHTML='<input  class="form-control"  type="text" value="0" disabled>';
    row.insertCell(4).innerHTML='<a onclick="actualizarCostoMp(event,false)">Elimninar</a>';
}
function actualizarCostoMp(event,flag){
    console.log("esta cambaibdo")
    let padreTR =event.currentTarget.parentElement.parentElement;
    var costoActualEninput = padreTR.children[3].firstElementChild.value;
    var inputIndex = padreTR.children[1].firstElementChild.selectedIndex;
    var costoSeleccionado = parseInt(insumos["insumos"][inputIndex]['costo']);
    console.log(costoSeleccionado);
    var cantidad = padreTR.children[2].firstElementChild.value;
    var coste = costoSeleccionado * cantidad;
    console.log(coste)
    padreTR.children[3].firstElementChild.value = coste;
    
    //Para el Total
    var CosteTotal = padreTR.parentElement.parentElement.children[2].firstElementChild.children[1];
    if(!flag){
    coste = 0;
    eliminar(event);
    }
    var newCosteTotal = parseInt(CosteTotal.innerHTML) -parseInt(costoActualEninput) + coste;
    CosteTotal.innerHTML= newCosteTotal;

    

}
function agregarFilaMO(id){
    var tabla = document.getElementById(id);
       
    var row = tabla.tBodies[0].insertRow(-1);
    var fecha = row.insertCell(0);
    var descripcion = row.insertCell(1);
    
    let horas = row.insertCell(2);
    let costePorHora = row.insertCell(3);
    let costo = row.insertCell(4);
    fecha.innerHTML ='<input type="date">';
    descripcion.innerHTML = '<input  class="form-control"  type="text" value="">';

    horas.innerHTML='<input onchange="actualizarCostoMO(event,true)" class="form-control"  type="text" value="0">';    
    costePorHora.innerHTML='<input onchange="actualizarCostoMO(event,true)" class="form-control"  type="text" value="0">';
    costo.innerHTML = '<input  class="form-control"  type="text" value="0" disabled>'; 
    row.insertCell(5).innerHTML = '<a onclick="actualizarCostoMO(event,false)">Elimninar</a>';
}

function actualizarCostoMO(event,flag){
    console.log("esta cambaibdo")
    let padreTR =event.currentTarget.parentElement.parentElement;
    var Horas = padreTR.children[2].firstElementChild.value;  
    var costoPorHora = padreTR.children[3].firstElementChild.value;   
    var coste = costoPorHora * Horas;
    console.log(coste)
    let costoInput = padreTR.children[4].firstElementChild;
    var costoActualEnInput = costoInput.value;
    costoInput.value = coste;
    
    //Para el Total
    var CosteTotal = padreTR.parentElement.parentElement.children[2].firstElementChild.children[1];
    if(!flag){
    coste = 0;
    eliminar(event);
    }
    var newCosteTotal = parseInt(CosteTotal.innerHTML) -parseInt(costoActualEnInput) + coste;
    CosteTotal.innerHTML= newCosteTotal;

    

}

function agregarFilaCI(id){
    var tabla = document.getElementById(id);
       
    var row = tabla.tBodies[0].insertRow(-1);
    var fecha = row.insertCell(0);
    var tasa = row.insertCell(1);    
    let valReal = row.insertCell(2);
    let costoAplicado = row.insertCell(3);
    fecha.innerHTML ='<input type="date">';
    tasa.innerHTML = '<input  class="form-control"  type="text" value="">';
    valReal.innerHTML='<input   class="form-control"  type="text" value="0">';    
    costoAplicado.innerHTML='<input class="costoAplicado" onchange="actualizarCostoCI(event,true)" class="form-control"  type="text" value="0">';
    row.insertCell(4).innerHTML='<a onclick="actualizarCostoCI(event,false)">Elimninar</a>';
}
function actualizarCostoCI(event,flag){
    let padreTR =event.currentTarget.parentElement.parentElement;   
    var tbody = padreTR.parentElement;
    console.log("esta cambaibdo")
    if(!flag){    
    eliminar(event);
    }
    let inputs = tbody.parentElement.querySelectorAll("input.costoAplicado");     
    var newCosteTotal =0;
    inputs.forEach(element => {
        newCosteTotal += parseInt(element.value);
    });
    var CosteTotal = tbody.parentElement.children[2].firstElementChild.children[1];
    CosteTotal.innerHTML= newCosteTotal;

    

}

function eliminar(event){
    let  tr = event.currentTarget.parentElement.parentElement;
    tr.parentElement.parentElement.tBodies[0].deleteRow(tr.rowIndex-2);    
}