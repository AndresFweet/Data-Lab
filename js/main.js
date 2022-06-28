//FORMULARIO
let form = document.getElementById("form")
let file = document.getElementById("file")
let ext = /(.xlsx|.csv)$/i

document.getElementById("btnF").addEventListener("click", function (e) {
    e.preventDefault();
    if (file.value != "") {
        if (!ext.exec(file.value)) {
            Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'El archivo seleccionado no es compatible'})
        file.value = ''
        return false
        }else{
            let doc = file.files[0].name
        }
    }else{
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debes seleccionar un archivo!'})
    }
})

