function funcion1(input){

    label = document.getElementById("labelFile");

    if(input.files.length > 0){
        label.textContent = input.files[0].name;
    }else{
        label.textContent = "Logo o imagen de la marca"
    }

}
 
var cont = 0;

function funcion2(){

    var input = document.createElement("input");
    input.type = number;
    input.classList.add("input");
    input.placeholder = "Ingrese el talle"
    input.name = "talle"+cont;

    var input2 = document.createElement("input");
    input2.type = number;
    input2.classList.add("input");
    input2.placeholder = "Ingrese el stock del talle"
    input2.name = "stock"+cont;

    var br = document.createElement("br")

    var contenedor = document.getElementById("TALLES2");
    contenedor.appendChild(input);
    contenedor.appendChild(input2);
    contenedor.appendChild(br)

    conTalles++;
}