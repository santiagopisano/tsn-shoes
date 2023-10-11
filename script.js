function funcion1(input){

    label = document.getElementById("labelFile");

    if(input.files.length > 0){
        label.textContent = input.files[0].name;
    }else{
        label.textContent = "Logo o imagen de la marca"
    }

}