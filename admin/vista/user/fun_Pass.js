function validarPass(elemento){

    var pass1=document.getElementById("new_contra").value
    console.log(pass1)
    console.log(elemento.value)

    if(pass1===elemento.value ){
        document.getElementById("aviso").innerHTML = '&#10004'
        document.getElementById("aviso2").innerHTML = '&#10004'
        return false
    }else{
        document.getElementById("aviso").innerHTML = 'X'
        document.getElementById("aviso2").innerHTML = 'X'
        return false
    }

return true

}