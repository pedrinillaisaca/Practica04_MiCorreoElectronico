function invitar(num,u_codigo,r_codigo) { 
 
    
    console.log(u_codigo) 
    console.log(r_codigo)
    console.log(num)
       
  
        if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari 
            xmlhttp = new XMLHttpRequest(); 
        } else { 
            // code for IE6, IE5 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
        } 
        xmlhttp.onreadystatechange = function() { 
            if (this.readyState == 4 && this.status == 200) { 
                //alert("llegue"); 
                //document.getElementById("informacion").innerHTML = this.responseText; 
            } 
        }; 
        xmlhttp.open("GET","../../controladores/user/insertarInvitados.php?r_codigo="+r_codigo+"&u_codigo="+u_codigo,true); 
        xmlhttp.send(); 
        document.getElementById(num).disabled=true;
        //document.getElementById("anterior").disabled = true;
    return false; 
} 




function buscarReunion() { 
 
    var motivo = document.getElementById("motivo").value; 
    if (motivo == "") { 
        document.getElementById("motivo").innerHTML = "";         
    } else {  
        if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari 
            xmlhttp = new XMLHttpRequest(); 
        } else { 
            // code for IE6, IE5 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
        } 
        xmlhttp.onreadystatechange = function() { 
            if (this.readyState == 4 && this.status == 200) { 
                //alert("llegue"); 
                document.getElementById("informacion").innerHTML = this.responseText; 
            } 
        }; 
        xmlhttp.open("GET","../../controladores/user/buscarReuniones.php?motivo="+motivo,true); 
        xmlhttp.send(); 
    } 
    return false; 
} 
 
 

