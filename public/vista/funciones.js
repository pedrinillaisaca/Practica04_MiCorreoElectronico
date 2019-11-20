
//<span id="mensajePass" class="error"></span>

var c1 = false
var c2 = false
var c3 = false
var c4 = false
var c5 = false//
var c6 = false//
var c7 = false



function valPass() {

    //var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
    var vect = document.getElementById("pass").value
    console.log(vect)
    if (vect.length >= 8) {

        document.getElementById("mensajePass").innerHTML = ''
        let b1 = false//minusculas
        let b2 = false//mayusculas
        let b3 = false//especiales
        for (let i = 0; i < vect.length - 1; i++) {
            let asc = vect[i].charCodeAt()

            if (asc >= 97 && asc <= 122) {
                b1 = true
            } else {
                document.getElementById("mensajePass").innerHTML = 'ingresar minusculas'
                document.getElementById("pass").style.border = "red 1px solid"
            }

            if (asc >= 65 && asc <= 90) {
                b2 = true
            } else {
                document.getElementById("mensajePass").innerHTML = 'ingresar mayusculas'
                document.getElementById("pass").style.border = "red 1px solid"
            }

            if (asc == 36 || asc == 95 || asc == 64) {
                b3 = true
            } else {
                document.getElementById("mensajePass").innerHTML = 'ingresar carac Especiales'
                document.getElementById("pass").style.border = "red 1px solid"
            }

        }

        if (b1 == true && b2 == true && b3 == true) {
            document.getElementById("mensajePass").innerHTML = '&#10004'
            c7 = true
        }


        return true
    } else {
        document.getElementById("mensajePass").innerHTML = 'minimo 8 caracteres'
        document.getElementById("pass").style.border = "red 1px solid"
    }
}

function valMail() {
    var vector = document.getElementById("mail").value.split("@")
    console.log("distancia correo" + vector.length)
    if (vector.length >= 2) {
        if (vector[1] == "ups.edu.ec" || vector[1] == "est.ups.edu.ec") {
            if (vector[0].length >= 3) {
                document.getElementById("mensajeMail").innerHTML = '&#10004'
                c6 = true
                return true
            }

        } else {
            document.getElementById("mensajeMail").innerHTML = 'correo no valido'
            document.getElementById("mail").style.border = "red 1px solid"
            return true
        }
    } else {
        document.getElementById("mensajeMail").innerHTML = 'correo no valido'
        document.getElementById("mail").style.border = "red 1px solid"
        return true
    }
    return false
}

/** document.getElementById("mensajeFechaNac").innerHTML = 'formato imcompleto'
var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
console.log(miAscii)
elemento.value = elemento.value.substring(0, elemento.value.length - 1) */

function valFechNac() {

    var arry = document.getElementById("FechaNac").value.split("/")
    console.log(arry)
    document.getElementById("mensajeFechaNac").innerHTML = ''
    if (arry.length == 3) {
        if (parseInt(arry[0]) > 0 && parseInt(arry[0]) <= 2100) {//establecer los años del mes
            if (parseInt(arry[1]) > 0 && parseInt(arry[1]) <= 12) {//establecer meses del año
                if (parseInt(arry[2]) > 0 && parseInt(arry[2]) <= 30) {//establecer los dias de el mes
                    document.getElementById("mensajeFechaNac").innerHTML = '&#10004'//VALIDO
                    c5 = true
                    return true
                } else {
                    document.getElementById("mensajeFechaNac").innerHTML = 'Dias fuera de rango'
                    document.getElementById("FechaNac").style.border = "red 1px solid"
                    return true
                }

            } else {
                document.getElementById("mensajeFechaNac").innerHTML = 'Meses Fuera de rango '
                document.getElementById("FechaNac").style.border = "red 1px solid"
                return true
            }

        } else {
            document.getElementById("mensajeFechaNac").innerHTML = 'Años Fuera de rango '
            document.getElementById("FechaNac").style.border = "red 1px solid"
            return true
        }

    } else {
        document.getElementById("mensajeFechaNac").innerHTML = 'formato incorrecto'
        document.getElementById("FechaNac").style.border = "red 1px solid"
        return true
    }
    return false
}

function valTelefono(elemento) {
    console.log(elemento.value)
    document.getElementById("mensajeTelefono").innerHTML = ''

    var num = elemento.value

    if (parseInt(num[num.length - 1]) >= 0 && parseInt(num[num.length - 1]) <= 9 && num.length <= 10) {
        c4 = true
        document.getElementById("mensajeTelefono").innerHTML = '&#10004'
        return true
    } else {
        elemento.value = elemento.value.substring(0, elemento.value.length - 1)
        document.getElementById("mensajeTelefono").innerHTML = 'solo numeros, no mas de 10 digitos'
        document.getElementById("tel").style.border = "red 1px solid"
        return true
    }
    return false
}

function validarApellido(elemento) {
    document.getElementById("mensajeApellido").innerHTML = ''
    document.getElementById("ape").style.border = ""
    //console.log(elemento.value)
    if (elemento.value.length > 0) {
        c3 = true
        var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
        //console.log(miAscii)

        if (miAscii >= 97 && miAscii <= 122 || miAscii == 32) {

            var vector = elemento.value.split(" ")
            //
            console.log(vector.length)
            if (vector.length > 2) {
                elemento.value = elemento.value.substring(0, elemento.value.length - 1)
                document.getElementById("mensajeApellido").innerHTML = 'No se haceptan mas de 2 apellidos'
                document.getElementById("ape").style.border = "red 1px solid"
                return true
            }

        } else {
            elemento.value = elemento.value.substring(0, elemento.value.length - 1)
            document.getElementById("mensajeApellido").innerHTML = 'Se haceptan solo letras'
            document.getElementById("ape").style.border = "red 1px solid"
            return true
        }
    } else {
        return true
    }
}

//AQUI ESTA LA FUNCION DE DESABLILITAR BOTON REGIDTRART
function validarNombres(elemento) {
    document.getElementById("Registrar").disabled = true;

    document.getElementById("mensajeNombre").innerHTML = ''
    document.getElementById("name").style.border = ""
    //console.log(elemento.value)
    if (elemento.value.length > 0) {
        var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
        //console.log(miAscii)

        if (miAscii >= 97 && miAscii <= 122 || miAscii == 32) {
            c2 = true
            var vector = elemento.value.split(" ")
            console.log(vector.length)
            if (vector.length > 2) {
                elemento.value = elemento.value.substring(0, elemento.value.length - 1)
                document.getElementById("mensajeNombre").innerHTML = 'No se haceptan mas de 2 nombres'
                document.getElementById("name").style.border = "red 1px solid"
                return true
            }
        } else {
            elemento.value = elemento.value.substring(0, elemento.value.length - 1)
            document.getElementById("mensajeNombre").innerHTML = 'Se aceptan solo letras'
            document.getElementById("name").style.border = "red 1px solid"
            return false
        }
    } else {
        return true
    }
}



function validarCedula() {

    var c = document.getElementById("ced").value
    document.getElementById("ced").style.border = ("")
    //c=parseInt(c)


    if (parseInt(c[c.length - 1]) >= 0 && parseInt(c[c.length - 1]) <= 9) {
        console.log(c[c.length - 1])
        document.getElementById("mensajeCedula").innerHTML = ''

        if (c.length > 10) {
            document.getElementById("mensajeCedula").innerHTML = 'error mas de 10 caracteres'
            document.getElementById("ced").style.border = ("red 1px solid")
            document.getElementById("ced").value = document.getElementById("ced").value.substring(0, document.getElementById("ced").value.length - 1)
            return true
        } 
    }else {
            document.getElementById("mensajeCedula").innerHTML = 'Ingresar solo numeros'
            document.getElementById("ced").style.border = ("red 1px solid")
            document.getElementById("ced").value = document.getElementById("ced").value.substring(0, document.getElementById("ced").value.length - 1)            
            return true
        }



    console.log("validando ced " + c)

    var pares = 0
    var impar = 0

    if (c.length == 10) {

        for (let i = 0; i < c.length - 1; i++) {

            if ((i + 1) % 2 == 0) {

                if (parseInt(c[i]) >= 9) {
                    pares += parseInt(c[i]) - 9
                }

                pares += parseInt(c[i])

            } else {
                let im = parseInt(c[i]) * 2
                if (im >= 9) {
                    im = im - 9
                }
                impar += im
            }
        }

        var sum = pares + impar
        var res = sum % 10
        console.log("*" + res)

        if (res != 0) {
            res = 10 - res
            if (res == parseInt(c[c.length - 1])) {
                document.getElementById("mensajeCedula").innerHTML = '&#10004'
                c1 = true
            }
        }
        if (res == parseInt(c[c.length - 1])) {
            document.getElementById("mensajeCedula").innerHTML = '&#10004'
            c1 = true
            return true
        } else {

            //if(res!=parseInt(c[c.length - 1])){
            document.getElementById("mensajeCedula").innerHTML = 'cedula invalida'
            document.getElementById("ced").style.border = ("red 1px solid")
            return true
        }

    }


}



function validar() {

    valFechNac()
    valMail()
    valPass()

    var ban = true;

    for (var i = 0; i < document.forms[0].elements.length; i++) {
        var elemento = document.forms[0].elements[i]
        console.log(elemento.value)
        if (elemento.value == '' && elemento.type == 'text') {
            ban = false

        }

    }

    if (!ban) {
        console.log('ella no te ama')
        alert("Completar Campos")
    }

    console.log("**********" + c1 + " " + c2 + "**********")

    if ( c2 == true && c3 == true && c4 == true && c5 == true && c6 == true && c7 == true) {
        alert("Validacion Completa")
        document.getElementById("Registrar").disabled = false;
        ban=false//PARA QUE NO SE ACTUALIZA LA PAGINA 
        return ban;
    }
    return false
}


var csig = 0
var num = []
function iniciar() {
    num = ale()
    csig = 0
    console.log(num)
    document.getElementById("anterior").disabled = true;
    document.getElementById("siguiente").disabled = false;
    //document.getElementById("ima").innerHTML = '<img src="img/f' + num[0] + '.PNG">'

}


function pulse(nombre) {
    /**anterior    iniciar    siguiente     */
    if (nombre == "siguiente") {

        console.log(csig)
        document.getElementById("ima").innerHTML = '<img src="img/f' + num[csig] + '.PNG">'
        if (csig == 4) {
            document.getElementById("anterior").disabled = false;
            document.getElementById("siguiente").disabled = true;
        }
        csig++
    }
    if (nombre == "anterior") {
        csig--
        console.log(csig)
        document.getElementById("ima").innerHTML = '<img src="img/f' + num[csig] + '.PNG">'
        if (csig == 0) {
            document.getElementById("anterior").disabled = true;
            document.getElementById("siguiente").disabled = true;
        }

    }

}

function ale() {
    var arr = [parseInt(Math.random() * (10 - 1) + 1)]
    for (let i = 1; i < 5; i++) {
        let n = parseInt(Math.random() * (10 - 1) + 1)
        arr[i] = n
        for (let j = 0; j < i; j++) {
            if (arr[i] == arr[j]) {
                i--
            }

        }

    }
    return arr
}







